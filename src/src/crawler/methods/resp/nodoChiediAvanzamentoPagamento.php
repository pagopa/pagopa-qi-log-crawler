<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseJsonPayload;

class nodoChiediAvanzamentoPagamento extends AbstractResponseJsonPayload
{

    const JPATH_OUTCOME_ESITO = 'esito';

    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        parent::__construct($payload, self::JSON_PAYLOAD);
    }

    public function getPaymentsCount(): int|null
    {
        return null;
    }
}