<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestJson;

class closePaymentV2 extends RequestJson
{
    const string XPATH_BROKER_PSP           = 'idBrokerPSP';
    const string XPATH_PSP_ID               = 'idPSP';
    const string XPATH_CHANNEL              = 'idChannel';
    const string XPATH_OUTCOME              = 'outcome';
    const string XPATH_TOKEN                = 'paymentTokens.%1$d';
    const string XPATH_TOTAL_AMOUNT         = 'totalAmount';

    public function getPaymentsCount(): int
    {
        return $this->getElementsCount('paymentTokens');
    }

}