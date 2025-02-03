<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class paSendRT extends ResponseXML
{

    const string XPATH_OUTCOME          = '//paSendRTRes/outcome';
    const string XPATH_FAULT_CODE       = '//paSendRTRes/fault/faultCode';
    const string XPATH_FAULT_STRING     = '//paSendRTRes/fault/faultString';

	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
