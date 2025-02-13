<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\object\RT;
use pagopa\sert\payload\RequestXML;

class nodoInviaRT extends RequestXML
{
    const string XPATH_IUV                  = '//nodoInviaRT/identificativoUnivocoVersamento';
    const string XPATH_CREDITOR_REFERENCE   = '//nodoInviaRT/identificativoUnivocoVersamento';
    const string XPATH_PA_EMITTENTE         = '//nodoInviaRT/identificativoDominio';
    const string XPATH_PSP_ID               = '//nodoInviaRT/identificativoPSP';
    const string XPATH_BROKER_PSP           = '//nodoInviaRT/identificativoIntermediarioPSP';
    const string XPATH_BROKER_CHANNEL       = '//nodoInviaRT/identificativoCanale';
    const string XPATH_TOKEN                = '//nodoInviaRT/codiceContestoPagamento';
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
        $rt = $this->getElement('//nodoInviaRT/rt');
        if (is_null($rt))
        {
            return null;
        }
        return new RT(base64_decode($rt));
    }
}
