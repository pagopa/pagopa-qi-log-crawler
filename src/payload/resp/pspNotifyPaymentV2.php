<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class pspNotifyPaymentV2 extends ResponseXML
{

    const string XPATH_OUTCOME          = '//pspNotifyPaymentV2Res/outcome';
    const string XPATH_FAULT_CODE       = '//pspNotifyPaymentV2Res/fault/faultCode';
    const string XPATH_FAULT_STRING     = '//pspNotifyPaymentV2Res/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
