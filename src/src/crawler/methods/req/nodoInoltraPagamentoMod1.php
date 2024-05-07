<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractJsonPayload;

class nodoInoltraPagamentoMod1 extends AbstractJsonPayload
{

    protected string $typePayload = 'json';


    const JPATH_CHANNEL = 'identificativoCanale';

    const JPATH_BROKER_PSP = 'identificativoIntermediario';

    const JPATH_PSP = 'identificativoPsp';

    public function __construct(string $payload)
    {
        parent::__construct($payload, self::JSON_PAYLOAD);
    }

    public function getPaymentsCount(): int|null
    {
        return null;
    }


}