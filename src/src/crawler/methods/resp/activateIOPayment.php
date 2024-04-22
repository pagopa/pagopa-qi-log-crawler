<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\FaultInterface;
use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class activateIOPayment implements MethodInterface, FaultInterface
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
     * @inheritDoc
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
     * @inheritDoc
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
     * @inheritDoc
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
        return (is_null($this->getIuvs())) ? null : $this->getIuvs()[0];
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        return (is_null($this->getPaEmittenti())) ? null : $this->getPaEmittenti()[0];
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return (is_null($this->getCcps())) ? null : $this->getCcps()[0];
    }

    /**
     * @inheritDoc
     */
    public function getToken(int $index = 0): string|null
    {
        return (is_null($this->getCcps())) ? null : $this->getCcps()[0];
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
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPsp(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCanale(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPa(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function outcome(): string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'outcome'))
            {
                return $xml->readString();
            }
        }
        return null;
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
}