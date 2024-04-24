<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractMethod;
use pagopa\crawler\methods\object\RT;
use XMLReader;

class paaInviaRT extends AbstractMethod
{

    protected RT $object;

    protected $prefix_xpath = 'intestazionePPT';

    const XPATH_IUV = '/identificativoUnivocoVersamento';

    const XPATH_PA_EMITTENTE = '/identificativoDominio';

    const XPATH_TOKEN_CCP = '/codiceContestoPagamento';

    const XPATH_BROKER_PA = '/identificativoIntermediarioPA';

    const XPATH_STATION = '/identificativoStazioneIntermediarioPA';

    public function __construct(string $payload = null)
    {
        parent::__construct($payload);
        $rt_payload = $this->getElementXml($payload, 'rt');
        $this->object = new RT(base64_decode($rt_payload));
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
    public function outcome(): string|null
    {
        return $this->object->getEsito();
    }
}