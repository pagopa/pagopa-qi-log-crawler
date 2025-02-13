<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class nodoInviaCarrelloRPT extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//nodoInviaCarrelloRPTRisposta/esitoComplessivoOperazione';
    const string XPATH_FAULT_CODE               = '//nodoInviaCarrelloRPTRisposta/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//nodoInviaCarrelloRPTRisposta/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
