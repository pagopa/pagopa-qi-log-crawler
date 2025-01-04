<?php

namespace pagopa\sert\payload\methods\resp;

use pagopa\sert\payload\AbstractResponseXmlPayload;

class verifyPaymentNotice extends AbstractResponseXmlPayload
{

    protected string $prefix_xpath = 'verifyPaymentNoticeRes';

    const XPATH_OUTCOME_ESITO = '/outcome';

    const XPATH_PA_EMITTENTE = '/fiscalCodePA';


    public function getImportoTotale(): string|null
    {
        $elements = $this->getElementCount('/paymentList/paymentOptionDescription/amount');
        $amount = null;
        for($i=0;$i<$elements;$i++)
        {
            $amount += $this->getElement('/paymentList/paymentOptionDescription/amount', $i);
        }
        return (string) number_format($amount, 2, '.', '');
    }

    public function getImporto(int $index = 0): string|null
    {
        return $this->getImportoTotale();
    }

}