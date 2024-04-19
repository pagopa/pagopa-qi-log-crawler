<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\MethodInterface;
use pagopa\crawler\methods\object\RT;
use \XMLReader;

class paaInviaRT implements MethodInterface
{

    /**
     * Rappresenta il payload dell'evento
     * @var string
     */
    protected string $payload;


    protected RT $object;

    public function __construct(string $payload = null)
    {
        $this->payload = $payload;
        $rt_payload = $this->getElementXml($payload, 'rt');
        $this->object = new RT(base64_decode($rt_payload));
    }

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

    public function getRT() : RT
    {
        return $this->object;
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
        $value = $this->getElementXml($this->payload, 'identificativoUnivocoVersamento');
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $value = $this->getElementXml($this->payload, 'identificativoDominio');
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $value = $this->getElementXml($this->payload, 'codiceContestoPagamento');
        return (is_null($value)) ? null : array($value);
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
        return $this->getElementXml($this->payload, 'identificativoUnivocoVersamento');
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        return $this->getElementXml($this->payload, 'identificativoDominio');
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return $this->getElementXml($this->payload, 'codiceContestoPagamento');
    }

    /**
     * @inheritDoc
     */
    public function getToken(int $index = 0): string|null
    {
        return $this->getCcp();
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
        return $this->object->getImporto();
    }

    /**
     * @inheritDoc
     */
    public function getImporto(int $index = 0): string|null
    {
        return $this->object->getImporto();
    }

    /**
     * @inheritDoc
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0): string|null
    {
        return $this->object->getImportoVersamento($transfer);
    }

    /**
     * @inheritDoc
     */
    public function getTransferPa(int $transfer = 0, int $index = 0): string|null
    {
        return $this->getPaEmittente();
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
        return $this->object->getVersamentiCount();
    }

    /**
     * @inheritDoc
     */
    public function isBollo(int $transfer = 0, int $index = 0): bool
    {
        return $this->object->isBollo($transfer);
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
        return $this->getElementXml($this->payload, 'identificativoIntermediarioPA');
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        return $this->getElementXml($this->payload, 'identificativoStazioneIntermediarioPA');
    }

    /**
     * @inheritDoc
     */
    public function outcome(): string|null
    {
        return $this->object->getEsito();
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