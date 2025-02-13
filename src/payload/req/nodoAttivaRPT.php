<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class nodoAttivaRPT extends RequestXML
{
    const string XPATH_IUV                  = '//nodoAttivaRPT/codiceIdRPT/QrCode/CodIUV';
    const string XPATH_CREDITOR_REFERENCE   = '//nodoAttivaRPT/codiceIdRPT/QrCode/CodIUV';
    const string XPATH_PA_EMITTENTE         = '//nodoAttivaRPT/codiceIdRPT/QrCode/CF';
    const string XPATH_PSP_ID               = '//nodoAttivaRPT/identificativoPSP';
    const string XPATH_BROKER_PSP           = '//nodoAttivaRPT/identificativoIntermediarioPSP';
    const string XPATH_BROKER_CHANNEL       = '//nodoAttivaRPT/identificativoCanale';
    const string XPATH_TOKEN                = '//nodoAttivaRPT/codiceContestoPagamento';
    const string XPATH_AMOUNT               = '//nodoAttivaRPT/datiPagamentoPSP/importoSingoloVersamento';
    const string XPATH_TOTAL_AMOUNT         = '//nodoAttivaRPT/datiPagamentoPSP/importoSingoloVersamento';
	public function getPaymentsCount(): int
	{
		return 1;
	}

    /**
     * <p>Override del metodo in quanto il NAV non è previsto nel vecchio modello, bisogna estrarre AuxDigit e CodIUV</p>
     * @param int $index
     * @return string|null
     */
    public function getNav(int $index = 0): string|null
    {
        if ((is_null($this->getPaEmittente())) || (is_null($this->getIuv())))
        {
            return null;
        }
        return sprintf('%s%s', $this->getElement('//nodoAttivaRPT/codiceIdRPT/QrCode/AuxDigit'), $this->getIuv());
    }
}
