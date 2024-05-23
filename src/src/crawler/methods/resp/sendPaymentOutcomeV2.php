<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseXmlPayload;

class sendPaymentOutcomeV2 extends AbstractResponseXmlPayload
{

    protected $prefix_xpath = 'sendPaymentOutcomeV2Response';


    const XPATH_OUTCOME_ESITO = '/outcome';


    public function getPaymentsCount(): int|null
    {
        return null;
    }

}