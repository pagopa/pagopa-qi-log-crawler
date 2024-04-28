<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;
use pagopa\crawler\methods\object\RPT;
use XMLReader;

class nodoInviaRPT extends AbstractXmlPayload
{

    protected $prefix_xpath = 'nodoInviaRPT';


    const XPATH_PSP = '/identificativoPSP';

    const XPATH_BROKER_PSP = '/identificativoIntermediarioPSP';

    const XPATH_CHANNEL = '/identificativoCanale';


    private function getRpt() : RPT|null
    {
        $rpt = $this->getElemento('rpt');
        return (is_null($rpt)) ? null : new RPT(base64_decode($rpt));
    }

    private function getElemento(string $element) : string|null
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
        $single = $this->getIuv();
        return (is_null($single)) ? null : array($single);
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittenti(): array|null
    {
        $single = $this->getPaEmittente();
        return (is_null($single)) ? null : array($single);
    }

    /**
     * @inheritDoc
     */
    public function getCcps(): array|null
    {
        $single = $this->getCcp();
        return (is_null($single)) ? null : array($single);
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
    public function getIuv(int $index = 0): string|null
    {
        return $this->getElemento('identificativoUnivocoVersamento');
    }

    /**
     * @inheritDoc
     */
    public function getPaEmittente(int $index = 0): string|null
    {
        return $this->getElemento('identificativoDominio');
    }

    /**
     * @inheritDoc
     */
    public function getCcp(int $index = 0): string|null
    {
        return $this->getElemento('codiceContestoPagamento');
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
    public function getImportoTotale(): string|null
    {
        $rpt = $this->getRpt();
        return (is_null($rpt)) ? null : $rpt->getImportoSingolaRPT();
    }

    /**
     * @inheritDoc
     */
    public function getImporto(int $index = 0): string|null
    {
        return $this->getImportoTotale();
    }

    /**
     * @inheritDoc
     */
    public function getTransferAmount(int $transfer = 0, int $index = 0): string|null
    {
        $rpt = $this->getRpt();
        return (is_null($rpt)) ? null : $rpt->getImportoSingoloVersamento($transfer);
    }

    /**
     * @inheritDoc
     */
    public function getTransferPa(int $transfer = 0, int $index = 0): string|null
    {
        if (($transfer + 1) > $this->getTransferCount())
        {
            return null;
        }
        return $this->getPaEmittente();
    }

    /**
     * @inheritDoc
     */
    public function getTransferIban(int $transfer = 0, int $index = 0): string|null
    {
        $rpt = $this->getRpt();
        return (is_null($rpt)) ? null : $rpt->getIbanAccredito($transfer);
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
        $rpt = $this->getRpt();
        return (is_null($rpt)) ? null : $rpt->getTransferCount();
    }

    /**
     * @inheritDoc
     */
    public function isBollo(int $transfer = 0, int $index = 0): bool
    {
        $rpt = $this->getRpt();
        return !(is_null($rpt)) && $rpt->isBollo($transfer);
    }

    /**
     * @inheritDoc
     */
    public function getBrokerPa(): string|null
    {
        return $this->getElemento('identificativoIntermediarioPA');
    }

    /**
     * @inheritDoc
     */
    public function getStazione(): string|null
    {
        return $this->getElemento('identificativoStazioneIntermediarioPA');
    }

}