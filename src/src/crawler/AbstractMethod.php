<?php

namespace pagopa\crawler;

use pagopa\crawler\methods\MethodInterface;
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
class AbstractMethod implements methods\MethodInterface
{

    protected $prefix_xpath = '';

    const XML_PAYLOAD = 'xml';
    const JSON_PAYLOAD = 'json';

    protected string $typePayload = self::XML_PAYLOAD;


    protected string $payload;


    /**
     * Constante che definisce l'XPATH dove trovare lo IUV
     */
    const XPATH_IUV                     = null;

    /**
     * Constante che definisce l'XPATH dove trovare la PA Emittente
     */
    const XPATH_PA_EMITTENTE            = null;

    /**
     * Constante che definisce l'XPATH dove trovare il TOKEN / CCP
     */
    const XPATH_TOKEN_CCP               = null;

    /**
     * Constante che definisce l'XPATH dove trovare il notice Number
     */
    const XPATH_NOTICE_NUMBER           = null;

    /**
     * Constante che definisce l'XPATH dove trovare l'id carrello
     */
    const XPATH_ID_CART                 = null;

    /**
     * Constante che definisce dove trovare il totale del carrello
     */
    const XPATH_TOTAL_CART_AMOUNT       = null;

    /**
     * Constante che definisce l'XPATH dove trovare il blocco di un payment
     */
    const XPATH_PAYMENT_COUNT           = null;


    /**
     * XPATH utilizzato per contare i transfer di un pagamento di un carrello.
     * %1$d corrisponde alla variabile $index passata al metodo
     */
    const XPATH_TRANSFER_COUNT          = null;

    /**
     * XPATH utilizzato per l'importo del singolo pagamento di un carrello (o singolo avviso)
     * %1$d corrisponde alla variabile $index passata al metodo)
     */
    const XPATH_SINGLE_PAYMENT_IMPORT   = null;

    /**
     * XPATH utilizzato per l'importo del singolo transfer di un pagamento
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const XPATH_SINGLE_TRANSFER_AMOUNT  = null;

    /**
     * XPATH utilizzato per la PA del singolo transfer di un pagamento
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const XPATH_SINGLE_TRANSFER_PA      = null;

    /**
     * XPATH utilizzato per l'IBAN del singolo transfer di un pagamento
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const XPATH_SINGLE_IBAN_PA          = null;

    /**
     * XPATH utilizzato per l'id transfer del singolo transfer di un pagamento
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const XPATH_SINGLE_TRANSFER_ID      = null;

    /**
     * XPATH utilizzato per capire se il transfer di un pagamento è un bollo o meno
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const XPATH_IS_BOLLO_TRANSFER       = null;

    /**
     * XPATH utilizzato per la count metadata del payment (fuori alla transferList)
     * %1$d corrisponde alla variabile $index
     */
    const XPATH_PAYMENT_METADATA        = null;

    /**
     * XPATH utilizzato per la chiave del metadata del singolo pagamento
     * %1$d corrisponde alla variabile $metaKey
     * %2$d corrisponde alla variabile $index
     */
    const XPATH_PAYMENT_METADATA_KEY    = null;

    /**
     * XPATH utilizzato per il valore della metadata del singolo pagamento
     * %1$d corrisponde alla variabile $metaKey
     * %2$d corrisponde alla variabile $index
     */
    const XPATH_PAYMENT_METADATA_VALUE  = null;

    /**
     * XPATH utilizzato per i metadata del transfer di un payment
     * %1$d corrisponde alla variabile $transfer
     * %2$d corrisponde alla variabile $index
     */
    const XPATH_TRANSFER_METADATA       = null;

    /**
     * XPATH utilizzato per la chiave del metadata del transfer di un payment
     * %1$d corrisponde alla variabile $metaKey
     * %2$d corrisponde alla variabile $transfer
     * %3$d corrisponde alla variabile $index
     */
    const XPATH_TRANSFER_METADATA_KEY   = null;


    /**
     * XPATH utilizzato per il valore del metadata del transfer di un payment
     * %1$d corrisponde alla variabile $metaKey
     * %2$d corrisponde alla variabile $transfer
     * %3$d corrisponde alla variabile $index
     */
    const XPATH_TRANSFER_METADATA_VALUE = null;

    /**
     * XPATH utilizzato per recuperare il PSP di un payload
     */
    const XPATH_PSP                     = null;

    const XPATH_BROKER_PSP              = null;

    const XPATH_CHANNEL                 = null;

    const XPATH_STATION                 = null;

