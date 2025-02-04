<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class paSendRTV2 extends ResponseXML
{
    const string XPATH_OUTCOME          = '//paSendRTV2Response/outcome';
    const string XPATH_FAULT_CODE       = '//paSendRTV2Response/fault/faultCode';
    const string XPATH_FAULT_STRING     = '//paSendRTV2Response/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
