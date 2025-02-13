<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class paaAttivaRPT extends RequestXML
{
    const string XPATH_IUV                  = '//intestazionePPT/identificativoUnivocoVersamento';
    const string XPATH_CREDITOR_REFERENCE   = '//intestazionePPT/identificativoUnivocoVersamento';
    const string XPATH_PA_EMITTENTE         = '//intestazionePPT/identificativoDominio';
    const string XPATH_TOKEN                = '//intestazionePPT/codiceContestoPagamento';
    const string XPATH_BROKER_PA            = '//intestazionePPT/identificativoIntermediarioPA';
    const string XPATH_BROKER_STATION       = '//intestazionePPT/identificativoStazioneIntermediarioPA';
    const string XPATH_AMOUNT               = '//paaAttivaRPT/datiPagamentoPSP/importoSingoloVersamento';
    const string XPATH_TOTAL_AMOUNT         = '//paaAttivaRPT/datiPagamentoPSP/importoSingoloVersamento';
	public function getPaymentsCount(): int
	{
		return 1;
	}
}
