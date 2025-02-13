<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class nodoInviaRPT extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//nodoInviaRPTRisposta/esito';
    const string XPATH_FAULT_CODE               = '//nodoInviaRPTRisposta/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//nodoInviaRPTRisposta/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
