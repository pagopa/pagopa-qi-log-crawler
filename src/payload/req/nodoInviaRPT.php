<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\object\RPT;
use pagopa\sert\payload\RequestXML;

class nodoInviaRPT extends RequestXML
{
    const string XPATH_IUV                  = '//intestazionePPT/identificativoUnivocoVersamento';
    const string XPATH_CREDITOR_REFERENCE   = '//intestazionePPT/identificativoUnivocoVersamento';
    const string XPATH_PA_EMITTENTE         = '//intestazionePPT/identificativoDominio';
    const string XPATH_TOKEN                = '//intestazionePPT/codiceContestoPagamento';
    const string XPATH_BROKER_PA            = '//intestazionePPT/identificativoIntermediarioPA';
    const string XPATH_BROKER_STATION       = '//intestazionePPT/identificativoStazioneIntermediarioPA';

    const string XPATH_PSP_ID               = '//nodoInviaRPT/identificativoPSP';
    const string XPATH_BROKER_PSP           = '//nodoInviaRPT/identificativoIntermediarioPSP';
    const string XPATH_BROKER_CHANNEL       = '//nodoInviaRPT/identificativoCanale';
	public function getPaymentsCount(): int
	{
		return 1;
	}


    /**
     * <p>Restituisce l'oggetto <code>RPT</code> per gestire i dati al suo interno</p>
     * @see RPT::class
     * @return RPT|null <p><code>null</code> Se la RPT non esiste</p>
     */
    private function getRpt() : RPT|null
    {
        $rpt = $this->getElement('//nodoInviaRPT/rpt');
        if (is_null($rpt))
        {
            return null;
        }
        return new RPT(base64_decode($rpt));
    }

    /**
     * <p>Restituisce l'importo della singola RPT</p>
     * @param int $index <p>In questo caso il parametro non viene utilizzato</p>
     * @return string|null <p><code>null</code> Se non viene trovato l'importo</p>
     */
    public function getAmount(int $index = 0): string|null
    {
        return $this->getTotalAmount();
    }
    /**
     * <p>Restituisce l'importo della singola RPT</p>
     * @return string|null <p><code>null</code> Se non viene trovato l'importo</p>
     */
    public function getTotalAmount(): string|null
    {
        $rpt = $this->getRpt();
        if (is_null($rpt))
        {
            return null;
        }
        return $rpt->getImportoSingolaRpt();
    }
}
