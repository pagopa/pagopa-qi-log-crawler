<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseMethod;

class nodoInviaRPT extends AbstractResponseMethod
{

    protected $prefix_xpath = 'nodoInviaRPTRisposta';

    const XPATH_OUTCOME_ESITO = '/esito';


    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return null;
    }

}