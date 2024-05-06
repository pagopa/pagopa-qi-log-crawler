<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractJsonPayload;

class nodoNotificaAnnullamento extends AbstractJsonPayload
{

    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        parent::__construct('', self::JSON_PAYLOAD);
        $this->isValidPayload = true;
    }

    public function getPaymentsCount(): int|null
    {
        return null;
    }

}