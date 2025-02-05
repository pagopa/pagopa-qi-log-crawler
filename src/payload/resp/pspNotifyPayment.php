<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class pspNotifyPayment extends ResponseXML
{

    const string XPATH_OUTCOME          = '//pspNotifyPaymentRes/outcome';
    const string XPATH_FAULT_CODE       = '//pspNotifyPaymentRes/fault/faultCode';
    const string XPATH_FAULT_STRING     = '//pspNotifyPaymentRes/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
