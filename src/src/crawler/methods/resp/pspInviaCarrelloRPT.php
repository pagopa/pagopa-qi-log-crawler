<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseMethod;

class pspInviaCarrelloRPT extends AbstractResponseMethod
{


    protected $prefix_xpath = 'pspInviaCarrelloRPTResponse';

    const XPATH_OUTCOME_ESITO = '/esitoComplessivoOperazione';

    const XPATH_FAULT_CODE = '/listaErroriRPT/fault/faultCode';

    const XPATH_FAULT_STRING = '/listaErroriRPT/fault/faultString';

    const XPATH_FAULT_DESCRIPTION = '/listaErroriRPT/fault/description';


    public function getPaymentsCount(): int|null
    {
        return null;
    }
}