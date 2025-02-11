<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseJson;

class closePaymentV2 extends ResponseJson
{

    const string XPATH_OUTCOME          = 'outcome';
    const string XPATH_FAULT_CODE       = 'faultCode';
    const string XPATH_FAULT_STRING     = 'description';

    /**
     * <p>Restituisce sempre 0 perchè il payload di una closePayment-v2 Response da solo non fornisce informazioni utili su quale sia il pagamento associato alla risposta</p>
     * @return int
     */
    public function getPaymentsCount(): int
    {
        return 0;
    }

}