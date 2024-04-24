<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseMethod;

class sendPaymentOutcome extends AbstractResponseMethod
{

    protected $prefix_xpath = 'sendPaymentOutcomeRes';


    public function getPaymentsCount(): int|null
    {
        return null;
    }

    const XPATH_OUTCOME_ESITO = '/outcome';



}