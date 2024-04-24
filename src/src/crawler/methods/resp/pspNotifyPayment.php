<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseMethod;

class pspNotifyPayment extends AbstractResponseMethod
{

    protected $prefix_xpath = 'pspNotifyPaymentRes';

    const XPATH_OUTCOME_ESITO = '/outcome';


    public function getPaymentsCount(): int|null
    {
        return null;
    }
}