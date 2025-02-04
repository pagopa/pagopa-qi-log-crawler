<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class sendPaymentOutcomeV2 extends ResponseXML
{

    const string XPATH_OUTCOME          = '//sendPaymentOutcomeV2Response/outcome';
    const string XPATH_FAULT_CODE       = '//sendPaymentOutcomeV2Response/fault/faultCode';
    const string XPATH_FAULT_STRING     = '//sendPaymentOutcomeV2Response/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
