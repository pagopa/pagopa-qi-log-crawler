<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseMethod;

class pspInviaCarrelloRPTCarte extends AbstractResponseMethod
{

    protected $prefix_xpath = 'pspInviaCarrelloRPTCarteResponse';



    const XPATH_OUTCOME_ESITO = '/esitoComplessivoOperazione';

    const XPATH_FAULT_CODE = '/listaErroriRPT/fault/faultCode';

    const XPATH_FAULT_STRING = '/listaErroriRPT/fault/faultString';

    const XPATH_FAULT_DESCRIPTION = '/listaErroriRPT/fault/description';


    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return null;
    }

}