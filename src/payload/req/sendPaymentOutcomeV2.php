<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class sendPaymentOutcomeV2 extends RequestXML
{

    const string XPATH_PSP_ID                 = '//sendPaymentOutcomeV2Request/idPSP';
    const string XPATH_BROKER_PSP             = '//sendPaymentOutcomeV2Request/idBrokerPSP';
    const string XPATH_BROKER_CHANNEL         = '//sendPaymentOutcomeV2Request/idChannel';
    const string XPATH_TOKEN                  = '//sendPaymentOutcomeV2Request/paymentTokens/paymentToken[%1$d]';
    const string XPATH_OUTCOME                = '//sendPaymentOutcomeV2Request/outcome';
	public function getPaymentsCount(): int
	{
		return $this->getElementsCount('//sendPaymentOutcomeV2Request/paymentTokens/paymentToken');
	}
}
