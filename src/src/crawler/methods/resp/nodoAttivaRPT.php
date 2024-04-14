<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\FaultInterface;
use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class nodoAttivaRPT implements MethodInterface, FaultInterface
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
        return 1;
    }

    /**
     * @inheritDoc
     */
    public function getIuvs(): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getAllTokens(): array|null
    {
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
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        // potrei restituire codiceIdentificativoUnivoco, ma servirebbe a poco
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getToken(int $index = 0): string|null
    {
        return null;
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
        // inutile prendere l'importo totale, i versamenti di una attivaRPT li prendo dalla RPT
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
        return $this->getElementFromPayload('esito');
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
        return $this->getElementFromPayload('esito') == 'KO';
    }

    /**
     * @return string|null
     */
    public function getFaultCode(): string|null
    {
        return $this->getElementFromPayload('faultCode');
    }

    /**
     * @return string|null
     */
    public function getFaultString(): string|null
    {
        return $this->getElementFromPayload('faultString');
    }

    /**
     * @return string|null
     */
    public function getFaultDescription(): string|null
    {
        return $this->getElementFromPayload('description');
    }
}