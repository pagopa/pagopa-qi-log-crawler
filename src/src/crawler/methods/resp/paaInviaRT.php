<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseMethod;

class paaInviaRT extends AbstractResponseMethod
{

    protected $prefix_xpath = 'paaInviaRTRisposta';

    const XPATH_OUTCOME_ESITO = '/esito';

    public function getPaymentsCount(): int|null
    {
        return null;
    }
}