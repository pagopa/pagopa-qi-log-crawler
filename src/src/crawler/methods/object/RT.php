<?php

namespace pagopa\crawler\methods\object;

use \XMLReader;

class RT
{


    protected string $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }


    /**
     * Restituisce un blocco xml in formato stringa
     * @param string $block
     * @param string $element
     * @return string|null
     */
    private function getBlockXml(string $block, string $element) : string|null
    {
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower($element)))
            {
                return $xml->readOuterXml();
            }
        }
        return null;
    }

    private function getElementXml(string $block, string $element) : string|null
    {
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower($element)))
            {
                return $xml->readString();
            }
        }
        return null;
    }


    public function getImporto() : string|null
    {
        return $this->getElementXml($this->payload, 'importoTotalePagato');
    }


    public function getImportoVersamento(int $index = 0) : string|null
    {
        $count = 0;
        $block = $this->getBlockXml($this->payload, 'datiPagamento');
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('singoloImportoPagato')))
            {
                if ($count == $index)
                {
                    return $xml->readString();
                }
                $count++;
            }
        }
        return null;
    }

    public function getIur(int $index = 0) : string|null
    {
        $count = 0;
        $block = $this->getBlockXml($this->payload, 'datiPagamento');
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('identificativoUnivocoRiscossione')))
            {
                if ($count == $index)
                {
                    return $xml->readString();
                }
                $count++;
            }
        }
        return null;
    }

    public function getEsito() : string|null
    {
        $value = $this->getElementXml($this->payload, 'codiceEsitoPagamento');
        if (is_null($value))
        {
            return null;
        }
        return ($value == "0") ? 'OK' : 'KO';
    }

    public function isBollo(int $index = 0) : bool
    {
        $block = $this->getBlockXml($this->payload, 'datiPagamento');
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('datiSingoloPagamento')))
            {
                if ($count == $index)
                {
                    $datiSingoloPagamento = $xml->readOuterXml();
                    $value = $this->getElementXml($datiSingoloPagamento, 'allegatoRicevuta');
                    return !is_null($value);
                }
                $count++;
            }
        }
        return false;
    }

    public function getVersamentiCount() : int
    {
        $block = $this->getBlockXml($this->payload, 'datiPagamento');
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('datiSingoloPagamento')))
            {
                $count++;
            }
        }
        return $count;
    }

}