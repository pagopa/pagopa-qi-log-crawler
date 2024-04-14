<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class nodoAttivaRPT implements MethodInterface
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


    private function getElementFromPayload(string $element) : string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower($element)))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getIuvs(): array|null
    {
        $value = $this->getIuv();
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $value = $this->getPaEmittente();
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $value = $this->getCcp();
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
        $value = $this->getNoticeNumber();
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getIuv(int $index = 0): string|null
    {
        return $this->getElementFromPayload('CodIUV');
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        return $this->getElementFromPayload('CF');
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return $this->getElementFromPayload('codiceContestoPagamento');
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
        $auxdigit = $this->getElementFromPayload('AuxDigit');
        $iuv = $this->getElementFromPayload('CodIUV');
        if ((!is_null($auxdigit)) && (!is_null($iuv)))
        {
            return sprintf('%s%s', $auxdigit, $iuv);
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getImportoTotale(): string|null
    {
        return $this->getElementFromPayload('importoSingoloVersamento');
    }

    /**
     * @inheritDoc
     */
    public function getImporto(int $index = 0): string|null
    {
        return $this->getElementFromPayload('importoSingoloVersamento');
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
        return $this->getElementFromPayload('identificativoPSP');
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPsp(): string|null
    {
        return $this->getElementFromPayload('identificativoIntermediarioPSP');
    }

    /**
     * @inheritDoc
     */
    public function getCanale(): string|null
    {
        return $this->getElementFromPayload('identificativoCanale');
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
}