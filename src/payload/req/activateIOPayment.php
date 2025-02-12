<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class activateIOPayment extends RequestXML
{
    const string XPATH_NAV              = '//activateIOPaymentReq/qrCode/noticeNumber';
    const string XPATH_PA_EMITTENTE     = '//activateIOPaymentReq/qrCode/fiscalCode';
    const string XPATH_PSP_ID           = '//activateIOPaymentReq/idPSP';
    const string XPATH_BROKER_PSP       = '//activateIOPaymentReq/idBrokerPSP';
    const string XPATH_BROKER_CHANNEL   = '//activateIOPaymentReq/idChannel';
    const string XPATH_AMOUNT           = '//activateIOPaymentReq/amount';
    const string XPATH_TOTAL_AMOUNT     = '//activateIOPaymentReq/amount';
	public function getPaymentsCount(): int
	{
		return 1;
	}
}
