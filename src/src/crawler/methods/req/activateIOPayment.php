<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\AbstractMethod;
use pagopa\crawler\methods\MethodInterface;
use XMLReader;
class activateIOPayment extends AbstractMethod
{
    protected $prefix_xpath = 'activateIOPaymentReq';

    const XPATH_PA_EMITTENTE = '/qrCode/fiscalCode';

    const XPATH_NOTICE_NUMBER = '/qrCode/noticeNumber';

    const XPATH_TOTAL_CART_AMOUNT = '/amount';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/amount';

    const XPATH_PSP = '/idPSP';

    const XPATH_BROKER_PSP = '/idBrokerPSP';

    const XPATH_CHANNEL = '/idChannel';

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }
}