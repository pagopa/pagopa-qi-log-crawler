<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\FaultInterface;
use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class activatePaymentNotice implements MethodInterface, FaultInterface
{

    /**
     * Rappresenta il payload dell'evento
     * @var string
     */
    protected string $payload;


    public function __construct(string $payload = null)
    {
        $this->payload = $payload;
    }

    /**
     * Restituisce un singolo iuv prendendo il valore dal tag creditorReferenceId
     */
    public function getIuvs(): array|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "creditorReferenceId"))
            {
                return [$xml->readString()];
            }
        }
        return null;
    }

    /**
     * Restituisce la PA emittente prendendo il valore dal tag fiscalCodePA
     */
    public function getPaEmittenti(): array|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        $count = 1;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "fiscalCodePA"))
            {
                return [$xml->readString()];
            }
        }
        return null;
    }

    /**
     * Restituisce il ccp prelevando il token dal payload al campo paymentToken
     */
    public function getCcps(): array|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        $count = 1;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "paymentToken"))
            {
                return [$xml->readString()];
            }
        }
        return null;
    }

    /**
     * Restituisce un array con il singolo token presente nel payload
     */
    public function getAllTokens(): array|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        $count = 1;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "paymentToken"))
            {
                return [$xml->readString()];
            }
        }
        return null;
    }

    /**
     * Restituisce null perchè nel payload non ci sono riferimenti al notice id
     */
    public function getAllNoticesNumbers(): array|null
    {
        return null;
    }

    /**
     * Restituisce staticamente il primo elemento dell'array restituito da getIuvs in quanto nel payload
     * dell'activatePaymentNotice c'è solo uno IUV
     */
    public function getIuv(int $index = 0): string|null
    {
        return (is_null($this->getIuvs())) ? null : $this->getIuvs()[0];
    }

    /**
     *  Restituisce staticamente il primo elemento dell'array restituito da getPaEmittenti in quanto nel payload
     *  dell'activatePaymentNotice c'è solo una PA Emittente
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        return (is_null($this->getPaEmittenti())) ? null : $this->getPaEmittenti()[0];
    }

    /**
     * Restituisce staticamente il primo elemento dell'array restituito da getCcps in quanto nel payload
     * dell'activatePaymentNotice c'è solo un CCP/TOKEN
     */
    public function getCcp(int $index = 0): string|null
    {
        return (is_null($this->getCcps())) ? null : $this->getCcps()[0];
    }

    /**
     * Restituisce staticamente il primo elemento dell'array restituito da getCcps in quanto nel payload
     * dell'activatePaymentNotice c'è solo un CCP/TOKEN
     */
    public function getToken(int $index = 0): string|null
    {
        return (is_null($this->getAllTokens())) ? null : $this->getAllTokens()[0];
    }

    /**
     * Restituisce null perchè non c'è il noticeNumber nel payload
     */
    public function getNoticeNumber(int $index = 0): string|null
    {
        return null;
    }

    /**
     * Restituisce il valore del campo totalAmount nel payload della activatePaymentNotice
     */
    public function getImportoTotale(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        $count = 1;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "totalAmount"))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * Restituisce il valore del campo totalAmount nel payload della activatePaymentNotice
     */
    public function getImporto(int $index = 0): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        $count = 1;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "totalAmount"))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0): string|null
    {
        $transferBlock = $this->getTransferNumber($transfer);
        if (!is_null($transferBlock))
        {
            $xml = new XMLReader();
            $xml->XML($transferBlock);
            while($xml->read())
            {
                if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "transferAmount"))
                {
                    return $xml->readString();
                }
            }
            return null;
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferPa(int $transfer = 0, int $index = 0): string|null
    {
        $transferBlock = $this->getTransferNumber($transfer);
        if (!is_null($transferBlock))
        {
            $xml = new XMLReader();
            $xml->XML($transferBlock);
            $count = 0;
            while($xml->read())
            {
                if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "fiscalCodePA"))
                {
                    return $xml->readString();
                }
            }
            return null;
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferIban(int $transfer = 0, int $index = 0): string|null
    {
        $transferBlock = $this->getTransferNumber($transfer);
        if (!is_null($transferBlock)) {
            $xml = new XMLReader();
            $xml->XML($transferBlock);
            while ($xml->read()) {
                if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "IBAN")) {
                    return $xml->readString();
                }
            }
            return null;
        }
        return null;
    }

    /**
     * @param int $transfer
     * @param int $index
     * @return string|null
     */
    public function getTransferId(int $transfer = 0, int $index = 0): string|null
    {
        $transferBlock = $this->getTransferNumber($transfer);
        if (!is_null($transferBlock))
        {
            $xml = new XMLReader();
            $xml->XML($transferBlock);
            $count = 0;
            while($xml->read())
            {
                if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == "idTransfer"))
                {
                    return $xml->readString();
                }
            }
            return null;
        }
        return null;
    }

    /**
     * La activatePaymentNotice non gestisce bollo
     */
    public function isBollo(int $transfer = 0, int $index = 0): bool
    {
        return false;
    }

    /**
     * Nel payload non esiste il PSP
     */
    public function getPsp(): string|null
    {
        return null;
    }

    /**
     * Nel payload non esiste il broker PSP
     */
    public function getBrokerPsp(): string|null
    {
        return null;
    }

    /**
     * Nel payload non esiste il canale
     */
    public function getCanale(): string|null
    {
        return null;
    }

    /**
     * Nel payload non esiste l'intermediario PA
     */
    public function getBrokerPa(): string|null
    {
        return null;
    }


    /**
     * Nel payload non esiste la stazione
     */
    public function getStazione(): string|null
    {
        return null;
    }

    /**
     * Recupera il blocco di XML del campo transferList
     * @return string|null
     */
    private function getTransferList() : string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'transferList'))
            {
                return $xml->readOuterXml();
            }
        }
        return null;
    }

    /**
     * Restituisce l'iesimo blocco transfer della transferList
     * @param int $index
     * @return string|null
     */
    private function getTransferNumber(int $index) : string|null
    {
        $transferList = $this->getTransferList();
        if (is_null($transferList))
        {
            return null;
        }
        $xml = new XMLReader();
        $xml->XML($this->getTransferList());
        $count = 0;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'transfer'))
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
     * @return bool
     */
    public function isFaultEvent(): bool
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'fault'))
            {
                return true;
            }
        }
        return false;
    }

    /**
     * @return string|null
     */
    public function getFaultCode(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'faultCode'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getFaultString(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'faultString'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getFaultDescription(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'description'))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @param int $index
     * @return int|null
     */
    public function getTransferCount(int $index = 0): int|null
    {
        $transferList = $this->getTransferList();
        if (is_null($transferList))
        {
            return null;
        }
        $xml = new XMLReader();
        $xml->XML($this->getTransferList());
        $count = 0;
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'transfer'))
            {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @return int|null
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }

    /**
     * @return string|null
     */
    public function outcome(): string|null
    {
        $xml = new \XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == 'outcome'))
            {
                return $xml->readString();
            }
        }
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