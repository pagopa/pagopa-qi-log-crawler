<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractJsonPayload;

class nodoChiediAvanzamentoPagamento extends AbstractJsonPayload
{

    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        parent::__construct('', $type);
    }

    public function getPaymentsCount(): int|null
    {
        return null;
    }

}