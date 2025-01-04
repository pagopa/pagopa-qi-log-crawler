<?php

namespace pagopa\sert\payload\methods\req;

use pagopa\sert\payload\AbstractXmlPayload;

class verifyPaymentNotice extends AbstractXmlPayload
{

    protected string $prefix_xpath = 'verifyPaymentNoticeReq';

    const XPATH_PSP = '/idPSP';

    const XPATH_BROKER_PSP = '/idBrokerPSP';

    const XPATH_CHANNEL = '/idChannel';

    const XPATH_NOTICE_NUMBER = '/qrCode/noticeNumber';

    const XPATH_PA_EMITTENTE = '/qrCode/fiscalCode';

}