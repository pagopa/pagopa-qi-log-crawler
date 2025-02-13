<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class pspInviaCarrelloRPTCarte extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//pspInviaCarrelloRPTCarteResponse/pspInviaCarrelloRPTResponse/esitoComplessivoOperazione';
    const string XPATH_FAULT_CODE               = '//pspInviaCarrelloRPTCarteResponse/pspInviaCarrelloRPTResponse/listaErroriRPT/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//pspInviaCarrelloRPTCarteResponse/pspInviaCarrelloRPTResponse/listaErroriRPT/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
