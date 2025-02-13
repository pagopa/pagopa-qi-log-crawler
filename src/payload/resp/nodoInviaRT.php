<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class nodoInviaRT extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//nodoInviaRTRisposta/esito';
    const string XPATH_FAULT_CODE               = '//nodoInviaRTRisposta/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//nodoInviaRTRisposta/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
