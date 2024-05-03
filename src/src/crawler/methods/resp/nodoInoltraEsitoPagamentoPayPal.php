<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseJsonPayload;

class nodoInoltraEsitoPagamentoPayPal extends AbstractResponseJsonPayload
{

    const JPATH_OUTCOME_ESITO = 'esito';

    const JPATH_FAULT_CODE = 'errorCode';

    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        parent::__construct($payload, $type);
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