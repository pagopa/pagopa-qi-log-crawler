<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class paGetPaymentV2 extends RequestXML
{

    const string XPATH_NAV                  = '//paGetPaymentV2Request/qrCode/noticeNumber';
    const string XPATH_PA_EMITTENTE         = '//paGetPaymentV2Request/qrCode/fiscalCode';
    const string XPATH_BROKER_PA            = '//paGetPaymentV2Request/idBrokerPA';
    const string XPATH_BROKER_STATION       = '//paGetPaymentV2Request/idStation';
    const string XPATH_AMOUNT               = '//paGetPaymentV2Request/amount';
    const string XPATH_TOTAL_AMOUNT         = '//paGetPaymentV2Request/amount';
	public function getPaymentsCount(): int
	{
		return 1;
	}
}
