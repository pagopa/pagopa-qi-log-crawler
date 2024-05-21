<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;

class paSendRT extends AbstractXmlPayload
{


    protected $prefix_xpath = 'paSendRTReq';

    const XPATH_IUV = '/receipt/creditorReferenceId';

    const XPATH_PA_EMITTENTE = '/receipt/fiscalCode';

    const XPATH_TOKEN_CCP = '/receipt/receiptId';
    const XPATH_NOTICE_NUMBER = '/receipt/noticeNumber';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/receipt/paymentAmount';

    const XPATH_TOTAL_CART_AMOUNT = '/receipt/paymentAmount';

    const XPATH_BROKER_PA = '/idBrokerPA';
    const XPATH_STATION = '/idStation';

    const XPATH_PSP = '/receipt/idPSP';

    const XPATH_CHANNEL = '/receipt/idChannel';

    const XPATH_BROKER_PSP = '/receipt/pspFiscalCode';

    public function getPaymentsCount(): int|null
    {
        return 1;
    }
}