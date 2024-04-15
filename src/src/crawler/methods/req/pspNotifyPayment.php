<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class pspNotifyPayment implements MethodInterface
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

    public function getChoiceAdditionalPayment() : string|null
    {
        $element = $this->getElemento('creditCardPayment');
        if (!is_null($element))
        {
            return 'creditCardPayment';
        }
        $element = $this->getElemento('paypalPayment');
        if (!is_null($element))
        {
            return 'paypalPayment';
        }

        $element = $this->getElemento('bancomatpayPayment');
        if (!is_null($element))
        {
            return 'bancomatpayPayment';
        }

        $element = $this->getElemento('additionalPaymentInformations');
        if (!is_null($element))
        {
            return 'additionalPaymentInformations';
        }
        return null;
    }

    private function getElemento(string $elemento) : string|null
    {
        $xml = new \XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower($elemento)))
            {
                return $xml->readString();
            }
        }
        return null;
    }

    private function getTransferListBlock() : string|null
    {
        $xml = new \XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('transferList')))
            {
                return $xml->readOuterXml();
            }
        }
        return null;
    }

    private function getTransferNumber(int $index = 0) : string|null
    {
        $block = $this->getTransferListBlock();
        $count = 0;
        $xml = new \XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('transfer')))
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

    private function getTransferElement(string $element, int $index = 0) : string|null
    {
        $block = $this->getTransferNumber($index);
        if (is_null($block))
        {
            return null;
        }
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

    private function getMetadataBlock(int $index = 0) : string|null
    {
        $block = $this->getTransferNumber($index);
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLreader::ELEMENT) && (strtolower($xml->localName) == strtolower('metadata')))
            {
                return $xml->readOuterXml();
            }
        }
        return null;
    }

    private function getAdditionalInfoBlock() : string|null
    {
        $xml = new XMLReader();
        $xml->XML($this->payload);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('additionalPaymentInformations')))
            {
                return $xml->readOuterXml();
            }
        }
        return null;
    }


    private function getMetadataPaymentBlock() : string|null
    {
        $block = $this->getAdditionalInfoBlock();
        if (is_null($block))
        {
            return null;
        }
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('metadata')))
            {
                return $xml->readOuterXml();
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
        $value = $this->getElemento('creditorReferenceId');
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $value = $this->getElemento('fiscalCodePA');
        return (is_null($value)) ? null : array($value);
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $value = $this->getElemento('paymentToken');
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
        return $this->getElemento('creditorReferenceId');
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        return $this->getElemento('fiscalCodePA');
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return $this->getElemento('paymentToken');
    }

    /**
     * @inheritDoc
     */
    public function getToken(int $index = 0): string|null
    {
        return $this->getElemento('paymentToken');
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
        return $this->getElemento('debtAmount');
    }

    /**
     * @inheritDoc
     */
    public function getImporto(int $index = 0): string|null
    {
        return $this->getElemento('debtAmount');
    }

    /**
     * @inheritDoc
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0): string|null
    {
        return $this->getTransferElement('transferAmount', $transfer);
    }

    /**
     * @inheritDoc
     */
    public function getTransferPa(int $transfer = 0, int $index = 0): string|null
    {
        return $this->getTransferElement('fiscalCodePA', $transfer);
    }

    /**
     * @inheritDoc
     */
    public function getTransferIban(int $transfer = 0, int $index = 0): string|null
    {
        return $this->getTransferElement('IBAN', $transfer);
    }

    /**
     * @inheritDoc
     */
    public function getTransferId(int $transfer = 0, int $index = 0): string|null
    {
        return $this->getTransferElement('idTransfer', $transfer);
    }

    /**
     * @inheritDoc
     */
    public function getTransferCount(int $index = 0): int|null
    {
        $xmlPart = $this->getTransferListBlock();
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($xmlPart);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('transfer')))
            {
                $count++;
            }
        }
        return $count;
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
        return $this->getElemento('idPSP');
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPsp(): string|null
    {
        return $this->getElemento('idBrokerPSP');
    }

    /**
     * @inheritDoc
     */
    public function getCanale(): string|null
    {
        return $this->getElemento('idChannel');
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
        $metadata_block = $this->getMetadataPaymentBlock();
        if (is_null($metadata_block))
        {
            return 0;
        }
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($metadata_block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'mapEntry'))
            {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMetaDataKey(int $index = 0, int $metaKey = 0): string|null
    {
        $block = $this->getMetadataPaymentBlock();
        if (is_null($block))
        {
            return null;
        }
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'key'))
            {
                if ($count == $metaKey)
                {
                    return $xml->readString();
                }
                $count++;
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMetaDataValue(int $index = 0, int $metaKey = 0): string|null
    {
        $block = $this->getMetadataPaymentBlock();
        if (is_null($block))
        {
            return null;
        }
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && ($xml->localName == 'value'))
            {
                if ($count == $metaKey)
                {
                    return $xml->readString();
                }
                $count++;
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataCount(int $transfer = 0, int $index = 0): string|null
    {
        $block = $this->getMetadataBlock($transfer);
        if (is_null($block))
        {
            return 0;
        }
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('key')))
            {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataKey(int $transfer = 0, int $index = 0, int $metaKey = 0): string|null
    {
        $block = $this->getMetadataBlock($transfer);
        if (is_null($block))
        {
            return null;
        }
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('key')))
            {
                if ($count == $metaKey)
                {
                    return $xml->readString();
                }
                $count++;
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransferMetaDataValue(int $transfer = 0, int $index = 0, int $metaKey = 0): string|null
    {
        $block = $this->getMetadataBlock($transfer);
        if (is_null($block))
        {
            return null;
        }
        $count = 0;
        $xml = new XMLReader();
        $xml->XML($block);
        while($xml->read())
        {
            if (($xml->nodeType == XMLReader::ELEMENT) && (strtolower($xml->localName) == strtolower('value')))
            {
                if ($count == $metaKey)
                {
                    return $xml->readString();
                }
                $count++;
            }
        }
        return null;
    }
    public function getRRN() : string|null
    {
        return $this->getElemento('rrn');
    }

    public function getAuthCode() : string|null
    {
        return $this->getElemento('authorizationCode');
    }

    public function getTransactionId() : string|null
    {
        return $this->getElemento('transactionId');
    }

    public function getPspTransactionId() : string|null
    {
        return $this->getElemento('pspTransactionId');
    }

}