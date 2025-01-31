<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\RequestXML;

class sendPaymentOutcome extends \pagopa\sert\payload\ResponseXML
{

    const string XPATH_OUTCOME                  = '//sendPaymentOutcomeRes/outcome';
    const string XPATH_FAULT_CODE               = '//sendPaymentOutcomeRes/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//sendPaymentOutcomeRes/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
