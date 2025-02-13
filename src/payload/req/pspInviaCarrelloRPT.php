<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\object\RPT;
use pagopa\sert\payload\RequestXML;

class pspInviaCarrelloRPT extends RequestXML
{
    const string XPATH_IUV                  = '//pspInviaCarrelloRPT/listaRPT/elementoListaCarrelloRPT[%1$d]/identificativoUnivocoVersamento';
    const string XPATH_CREDITOR_REFERENCE   = '//pspInviaCarrelloRPT/listaRPT/elementoListaCarrelloRPT[%1$d]/identificativoUnivocoVersamento';
    const string XPATH_PA_EMITTENTE         = '//pspInviaCarrelloRPT/listaRPT/elementoListaCarrelloRPT[%1$d]/identificativoDominio';
    const string XPATH_TOKEN                = '//pspInviaCarrelloRPT/listaRPT/elementoListaCarrelloRPT[%1$d]/codiceContestoPagamento';

    const string XPATH_PSP_ID               = '//pspInviaCarrelloRPT/identificativoPSP';
    const string XPATH_BROKER_PSP           = '//pspInviaCarrelloRPT/identificativoIntermediarioPSP';
    const string XPATH_BROKER_CHANNEL       = '//pspInviaCarrelloRPT/identificativoCanale';

	public function getPaymentsCount(): int
	{
		return $this->getElementsCount('//pspInviaCarrelloRPT/listaRPT/elementoListaCarrelloRPT');
	}

    /**
     * <p>Restituisce l'oggetto <code>RPT</code> per gestire i dati al suo interno</p>
     * @param int $index <p>Posizione della RPT all'interno del carrello</p>
     * @return RPT|null <p><code>null</code> Se la RPT non esiste</p>
     * @see RPT::class
     */
    private function getRpt(int $index = 0) : RPT|null
    {
        $index++;
        $xpath = vsprintf('//pspInviaCarrelloRPT/listaRPT/elementoListaCarrelloRPT[%1$d]/rpt', [$index]);
        $rpt = $this->getElement($xpath);
        if (is_null($rpt))
        {
            return null;
        }
        return new RPT(base64_decode($rpt));
    }

    /**
     * <p>Effettua la somma dei singoli importi di ogni RPT</p>
     * @return string|null
     */
    public function getTotalAmount(): string|null
    {
        $sum = 0;
        for ($i = 0; $i < $this->getPaymentsCount(); $i++)
        {
            $sum += $this->getAmount($i);
        }
        return number_format($sum, 2, '.', '');
    }

    /**
     * <p>Restituisce la PA che ha emesso la RPT alla posizione <code>\$paymentPosition</code></p>
     * @param int $index <p>Posizione della RPT all'interno del carrello. default=0</p>
     * @return string|null <p>Importo della singola RPT</p>
     */
    public function getAmount(int $index = 0): string|null
    {
        $rpt = $this->getRpt($index);
        if (is_null($rpt))
        {
            return null;
        }
        return $rpt->getImportoSingolaRpt();
    }


    /**
     * <p>Restituisce il numero di versamenti presenti nella RPT alla posizione <code>\$paymentPosition</code></p>
     * @param int $paymentPosition <p>Posizione della RPT nel carrello</p>
     * @return int <p>0 se la RPT non esiste, altrimenti il numero di versamenti presenti nella RPT (max=5)</p>
     */
    public function getTransferCount(int $paymentPosition = 0): int
    {
        $rpt = $this->getRpt($paymentPosition);
        if (is_null($rpt))
        {
            return 0;
        }
        return $rpt->getTransferCount();
    }

    /**
     * <p>Restituisce la PA che ha emesso la RPT alla posizione <code>\$paymentPosition</code></p>
     * @param int $transferPosition <p>Ignorato perchè una RPT multi-versamento ha tutti versamenti verso la stessa PA</p>
     * @param int $paymentPosition <p>Posizione della RPT nel carrello</p></p>
     * @return string|null <p>PA proprietaria della RPT, altrimenti <code>null</code> se la RPT alla posizione <code>\$positionPayment</code> non esiste</p>
     */
    public function getTransferPa(int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $rpt = $this->getRpt($paymentPosition);
        if (is_null($rpt))
        {
            return null;
        }
        return $rpt->getPaTransfer();
    }


    /**
     * <p>Restituisce l'importo del transfer alla posizione <code>\$transferPosition</code> nella RPT alla posizione <code>\$paymentPosition</code></p>
     * @param int $transferPosition <p>Ignorato perchè una RPT multi-versamento ha tutti versamenti verso la stessa PA</p>
     * @param int $paymentPosition <p>Posizione della RPT nel carrello</p></p>
     * @return string|null <p>PA proprietaria della RPT, altrimenti <code>null</code> se la RPT alla posizione <code>\$positionPayment</code> non esiste</p>
     */
    public function getTransferAmount(int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $rpt = $this->getRpt($paymentPosition);
        if (is_null($rpt))
        {
            return null;
        }
        return $rpt->getSingoloVersamento($transferPosition);
    }

    /**
     * <p>Restituisce l'IBAN del transfer alla posizione <code>\$transferPosition</code> nella RPT alla posizione <code>\$paymentPosition</code></p>
     * @param int $transferPosition <p>Posizione del versamento nella RPT alla posizione <code>\$positionPayment</code> del carrello</p>
     * @param int $paymentPosition <p>Posizione della RPT nel carrello</p></p>
     * @return string|null <p>L'IBAN del trasferimento se esiste, altrimenti <code>null</code>.</p>
     */
    public function getTransferIban(int $transferPosition = 0, int $paymentPosition = 0): string|null
    {
        $rpt = $this->getRpt($paymentPosition);
        if (is_null($rpt))
        {
            return null;
        }
        return $rpt->getIbanAccredito($transferPosition);
    }

    /**
     * <p>Restituisce true/false se il versamento alla posizione <code>\$transferPosition</code> nella RPT alla posizione <code>\$positionPayment</code> è un bollo</p>
     * @param int $transferPosition <p>Posizione del versamento nella RPT alla posizione <code>\$positionPayment</code> del carrello</p>
     * @param int $paymentPosition <p>Posizione della RPT nel carrello</p></p>
     * @return bool <p>true/false se il versamento corrisponde ad un bollo</p>
     */
    public function isBollo(int $transferPosition = 0, int $paymentPosition = 0): bool
    {
        $rpt = $this->getRpt($paymentPosition);
        if (is_null($rpt))
        {
            return false;
        }
        return $rpt->isBollo($transferPosition);
    }
}
