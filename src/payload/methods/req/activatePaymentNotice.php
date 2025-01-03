<?php

namespace pagopa\sert\payload\methods\req;

use pagopa\sert\payload\AbstractXmlPayload;

class activatePaymentNotice extends AbstractXmlPayload
{

    protected string $prefix_xpath = 'activatePaymentNoticeReq';

    const XPATH_PA_EMITTENTE = '/qrCode/fiscalCode';
    const XPATH_NOTICE_NUMBER = '/qrCode/noticeNumber';

    const XPATH_BROKER_PSP = '/idBrokerPSP';

    const XPATH_CHANNEL = '/idChannel';

    const XPATH_PSP = '/idPSP';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/amount';

    const XPATH_TOTAL_CART_AMOUNT = '/amount';


    /**
     * @return int|null
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }
}