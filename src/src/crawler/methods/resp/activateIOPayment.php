<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseXmlPayload;

class activateIOPayment extends AbstractResponseXmlPayload
{

    protected $prefix_xpath = 'activateIOPaymentRes';

    const XPATH_IUV = '/creditorReferenceId';

    const XPATH_PA_EMITTENTE = '/fiscalCodePA';

    const XPATH_TOKEN_CCP = '/paymentToken';

    const XPATH_TOTAL_CART_AMOUNT = '/totalAmount';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/totalAmount';

    const XPATH_OUTCOME_ESITO = '/outcome';

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }
}