    const XPATH_BROKER_PA               = null;

    const XPATH_OUTCOME_ESITO           = null;


    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        $this->typePayload = $type;
        $xml = new SimpleXMLElement($payload);

        $namespaces = $xml->getDocNamespaces(true);
        $namespaces = array_filter(array_keys($namespaces), function($k){return !empty($k);});
        $namespaces = array_map(function($ns){return "$ns:";}, $namespaces);
        $ns_clean_xml = str_replace("xmlns=", "ns=", $payload);
        $ns_clean_xml = str_replace($namespaces, array_fill(0, count($namespaces), ''), $ns_clean_xml);
        $this->payload = $ns_clean_xml;
    }


    public function isValidPayload(): bool
    {
        $payload = $this->payload;
        if ($this->typePayload == self::XML_PAYLOAD) {
            libxml_use_internal_errors(true);
            simplexml_load_string($payload);
            $errors = libxml_get_errors();
            libxml_clear_errors();
            return empty($errors);
        }
        if ($this->typePayload == self::JSON_PAYLOAD) {
            json_decode($payload);
            return json_last_error() === JSON_ERROR_NONE;
        }
        return false;
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
        $xml = new SimpleXMLElement($this->payload);
        $render_xpath = '//' .$this->prefix_xpath . $xpath;
        $query = $xml->xpath($render_xpath);
        return ((is_null($query)) || ($query === false)) ? null : count($query);
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
        $xml = new SimpleXMLElement($this->payload);
        $render_path = '//' .$this->prefix_xpath . $xpath;
        $query = $xml->xpath($render_path);
        if ((is_null($query)) || ($query === false) || (count($query) === 0))
        {
            return null;
        }
        return (array_key_exists($number, $query)) ? $query[$number] : null;
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
        if (static::XPATH_IUV == null)
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
        if (static::XPATH_PA_EMITTENTE == null)
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
        if (static::XPATH_TOKEN_CCP == null)
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
        if (static::XPATH_TOKEN_CCP == null)
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
        if (static::XPATH_NOTICE_NUMBER == null)
        {
            return null;
        }
        $return = array();
        for($i=0;$i<$this->getElementCount(static::XPATH_NOTICE_NUMBER);$i++)
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
        if (($p > $this->getPaymentsCount()) || (static::XPATH_IUV == null))
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_IUV, [$p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::XPATH_PA_EMITTENTE == null))
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_PA_EMITTENTE, [$p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::XPATH_TOKEN_CCP == null))
        {
            return null;
        }

        $render_xpath = vsprintf(static::XPATH_TOKEN_CCP, [$p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getToken(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::XPATH_TOKEN_CCP == null))
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_TOKEN_CCP, [$p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        $p = $index + 1;
        if (($p > $this->getPaymentsCount()) || (static::XPATH_NOTICE_NUMBER == null))
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_NOTICE_NUMBER, [$p]);
        return (static::XPATH_NOTICE_NUMBER == null) ? null : $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getImportoTotale(): string|null
    {
        return (static::XPATH_TOTAL_CART_AMOUNT == null) ? null : $this->getElement(static::XPATH_TOTAL_CART_AMOUNT);
    }

    /**
     * @inheritDoc
     */
    public function getImporto(int $index = 0): string|null
    {
        $p = $index + 1;
        if ($p > $this->getPaymentsCount())
        {
            $index = 0;
        }
        return (static::XPATH_SINGLE_PAYMENT_IMPORT == null) ? null : $this->getElement(static::XPATH_SINGLE_PAYMENT_IMPORT, $index);
    }

    /**
     * @inheritDoc
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0): string|null
    {
        if (static::XPATH_SINGLE_TRANSFER_AMOUNT == null)
        {
            return null;
        }
        $p = $index + 1;
        $t = $transfer + 1;
        $render_xpath = vsprintf(static::XPATH_SINGLE_TRANSFER_AMOUNT, [$t, $p]);
        return $this->getElement($render_xpath);

    }

    /**
     * @inheritDoc
     */
    public function getTransferPa(int $transfer = 0, int $index = 0): string|null
    {
        if (static::XPATH_SINGLE_TRANSFER_PA == null)
        {
            return null;
        }
        $p = $index + 1;
        $t = $transfer + 1;
        $render_xpath = vsprintf(static::XPATH_SINGLE_TRANSFER_PA, [$t, $p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getTransferIban(int $transfer = 0, int $index = 0): string|null
    {
        if (static::XPATH_SINGLE_IBAN_PA == null)
        {
            return null;
        }
        $p = $index + 1;
        $t = $transfer + 1;
        $render_xpath = vsprintf(static::XPATH_SINGLE_IBAN_PA, [$t, $p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getTransferId(int $transfer = 0, int $index = 0): string|null
    {
        if (static::XPATH_SINGLE_TRANSFER_ID == null)
        {
            return null;
        }
        $p = $index + 1;
        $t = $transfer + 1;
        $render_xpath = vsprintf(static::XPATH_SINGLE_TRANSFER_ID, [$t, $p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getTransferCount(int $index = 0): int|null
    {
        if (static::XPATH_TRANSFER_COUNT == null)
        {
            return null;
        }
        $p = $index + 1;
        if ($p > $this->getPaymentsCount())
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_TRANSFER_COUNT, [$p]);
        $value = $this->getElementCount($render_xpath);
        return ($value == 0) ? null : $value;
    }

    /**
     * @inheritDoc
     */
    public function isBollo(int $transfer = 0, int $index = 0): bool
    {
        if (static::XPATH_IS_BOLLO_TRANSFER == null)
        {
            return false;
        }
        $p = $index + 1;
        $t = $transfer + 1;
        if ($p > $this->getPaymentsCount())
        {
            return false;
        }
        $render_xpath = vsprintf(static::XPATH_IS_BOLLO_TRANSFER, [$t, $p]);
        return !is_null($this->getElement($render_xpath));
    }

    /**
     * @inheritDoc
     */
    public function getPsp(): string|null
    {
        return $this->getElement(static::XPATH_PSP);
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPsp(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_PSP);
    }

    /**
     * @inheritDoc
     */
    public function getCanale(): string|null
    {
        return $this->getElement(static::XPATH_CHANNEL);
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPa(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_PA);
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        return $this->getElement(static::XPATH_STATION);
    }

    /**
     * @inheritDoc
     */
    public function outcome(): string|null
    {
        return $this->getElement(static::XPATH_OUTCOME_ESITO);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMetaDataCount(int $index = 0): string|null
    {
        if (static::XPATH_PAYMENT_METADATA == null)
        {
            return null;
        }
        $p = $index + 1;
        if ($p > $this->getPaymentsCount())
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_PAYMENT_METADATA, [$p]);
        $value = $this->getElementCount($render_xpath);
        return ($value == 0) ? null : $value;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMetaDataKey(int $index = 0, int $metaKey = 0): string|null
    {
        if (static::XPATH_PAYMENT_METADATA_KEY == null)
        {
            return null;
        }
        $p = $index + 1;
        $m = $metaKey + 1;
        if ($p > $this->getPaymentsCount())
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_PAYMENT_METADATA_KEY,[$m, $p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMetaDataValue(int $index = 0, int $metaKey = 0): string|null
    {
        if (static::XPATH_PAYMENT_METADATA_VALUE == null)
        {
            return null;
        }
        $p = $index + 1;
        $m = $metaKey + 1;
        if ($p > $this->getPaymentsCount())
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_PAYMENT_METADATA_VALUE,[$m, $p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataCount(int $transfer = 0, int $index = 0): string|null
    {
        if (static::XPATH_TRANSFER_METADATA == null)
        {
            return null;
        }
        $p = $index + 1;
        $t = $transfer + 1;
        if ($p > $this->getPaymentsCount())
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_TRANSFER_METADATA, [$t, $p]);
        $value = $this->getElementCount($render_xpath);
        return ($value == 0) ? null : $value;
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataKey(int $transfer = 0, int $index = 0, int $metaKey = 0): string|null
    {
        if (static::XPATH_TRANSFER_METADATA_KEY == null)
        {
            return null;
        }
        $p = $index + 1;
        $t = $transfer + 1;
        $m = $metaKey + 1;
        if ($p > $this->getPaymentsCount())
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_TRANSFER_METADATA_KEY, [$m, $t, $p]);
        return $this->getElement($render_xpath);
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataValue(int $transfer = 0, int $index = 0, int $metaKey = 0): string|null
    {
        if (static::XPATH_TRANSFER_METADATA_VALUE == null)
        {
            return null;
        }
        $p = $index + 1;
        $t = $transfer + 1;
        $m = $metaKey + 1;
        if ($p > $this->getPaymentsCount())
        {
            return null;
        }
        $render_xpath = vsprintf(static::XPATH_TRANSFER_METADATA_VALUE, [$m, $t, $p]);
        return $this->getElement($render_xpath);
    }
}