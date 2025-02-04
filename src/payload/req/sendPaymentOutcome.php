<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class sendPaymentOutcome extends RequestXML
{

    const string XPATH_PSP_ID           = '//sendPaymentOutcomeReq/idPSP';
    const string XPATH_BROKER_PSP       = '//sendPaymentOutcomeReq/idBrokerPSP';
    const string XPATH_BROKER_CHANNEL   = '//sendPaymentOutcomeReq/idChannel';
    const string XPATH_OUTCOME          = '//sendPaymentOutcomeReq/outcome';
    const string XPATH_TOKEN            = '//sendPaymentOutcomeReq/paymentToken';

    public function getPaymentsCount(): int
	{
        return 1;
	}
}
