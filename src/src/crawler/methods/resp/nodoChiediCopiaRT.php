<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseXmlPayload;
use pagopa\crawler\methods\AbstractXmlPayload;
use pagopa\crawler\methods\object\RT;

class nodoChiediCopiaRT extends AbstractResponseXmlPayload
{
    protected $prefix_xpath = 'nodoChiediCopiaRTRisposta';

    protected RT $rt;

    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        parent::__construct($payload, $type);
        if (!$this->isFaultEvent())
        {
            $this->rt = new RT(base64_decode($this->getElement('/rt')));
        }
    }


    public function getAllTokens(): array|null
    {
        return $this->getCcps();
    }

    public function getIuvs() : array|null
    {
        $iuvs = $this->getIuv();
        return (is_null($iuvs)) ? null : array($iuvs);
    }

    public function getPaEmittenti(): array|null
    {
        $value = $this->getPaEmittente();
        return (is_null($value)) ? null : array($value);
    }

    public function getCcps(): array|null
    {
        $tokens = $this->getCcp();
        return (is_null($tokens)) ? null : array($tokens);
    }


    public function getIuv(int $index = 0): string|null
    {
        return (!isset($this->rt)) ? null : $this->rt->getIuv();
    }

    public function getPaEmittente(int $index = 0): string|null
    {
        return (!isset($this->rt)) ? null : $this->rt->getPaEmittente();
    }

    public function getCcp(int $index = 0): string|null
    {
        return (!isset($this->rt)) ? null : $this->rt->getCcp();
    }

    public function getToken(int $index = 0): string|null
    {
        return $this->getCcp();
    }

    public function outcome(): string|null
    {
        return (!$this->isFaultEvent()) ? 'OK' : 'KO';
    }

}