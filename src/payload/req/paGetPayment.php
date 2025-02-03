<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class paGetPayment extends RequestXML
{

    const string XPATH_NAV                  = '//paGetPaymentReq/qrCode/noticeNumber';
    const string XPATH_PA_EMITTENTE         = '//paGetPaymentReq/qrCode/fiscalCode';
    const string XPATH_BROKER_PA            = '//paGetPaymentReq/idBrokerPA';
    const string XPATH_BROKER_STATION       = '//paGetPaymentReq/idStation';
    const string XPATH_AMOUNT               = '//paGetPaymentReq/amount';
    const string XPATH_TOTAL_AMOUNT         = '//paGetPaymentReq/amount';

    public function getPaymentsCount(): int
	{
		return 1;
	}
}
