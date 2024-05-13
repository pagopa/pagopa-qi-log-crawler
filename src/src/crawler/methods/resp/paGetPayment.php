<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseXmlPayload;

class paGetPayment extends AbstractResponseXmlPayload
{

    protected $prefix_xpath = 'paGetPaymentRes';

    const XPATH_OUTCOME_ESITO = '/outcome';

    const XPATH_IUV = '/data/creditorReferenceId';

    const XPATH_TOKEN_CCP = '/data/paymentToken';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/data/paymentAmount';

    const XPATH_TOTAL_CART_AMOUNT = '/data/paymentAmount';


    public function getPaymentsCount(): int|null
    {
        return 1;
    }


}