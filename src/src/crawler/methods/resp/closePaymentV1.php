<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseJsonPayload;

class closePaymentV1 extends AbstractResponseJsonPayload
{


    protected string $typePayload = 'json';

    const JPATH_OUTCOME_ESITO = 'esito';

    public function getPaymentsCount(): int|null
    {
        return null;
    }

}