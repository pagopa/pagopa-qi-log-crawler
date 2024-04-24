<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\AbstractMethod;
use pagopa\crawler\methods\MethodInterface;
use pagopa\crawler\methods\object\RPT;
use \XMLReader;

class nodoInviaCarrelloRPT extends AbstractMethod
{

    protected $prefix_xpath = 'nodoInviaCarrelloRPT';

    const XPATH_PAYMENT_COUNT = '/listaRPT/elementoListaRPT';

    const XPATH_IUV = '/listaRPT/elementoListaRPT[%1$d]/identificativoUnivocoVersamento';

    const XPATH_PA_EMITTENTE = '/listaRPT/elementoListaRPT[%1$d]/identificativoDominio';

    const XPATH_TOKEN_CCP = '/listaRPT/elementoListaRPT[%1$d]/codiceContestoPagamento';

    const XPATH_PSP = '/identificativoPSP';

    const XPATH_BROKER_PSP = '/identificativoIntermediarioPSP';

    const XPATH_CHANNEL = '/identificativoCanale';



    /**
     * @return int|null
     */
    public function getPaymentsCount(): int|null
    {
        return $this->getElementCount(static::XPATH_PAYMENT_COUNT);
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
        return number_format($importo, 2, '.', '');
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
        return !(is_null($rpt)) && $rpt->isBollo($transfer);
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
}