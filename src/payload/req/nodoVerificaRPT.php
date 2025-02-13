<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class nodoVerificaRPT extends RequestXML
{
    const string XPATH_IUV                  = '//nodoVerificaRPT/codiceIdRPT/QrCode/CodIUV';
    const string XPATH_CREDITOR_REFERENCE   = '//nodoVerificaRPT/codiceIdRPT/QrCode/CodIUV';
    const string XPATH_PA_EMITTENTE         = '//nodoVerificaRPT/codiceIdRPT/QrCode/CF';
    const string XPATH_PSP_ID               = '//nodoVerificaRPT/identificativoPSP';
    const string XPATH_BROKER_PSP           = '//nodoVerificaRPT/identificativoIntermediarioPSP';
    const string XPATH_BROKER_CHANNEL       = '//nodoVerificaRPT/identificativoCanale';
    const string XPATH_TOKEN                = '//nodoVerificaRPT/codiceContestoPagamento';
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
        return sprintf('%s%s', $this->getElement('//nodoVerificaRPT/codiceIdRPT/QrCode/AuxDigit'), $this->getIuv());
    }
}
