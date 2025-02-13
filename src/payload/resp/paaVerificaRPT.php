<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class paaVerificaRPT extends ResponseXML
{

    const string XPATH_PA_EMITTENTE             = '//paaVerificaRPTRisposta/datiPagamentoPA/enteBeneficiario/identificativoUnivocoBeneficiario/codiceIdentificativoUnivoco';
    const string XPATH_OUTCOME                  = '//paaVerificaRPTRisposta/esito';
    const string XPATH_TOTAL_AMOUNT             = '//paaVerificaRPTRisposta/datiPagamentoPA/importoSingoloVersamento';
    const string XPATH_AMOUNT                   = '//paaVerificaRPTRisposta/datiPagamentoPA/importoSingoloVersamento';
    const string XPATH_FAULT_CODE               = '//paaVerificaRPTRisposta/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//paaVerificaRPTRisposta/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
