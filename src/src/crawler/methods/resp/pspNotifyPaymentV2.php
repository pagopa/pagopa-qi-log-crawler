<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseXmlPayload;

class pspNotifyPaymentV2 extends AbstractResponseXmlPayload
{
    protected $prefix_xpath = 'pspNotifyPaymentV2Res';

    const XPATH_OUTCOME_ESITO = '/outcome';


    public function getPaymentsCount(): int|null
    {
        return null;
    }
}