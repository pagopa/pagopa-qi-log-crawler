<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class pspInviaCarrelloRPT extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//pspInviaCarrelloRPTResponse/pspInviaCarrelloRPTResponse/esitoComplessivoOperazione';
    const string XPATH_FAULT_CODE               = '//pspInviaCarrelloRPTResponse/pspInviaCarrelloRPTResponse/listaErroriRPT/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//pspInviaCarrelloRPTResponse/pspInviaCarrelloRPTResponse/listaErroriRPT/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
