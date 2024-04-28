<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseJsonPayload;

class closePaymentV2 extends AbstractResponseJsonPayload
{


    protected string $typePayload = 'json';

    const JPATH_OUTCOME_ESITO = 'outcome';

    public function getPaymentsCount(): int|null
    {
        return null;
    }

}