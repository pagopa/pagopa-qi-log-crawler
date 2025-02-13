<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class paaAttivaRPT extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//paaAttivaRPTRisposta/esito';
    const string XPATH_TOTAL_AMOUNT             = '//paaAttivaRPTRisposta/datiPagamentoPA/importoSingoloVersamento';
    const string XPATH_AMOUNT                   = '//paaAttivaRPTRisposta/datiPagamentoPA/importoSingoloVersamento';
    const string XPATH_FAULT_CODE               = '//paaAttivaRPTRisposta/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//paaAttivaRPTRisposta/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
