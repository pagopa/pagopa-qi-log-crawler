<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class nodoAttivaRPT extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//nodoAttivaRPTRisposta/esito';
    const string XPATH_TOTAL_AMOUNT             = '//nodoAttivaRPTRisposta/datiPagamentoPA/importoSingoloVersamento';
    const string XPATH_AMOUNT                   = '//nodoAttivaRPTRisposta/datiPagamentoPA/importoSingoloVersamento';
    const string XPATH_FAULT_CODE               = '//nodoAttivaRPTRisposta/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//nodoAttivaRPTRisposta/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
