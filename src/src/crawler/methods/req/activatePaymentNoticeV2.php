<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractMethod;

class activatePaymentNoticeV2 extends AbstractMethod
{

    protected $prefix_xpath = 'activatePaymentNoticeV2Request';


    const XPATH_NOTICE_NUMBER = '/qrCode/noticeNumber';


    const XPATH_PA_EMITTENTE = '/qrCode/fiscalCode';

    const XPATH_TOTAL_CART_AMOUNT = '/amount';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/amount';


    const XPATH_PSP = '/idPSP';


    const XPATH_BROKER_PSP = '/idBrokerPSP';


    const XPATH_CHANNEL = '/idChannel';


    public function getPaymentsCount(): int|null
    {
        return 1;
    }


}