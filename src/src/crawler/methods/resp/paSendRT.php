<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseXmlPayload;

class paSendRT extends AbstractResponseXmlPayload
{

    protected $prefix_xpath = 'paSendRTRes';

    const XPATH_OUTCOME_ESITO = '/outcome';

    public function getPaymentsCount(): int|null
    {
        return null;
    }

}