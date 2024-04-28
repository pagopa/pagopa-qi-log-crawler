<?php

namespace pagopa\crawler\methods;

use pagopa\crawler\methods;
use SimpleXMLElement;

/**
 * La classe AbstractMethod offre constanti di configurazione usate dai corrispondenti metodi per ricavare
 * informazioni dalle strutture xml/json sfruttando Xpath/JsonPath
 *
 * Ogni Constante definita viene utilizzata attraverso dei placeholder numerati
 *
 * %1$d
 * %2$d
 * %3$d
 * etc
 *
 * Ogni costante sostituisce a questi placeholder vari valori.
 * Le sostituzioni sono 3 e riguardano la posizione iesima del pagamento (nel carrello), la posizione iesima del transfer, la posizione iesima del metadata (key, value)
 * Ogni costante usa i placeholder a modo suo (alcune costanti usano %1$d per l'iesimo transfer, altri per l'iesimo payment)
 */
class AbstractJsonPayload extends AbstractPayload
{

    protected string $typePayload = self::JSON_PAYLOAD;


    protected mixed $payload;


    /**
     * Constante che definisce l'XPATH dove trovare lo IUV
     */
    const JPATH_IUV                     = null;

    /**
     * Constante che definisce l'XPATH dove trovare la PA Emittente
     */
    const JPATH_PA_EMITTENTE            = null;

    /**
     * Constante che definisce l'XPATH dove trovare il TOKEN / CCP
     */
    const JPATH_TOKEN_CCP               = null;

    /**
     * Constante che definisce l'XPATH dove trovare il notice Number
     */
    const JPATH_NOTICE_NUMBER           = null;

    /**
     * Constante che definisce l'XPATH dove trovare l'id carrello
     */
    const JPATH_ID_CART                 = null;

    /**
     * Constante che definisce dove trovare il totale del carrello
     */
    const JPATH_TOTAL_CART_AMOUNT       = null;

    /**
     * Constante che definisce l'XPATH dove trovare il blocco di un payment
     */
    const JPATH_PAYMENT_COUNT           = null;


    /**
     * XPATH utilizzato per contare i transfer di un pagamento di un carrello.
     * %1$d corrisponde alla variabile $index passata al metodo
     */
    const JPATH_TRANSFER_COUNT          = null;

    /**
     * XPATH utilizzato per l'importo del singolo pagamento di un carrello (o singolo avviso)
     * %1$d corrisponde alla variabile $index passata al metodo)
     */
    const JPATH_SINGLE_PAYMENT_IMPORT   = null;

    /**
     * XPATH utilizzato per l'importo del singolo transfer di un pagamento
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const JPATH_SINGLE_TRANSFER_AMOUNT  = null;

    /**
     * XPATH utilizzato per la PA del singolo transfer di un pagamento
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const JPATH_SINGLE_TRANSFER_PA      = null;

    /**
     * XPATH utilizzato per l'IBAN del singolo transfer di un pagamento
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const JPATH_SINGLE_IBAN_PA          = null;

    /**
     * XPATH utilizzato per l'id transfer del singolo transfer di un pagamento
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const JPATH_SINGLE_TRANSFER_ID      = null;

    /**
     * XPATH utilizzato per capire se il transfer di un pagamento è un bollo o meno
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const JPATH_IS_BOLLO_TRANSFER       = null;

    /**
     * XPATH utilizzato per la count metadata del payment (fuori alla transferList)
     * %1$d corrisponde alla variabile $index
     */
    const JPATH_PAYMENT_METADATA        = null;

    /**
     * XPATH utilizzato per la chiave del metadata del singolo pagamento
     * %1$d corrisponde alla variabile $metaKey
     * %2$d corrisponde alla variabile $index
     */
    const JPATH_PAYMENT_METADATA_KEY    = null;

    /**
     * XPATH utilizzato per il valore della metadata del singolo pagamento
     * %1$d corrisponde alla variabile $metaKey
     * %2$d corrisponde alla variabile $index
     */
    const JPATH_PAYMENT_METADATA_VALUE  = null;

    /**
     * XPATH utilizzato per i metadata del transfer di un payment
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const JPATH_TRANSFER_METADATA       = null;

    /**
     * XPATH utilizzato per la chiave del metadata del transfer di un payment
     * %1$d corrisponde alla variabile $metaKey
     * %2$d corrisponde alla variabile $transfer
     * %3$d corrisponde alla variabile $index
     */
    const JPATH_TRANSFER_METADATA_KEY   = null;


    /**
     * XPATH utilizzato per il valore del metadata del transfer di un payment
     * %1$d corrisponde alla variabile $metaKey
     * %2$d corrisponde alla variabile $transfer
     * %3$d corrisponde alla variabile $index
     */
    const JPATH_TRANSFER_METADATA_VALUE = null;

    /**
     * XPATH utilizzato per recuperare il PSP di un payload
     */
    const JPATH_PSP                     = null;

    const JPATH_BROKER_PSP              = null;

    const JPATH_CHANNEL                 = null;

    const JPATH_STATION                 = null;

    const JPATH_BROKER_PA               = null;

    const JPATH_OUTCOME_ESITO           = null;


