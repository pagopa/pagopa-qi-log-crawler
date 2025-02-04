<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class activatePaymentNoticeV2 extends RequestXML
{

    const string XPATH_NAV              = '//activatePaymentNoticeV2Request/qrCode/noticeNumber';
    const string XPATH_PA_EMITTENTE     = '//activatePaymentNoticeV2Request/qrCode/fiscalCode';
    const string XPATH_PSP_ID           = '//activatePaymentNoticeV2Request/idPSP';
    const string XPATH_BROKER_PSP       = '//activatePaymentNoticeV2Request/idBrokerPSP';
    const string XPATH_BROKER_CHANNEL   = '//activatePaymentNoticeV2Request/idChannel';
    const string XPATH_AMOUNT           = '//activatePaymentNoticeV2Request/amount';
    const string XPATH_TOTAL_AMOUNT     = '//activatePaymentNoticeV2Request/amount';
	public function getPaymentsCount(): int
	{
		return 1;
	}
}
