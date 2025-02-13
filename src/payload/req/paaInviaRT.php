<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\object\RT;
use pagopa\sert\payload\RequestXML;

class paaInviaRT extends RequestXML
{
    const string XPATH_IUV                  = '//intestazionePPT/identificativoUnivocoVersamento';
    const string XPATH_CREDITOR_REFERENCE   = '//intestazionePPT/identificativoUnivocoVersamento';
    const string XPATH_PA_EMITTENTE         = '//intestazionePPT/identificativoDominio';
    const string XPATH_TOKEN                = '//intestazionePPT/codiceContestoPagamento';
    const string XPATH_BROKER_PA            = '//intestazionePPT/identificativoIntermediarioPA';
    const string XPATH_BROKER_STATION       = '//intestazionePPT/identificativoStazioneIntermediarioPA';
    public function getPaymentsCount(): int
	{
		return 1;
	}

    /**
     * <p>Usa la RT nella nodoInviaRT per recuperare l'importo</p>
     * @return string|null <p><code>null</code> Se non esiste la RT o non è recuperabile da essa l'importo totale del pagamento</p>
     */
    public function getTotalAmount(): string|null
    {
        $rt = $this->getRt();
        if (is_null($rt))
        {
            return null;
        }
        return $rt->getImporto();
    }

    /**
     * <p>Recupera l'importo totale della RT. Nelle RT non ci sono carrelli quindi il metodo usato è lo stesso</p>
     * @param int $index <p>Valore ignorato in questo caso</p>
     * @return string|null <p><code>null</code> Se non esiste la RT o non è recuperabile da essa l'importo totale del pagamento</p>
     */
    public function getAmount(int $index = 0): string|null
    {
        return $this->getTotalAmount();
    }

    /**
     * <p>Restituisce l'oggetto RT presente nella nodoInviaRT</p>
     * @return RT|null <p><code>null</code> se l'oggetto RT non esiste</p>
     */
    public function getRt() : RT|null
    {
        $rt = $this->getElement('//paaInviaRT/rt');
        if (is_null($rt))
        {
            return null;
        }
        return new RT(base64_decode($rt));
    }

    /**
     * <p>Restituisce lo IUR del versamento alla posizione <code>\$index</code>.</p>
     * @param int $index <p>Posizione del versamento nella RT</p>
     * @return string|null <p><code>null</code> Se il versamento non esiste</p>
     */
    public function getIur(int $index = 0): string|null
    {
        $rt = $this->getRt();
        if (is_null($rt))
        {
            return null;
        }
        return $this->getRt()->getIur($index);
    }
}
