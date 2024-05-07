<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseJsonPayload;

class nodoInoltraPagamentoMod1 extends AbstractResponseJsonPayload
{

    protected string $typePayload = 'json';


    const JPATH_OUTCOME_ESITO = 'esito';


    public function __construct(string $payload)
    {
        parent::__construct($payload, self::JSON_PAYLOAD);
    }
    public function getPaymentsCount(): int|null
    {
        return null;
    }

    public function isFaultEvent(): bool
    {
        return !($this->outcome() == 'OK');
    }

}