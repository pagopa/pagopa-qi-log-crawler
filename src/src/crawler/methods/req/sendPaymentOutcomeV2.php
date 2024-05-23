<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;

class sendPaymentOutcomeV2 extends AbstractXmlPayload
{

    protected $prefix_xpath = 'sendPaymentOutcomeV2Request';

    const XPATH_PSP = '/idPSP';

    const XPATH_BROKER_PSP = '/idBrokerPSP';

    const XPATH_CHANNEL = '/idChannel';

    const XPATH_TOKEN_CCP = '/paymentTokens/paymentToken[%1$d]';


    const XPATH_OUTCOME_ESITO = '/outcome';

    const XPATH_PAYMENT_METHOD = '/details/paymentMethod';

    const XPATH_PAYMENT_CHANNEL = '/details/paymentChannel';


    public function getPaymentsCount(): int|null
    {
        return $this->getElementCount('/paymentTokens/paymentToken');
    }

    /**
     * Restituisce il valore del tag <details><paymentMethod></paymentMethod></details>
     * @return string|null
     * @throws \Exception
     */
    public function getPaymentMethod() : null|string
    {
        return $this->getElement(self::XPATH_PAYMENT_METHOD);
    }

    /**
     * Restituisce il valore del tag <details><paymentChannel></paymentChannel></details>
     * @return string|null
     * @throws \Exception
     */
    public function getPaymentChannel() : null|string
    {
        return $this->getElement(self::XPATH_PAYMENT_CHANNEL);
    }
}