<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestJson;

class closePaymentV1 extends RequestJson
{
    const string XPATH_BROKER_PSP           = 'idBrokerPSP';
    const string XPATH_PSP_ID               = 'idPSP';
    const string XPATH_BROKER_CHANNEL       = 'idChannel';
    const string XPATH_OUTCOME              = 'outcome';
    const string XPATH_TOKEN                = 'paymentTokens.0';

    public function getPaymentsCount(): int
    {
        return 1;
    }

}