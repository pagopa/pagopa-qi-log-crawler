<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;

class sendPaymentOutcome extends AbstractXmlPayload
{


    protected $prefix_xpath = 'sendPaymentOutcomeReq';


    const XPATH_TOKEN_CCP = '/paymentToken';

    const XPATH_PSP = '/idPSP';

    const XPATH_BROKER_PSP = '/idBrokerPSP';

    const XPATH_CHANNEL = '/idChannel';

    const XPATH_OUTCOME_ESITO = '/outcome';

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }
}