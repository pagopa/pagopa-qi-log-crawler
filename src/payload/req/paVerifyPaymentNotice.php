<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class paVerifyPaymentNotice extends RequestXML
{

    const string XPATH_NAV                  = '//paVerifyPaymentNoticeReq/qrCode/noticeNumber';
    const string XPATH_PA_EMITTENTE         = '//paVerifyPaymentNoticeReq/qrCode/fiscalCode';
    const string XPATH_BROKER_PA            = '//paVerifyPaymentNoticeReq/idBrokerPA';
    const string XPATH_BROKER_STATION       = '//paVerifyPaymentNoticeReq/idStation';

	public function getPaymentsCount(): int
	{
		return 1;
	}
}
