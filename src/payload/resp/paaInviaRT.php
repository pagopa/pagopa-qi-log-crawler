<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class paaInviaRT extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//paaInviaRTRisposta/esito';
    const string XPATH_FAULT_CODE               = '//paaInviaRTRisposta/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//paaInviaRTRisposta/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
