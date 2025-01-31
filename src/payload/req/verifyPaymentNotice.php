<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class verifyPaymentNotice extends RequestXML
{
    const string XPATH_NAV = '//verifyPaymentNoticeReq/qrCode/noticeNumber';

    const string XPATH_PA_EMITTENTE = '//verifyPaymentNoticeReq/qrCode/fiscalCode';

    const string XPATH_PSP_ID = '//verifyPaymentNoticeReq/idPSP';

    const string XPATH_BROKER_PSP = '//verifyPaymentNoticeReq/idBrokerPSP';

    const string XPATH_BROKER_CHANNEL = '//verifyPaymentNoticeReq/idChannel';
	public function getPaymentsCount(): int
	{
		return 1;
	}
}
