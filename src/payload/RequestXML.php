<?php

namespace pagopa\sert\payload;

use old\old2\payload\Payload;

class RequestXML extends XmlParser
{
    /**
     * Costante per recuperare il nav
     */
    const string XPATH_NAV = '';

    const string XPATH_PA_EMITTENTE = '';

    const string XPATH_IUV = '';
    const string XPATH_CREDITOR_REFERENCE = '';
    const string XPATH_TOKEN = '';

    const string XPATH_AMOUNT = '';
    const string XPATH_TOTAL_AMOUNT = '';

    const string XPATH_TRANSFER_COUNT = '';

    const string XPATH_TRANSFER_ID = '';

    const string XPATH_TRANSFER_AMOUNT = '';


    const string XPATH_TRANSFER_PA = '';

    const string XPATH_TRANSFER_IBAN = '';

    const string XPATH_TRANSFER_BOLLO = '';

    const string XPATH_PAYMENT_METADATA_COUNT = '';


    const string XPATH_PAYMENT_METADATA_NAME = '';


    const string XPATH_PAYMENT_METADATA_VALUE = '';


    const string XPATH_TRANSFER_METADATA_COUNT = '';


    const string XPATH_TRANSFER_METADATA_NAME = '';


    const string XPATH_TRANSFER_METADATA_VALUE = '';


    const string XPATH_BROKER_PA = '';

    const string XPATH_BROKER_STATION = '';


    const string XPATH_PSP_ID = '';

    const string XPATH_BROKER_CHANNEL = '';

    const string XPATH_BROKER_PSP = '';

    const string XPATH_OUTCOME = '';

    public function getNav(int $index = 0): string|null
    {
        $xpath = vsprintf(static::XPATH_NAV, [$index]);
        return $this->getElement($xpath);
    }

    public function getPaEmittente(int $index = 0): string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_PA_EMITTENTE, [$index]);
        return $this->getElement($xpath);
    }

    public function getIuv(int $index = 0): string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_IUV, [$index]);
        return $this->getElement($xpath);
    }

    public function getCreditorReference(int $index = 0): string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_CREDITOR_REFERENCE, [$index]);
        return $this->getElement($xpath);
    }

    public function getPaymentsCount(): int
    {
        return 1;
    }
    public function getToken(int $index = 0): string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_TOKEN, [$index]);
        return $this->getElement($xpath);
    }

    public function getAmount(int $index = 0) : string|null
    {
        $index++;
        $xpath = vsprintf(static::XPATH_AMOUNT, [$index]);
        return $this->getElement($xpath);
    }

    public function getTotalAmount() : string|null
    {
        return $this->getElement(static::XPATH_TOTAL_AMOUNT);
    }

    public function getTransferCount(int $paymentPosition = 0): int
    {
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_COUNT, [$paymentPosition]);
        return $this->getElementsCount($xpath);
    }

    public function getTransferId(int $transferPosition = 0, $paymentPosition = 0): string|null
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_ID, [$transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    public function getTransferAmount(int $transferPosition = 0, $paymentPosition = 0): string|null
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_AMOUNT, [$transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    public function getTransferPa(int $transferPosition = 0, $paymentPosition = 0): string|null
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_PA, [$transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    public function getTransferIban(int $transferPosition = 0, $paymentPosition = 0): string|null
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_IBAN, [$transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    public function isBollo(int $transferPosition = 0, $paymentPosition = 0): bool
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_BOLLO, [$transferPosition, $paymentPosition]);
        return !is_null($this->getElement($xpath));
    }

    public function getPaymentMetaDataCount(int $paymentPosition = 0): int
    {
        return $this->getElementsCount(static::XPATH_PAYMENT_METADATA_COUNT);
    }

    public function getPaymentMetaDataName(int $metadataPosition = 0, int $paymentPosition = 0): string|null
    {
        $metadataPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_PAYMENT_METADATA_NAME, [$metadataPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    public function getPaymentMetaDataValue(int $metadataPosition = 0, int $paymentPosition = 0): string|null
    {
        $metadataPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_PAYMENT_METADATA_VALUE, [$metadataPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    public function getTransferMetaDataCount(int $transferPosition = 0, $paymentPosition = 0): int
    {
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_METADATA_COUNT, [$transferPosition, $paymentPosition]);
        return $this->getElementsCount($xpath);
    }

    public function getTransferMetaDataName(int $metadataPosition = 0, int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $metadataPosition++;
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_METADATA_NAME, [$metadataPosition, $transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    public function getTransferMetaDataValue(int $metadataPosition = 0, int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $metadataPosition++;
        $transferPosition++;
        $paymentPosition++;
        $xpath = vsprintf(static::XPATH_TRANSFER_METADATA_VALUE, [$metadataPosition, $transferPosition, $paymentPosition]);
        return $this->getElement($xpath);
    }

    public function getBrokerPa(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_PA);
    }

    public function getBrokerStation(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_STATION);
    }

    public function getPspId(): string|null
    {
        return $this->getElement(static::XPATH_PSP_ID);
    }

    public function getPspChannel(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_CHANNEL);
    }

    public function getPspBroker(): string|null
    {
        return $this->getElement(static::XPATH_BROKER_PSP);
    }

    public function getOutcome(): string|null
    {
        return $this->getElement(static::XPATH_OUTCOME);
    }
}