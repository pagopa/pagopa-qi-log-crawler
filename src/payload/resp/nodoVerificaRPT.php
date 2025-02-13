<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class nodoVerificaRPT extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//nodoVerificaRPTRisposta/esito';
    const string XPATH_TOTAL_AMOUNT             = '//nodoVerificaRPTRisposta/datiPagamentoPA/importoSingoloVersamento';
    const string XPATH_AMOUNT                   = '//nodoVerificaRPTRisposta/datiPagamentoPA/importoSingoloVersamento';
    const string XPATH_FAULT_CODE               = '//nodoVerificaRPTRisposta/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//nodoVerificaRPTRisposta/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
