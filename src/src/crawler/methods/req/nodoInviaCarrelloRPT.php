<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\MethodInterface;
use pagopa\crawler\methods\object\RPT;
use \XMLReader;

class nodoInviaCarrelloRPT implements MethodInterface
{

    protected string $payload;


    public function __construct(string $payload = null)
    {
        $this->payload = $payload;
    }


    /**
     * @return int|null
     */
    public function getPaymentsCount(): int|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        $count = 0;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'elementoListaRPT'))
            {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @inheritDoc
     */
    public function getIuvs(): array|null
    {
        $iuvs = [];
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $iuvs[] = $this->getElementFromListaRPT($i, 'identificativoUnivocoVersamento');
        }
        return (count($iuvs) == 0) ? null : $iuvs;
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $pa_emittenti = [];
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $pa_emittenti[] = $this->getElementFromListaRPT($i, 'identificativoDominio');
        }
        return (count($pa_emittenti) == 0) ? null : $pa_emittenti;
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $ccps = [];
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $ccps[] = $this->getElementFromListaRPT($i, 'codiceContestoPagamento');
        }
        return (count($ccps) == 0) ? null : $ccps;
    }

    /**
     * @inheritDoc
     */
    public function getAllTokens(): array|null
    {
        return $this->getCcps();
    }

    /**
     * @inheritDoc
     */
    public function getAllNoticesNumbers(): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        $iuvs = $this->getIuvs();
        if (is_null($iuvs))
        {
            return null;
        }
        return (!array_key_exists($index, $iuvs)) ? null : $iuvs[$index];
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        $pa_emittente = $this->getPaEmittenti();
        if (is_null($pa_emittente))
        {
            return null;
        }
        return (!array_key_exists($index, $pa_emittente)) ? null : $pa_emittente[$index];
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        $ccps = $this->getCCps();
        if (is_null($ccps))
        {
            return null;
        }
        return (!array_key_exists($index, $ccps)) ? null : $ccps[$index];
    }

    /**
     * @inheritDoc
     */
    public function getToken(int $index = 0): string|null
    {
        return $this->getCcp($index);
    }

    /**
     * @inheritDoc
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getImportoTotale(): string|null
    {
        $importo = 0;
        for($i=0;$i<$this->getPaymentsCount();$i++)
        {
            $importo += $this->getRpt($i)->getImportoSingolaRPT();
        }
        return $importo;
    }

    /**
     * @inheritDoc
     */
    public function getImporto(int $index = 0): string|null
    {
        $rpt = $this->getRpt($index);
        return (is_null($rpt)) ? null : $rpt->getImportoSingolaRPT();
    }

    /**
     * @inheritDoc
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0): string|null
    {
        $rpt = $this->getRpt($index);
        return (is_null($rpt)) ? null : $rpt->getImportoSingoloVersamento($transfer);
    }

    /**
     * @inheritDoc
     */
    public function getTransferPa(int $transfer = 0, int $index = 0): string|null
    {
        if (($transfer + 1) > $this->getTransferCount($index))
        {
            return null;
        }
        return $this->getPaEmittente($index);
    }

    /**
     * @inheritDoc
     */
    public function getTransferIban(int $transfer = 0, int $index = 0): string|null
    {
        $rpt = $this->getRpt($index);
        return (is_null($rpt)) ? null : $rpt->getIbanAccredito($transfer);
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
        $rpt = $this->getRpt($index);
        return (is_null($rpt)) ? null : $rpt->getTransferCount();
    }

    /**
     * @inheritDoc
     */
    public function isBollo(int $transfer = 0, int $index = 0): bool
    {
        $rpt = $this->getRpt($index);
        return (is_null($rpt)) ? false : $rpt->isBollo($transfer);
    }

    /**
     * @inheritDoc
     */
    public function getPsp(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'identificativoPSP'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPsp(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'identificativoIntermediarioPSP'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCanale(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'identificativoCanale'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPa(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'identificativoIntermediarioPA'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'identificativoStazioneIntermediarioPA'))
            {
                return $xml->readString();
            }
        }
        return null;
    }


    /**
     * Restituisce il blocco elementoListaRPT di una nodoInviaCarrelloRPT
     * @param int $index
     * @return string|null
     */
    private function getElementoListaRPT(int $index) : string|null
    {
        if ($index > 4)
        {
            return null;
        }
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'elementoListaRPT'))
            {
                if ($count == $index)
                {
                    return $xml->readOuterXml();
                }
                $count++;
            }
        }
        return null;
    }

    /**
     * Restituisce l'elemento tagName della lista i-esima (indicata in $index)
     * @param int $index
     * @param string $tagName
     * @return string|null
     */
    private function getElementFromListaRPT(int $index, string $tagName) : string|null
    {
        $elementoListaRPT = $this->getElementoListaRPT($index);
        if ($elementoListaRPT == null)
        {
            return null;
        }
        $xml = new XMLReader();
        $xml->XML($elementoListaRPT);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == $tagName))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * Restituisce l'oggetto RPT dell'iesima RPT del carrello
     * @param int $index
     * @return RPT|null
     */
    public function getRpt(int $index) : RPT|null
    {
        $rpt = $this->getElementFromListaRPT($index, 'rpt');
        return (is_null($rpt)) ? null : new RPT(base64_decode($rpt));
    }


    /**
     * Restituisce l'id carrello
     * @return string|null
     */
    public function getIdCarrello() : string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        $count = 0;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'identificativoCarrello'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function outcome(): string|null
    {
        return null;
    }

    /**
     * @param int $index
     * @return string|null
     */
    public function getPaymentMetaDataCount(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @param int $index
     * @param int $metaKey
     * @return string|null
     */
    public function getPaymentMetaDataKey(int $index = 0, int $metaKey = 0): string|null
    {
        return null;
    }

    /**
     * @param int $index
     * @param int $metaKey
     * @return string|null
     */
    public function getPaymentMetaDataValue(int $index = 0, int $metaKey = 0): string|null
    {
        return null;
    }

    /**
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferMetaDataCount(int $transfer = 0, int $index = 0): string|null
    {
        return null;
    }

    /**
     * @param int $transfer
     * @param int $index
     * @param int $metaKey
     * @return string|null
     */
    public function getTransferMetaDataKey(int $transfer = 0, int $index = 0, int $metaKey = 0): string|null
    {
        return null;
    }

    /**
     * @param int $transfer
     * @param int $index
     * @param int $metaKey
     * @return string|null
     */
    public function getTransferMetaDataValue(int $transfer = 0, int $index = 0, int $metaKey = 0): string|null
    {
        return null;
    }
}