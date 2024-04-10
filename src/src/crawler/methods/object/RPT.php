<?php

namespace pagopa\crawler\methods\object;

use \XMLReader;

class RPT
{


    protected string $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Restituisce il blocco dati versamento di una RPT
     * @return string|null
     */

    public function getDatiVersamento() : string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'datiVersamento'))
            {
                return $xml->readOuterXml();
            }
        }
        return null;
    }


    /**
     * Restituisce l'importo della singola RPT
     * @return string|null
     */
    public function getImportoSingolaRPT() : string|null
    {
        $versamenti = $this->getDatiVersamento();
        if (is_null($versamenti))
        {
            return null;
        }

        $xml = new XMLReader();
        $xml->XML($versamenti);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'importoTotaleDaVersare'))
            {
                return $xml->readString();
            }
        }
        return null;
    }


    /**
     * Restituisce il blocco datiSingoloVersamento iesimo della RPT
     * @param int $index
     * @return string|null
     */
    public function getSingoloVersamento(int $index) : string|null
    {
        $datiSingoloVersamento = $this->getDatiVersamento();
        $xml = new XMLReader();
        $xml->XML($datiSingoloVersamento);
        $count = 0;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'datiSingoloVersamento'))
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
     * Restituisce l'importo dell'iesimo versamento
     * @param int $index
     * @return string|null
     */
    public function getImportoSingoloVersamento(int $index) : string|null
    {
        $versamento = $this->getSingoloVersamento($index);
        if (is_null($versamento))
        {
            return null;
        }

        $xml = new XMLReader();
        $xml->XML($versamento);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'importoSingoloVersamento'))
            {

                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * Restituisce l'iban dell'iesimo versamento
     * @param int $index
     * @return string|null
     */
    public function getIbanAccredito(int $index) : string|null
    {
        $versamento = $this->getSingoloVersamento($index);
        if (is_null($versamento))
        {
            return null;
        }

        $xml = new XMLReader();
        $xml->XML($versamento);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'ibanAccredito'))
            {
                return $xml->readString();
            }
        }
        return null;
    }


    /**
     * Restituisce la pa transfer dei versamenti
     * @return string|null
     */
    public function getPaTransfer() : string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'identificativoDominio'))
            {
                return $xml->readString();
            }
        }
        return null;
    }


    /**
     * Restituisce il numero di versamenti della RPT
     * @return string|null
     */
    public function getTransferCount() : string|null
    {
        $versamenti = $this->getDatiVersamento();
        if (is_null($versamenti))
        {
             return null;
        }

        $xml = new XMLReader();
        $xml->XML($versamenti);
        $count = 0;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'datiSingoloVersamento'))
            {
                $count++;
            }
        }
        return $count;
    }


    /**
     * Restituisce true/false se il versamento iesimo è true/false
     * @param int $index
     * @return bool
     */
    public function isBollo(int $index) : bool
    {
        $versamenti = $this->getSingoloVersamento($index);
        if (is_null($versamenti))
        {
            return false;
        }

        $xml = new XMLReader();
        $xml->XML($versamenti);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'datiMarcaBolloDigitale'))
            {
                return true;
            }
        }
        return false;
    }


    /**
     * Restituisce il tipo versamento del pagamento
     * @return string|null
     */
    public function getTipoVersamento() : string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'tipoVersamento'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

}