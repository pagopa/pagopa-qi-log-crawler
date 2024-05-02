<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractJsonPayload;

class nodoInoltraEsitoPagamentoCarta extends AbstractJsonPayload
{

    const JPATH_PSP = 'identificativoPsp';

    const JPATH_BROKER_PSP = 'identificativoIntermediario';

    const JPATH_CHANNEL = 'identificativoCanale';

    const JPATH_TOTAL_CART_AMOUNT = 'importoTotalePagato';


    public function __construct(string $payload, string $type = self::XML_PAYLOAD)
    {
        parent::__construct($payload, $type);
    }

    public function getPaymentsCount(): int|null
    {
        return null;
    }
}