    protected bool $isValidPayload = true;


    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        $this->payload = json_decode($payload);
        $this->isValidPayload = (json_last_error() === JSON_ERROR_NONE);
    }


    public function isValidPayload(): bool
    {
        return $this->isValidPayload;
    }

    /**
     * Dato un xpath, restituisce il numero di occorrenze trovate nell'XML
     * @param string $xpath
     * @param int $number
     * @return string|null
     * @throws \Exception
     */
    public function getElementCount(string $xpath): string|null
    {
        $return = $this->jsonPath($xpath);
        return (is_null($return)) ? null : count($return);
    }

    public function jsonPath(string $path) : mixed
    {
        $payload = $this->payload;
        $prop_arr = explode('->',$path);
        foreach($prop_arr as $p)
        {
            if (isset($payload->{$p}))
            {
                $payload = $payload->{$p};
            }
            else
            {
                return null;
            }
        }
        return $payload;
    }

    /**
     * Dato un xpath, restituisce l'occorrenza i-esima ritrovata nel payload.
     * @param string|null $xpath
     * @param int $number
     * @return string|null
     * @throws \Exception
     */
    public function getElement(null|string $xpath, int $number = 0): string|null
    {
        if (is_null($xpath))
        {
            return null;
        }
        $return = $this->jsonPath($xpath);
        if (is_array($return))
        {
            if (count($return) === 0)
            {
                return null;
            }
            return (array_key_exists($number, $return)) ? $return[$number] : null;
        }
        return (empty($return)) ? null : $return;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }

    /**
     * @inheritDoc
     */
    public function getIuvs(): array|null
    {
        if (static::JPATH_IUV == null)
        {
            return null;
        }
        $return = array();
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $value = $this->getIuv($i);
            if (!is_null($value))
            {
                $return[$i] = $this->getIuv($i);
            }
        }
        return (count($return) == 0) ? null : $return;
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        if (static::JPATH_PA_EMITTENTE == null)
        {
            return null;
        }
        $return = array();
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $value = $this->getPaEmittente($i);
            if (!is_null($value))
            {
                $return[$i] = $value;
            }
        }
        return (count($return) == 0) ? null : $return;
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        if (static::JPATH_TOKEN_CCP == null)
        {
            return null;
        }
        $return = array();
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $value = $this->getCcp($i);
            if (!is_null($value))
            {
                $return[$i] = $value;
            }
        }
        return (count($return) == 0) ? null : $return;
    }

    /**
     * @inheritDoc
     */
    public function getAllTokens(): array|null
    {
        if (static::JPATH_TOKEN_CCP == null)
        {
            return null;
        }
        $return = array();
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $value = $this->getToken($i);
            if (!is_null($value))
            {
                $return[$i] = $value;
            }
        }
        return (count($return) == 0) ? null : $return;
    }

    /**
     * @inheritDoc
     */
    public function getAllNoticesNumbers(): array|null
    {
        if (static::JPATH_NOTICE_NUMBER == null)
        {
            return null;
        }
        $return = array();
        for($i=0;$i<$this->getElementCount(static::JPATH_NOTICE_NUMBER);$i++)
        {
            $value = $this->getNoticeNumber($i);
            if (!is_null($value))
            {
                $return[$i] = $value;
            }
        }
        return (count($return) == 0) ? null : $return;
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::JPATH_IUV == null))
        {
            return null;
        }
        return $this->getElement(static::JPATH_IUV, $p);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::JPATH_PA_EMITTENTE == null))
        {
            return null;
        }
        return $this->getElement(static::JPATH_PA_EMITTENTE, $index);
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::JPATH_TOKEN_CCP == null))
        {
            return null;
        }

        return $this->getElement(static::JPATH_TOKEN_CCP, $index);
    }

    /**
     * @inheritDoc
     */
    public function getToken(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::JPATH_TOKEN_CCP == null))
        {
            return null;
        }
        return $this->getElement(static::JPATH_TOKEN_CCP, $index);

    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::JPATH_NOTICE_NUMBER == null))
        {
            return null;
        }
        return (static::JPATH_NOTICE_NUMBER == null) ? null : $this->getElement(static::JPATH_NOTICE_NUMBER, $index);
    }

    /**
     * @inheritDoc
     */
    public function getImportoTotale(): string|null
    {
        return (static::JPATH_TOTAL_CART_AMOUNT == null) ? null : $this->getElement(static::JPATH_TOTAL_CART_AMOUNT);
    }

    /**
     * @inheritDoc
     */
    public function getImporto(int $index = 0): string|null
    {
        $p = $index + 1;
        if ($p > $this->getPaymentsCount())
        {
            return null;
        }
        return (static::JPATH_SINGLE_PAYMENT_IMPORT == null) ? null : $this->getElement(static::JPATH_SINGLE_PAYMENT_IMPORT, $index);
    }

    /**
     * @inheritDoc
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferPa(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferIban(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferId(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferCount(int $index = 0): int|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function isBollo(int $transfer = 0, int $index = 0): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function getPsp(): string|null
    {
        return $this->getElement(static::JPATH_PSP);
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPsp(): string|null
    {
        return $this->getElement(static::JPATH_BROKER_PSP);
    }

    /**
     * @inheritDoc
     */
    public function getCanale(): string|null
    {
        return $this->getElement(static::JPATH_CHANNEL);
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPa(): string|null
    {
        return $this->getElement(static::JPATH_BROKER_PA);
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        return $this->getElement(static::JPATH_STATION);
    }

    /**
     * @inheritDoc
     */
    public function outcome(): string|null
    {
        return $this->getElement(static::JPATH_OUTCOME_ESITO);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMetaDataCount(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMetaDataKey(int $index = 0, int $metaKey = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMetaDataValue(int $index = 0, int $metaKey = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataCount(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataKey(int $transfer = 0, int $index = 0, int $metaKey = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataValue(int $transfer = 0, int $index = 0, int $metaKey = 0): string|null
    {
        return null;
    }
}