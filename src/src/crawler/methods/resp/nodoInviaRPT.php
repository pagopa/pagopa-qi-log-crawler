<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\AbstractResponseMethod;
use pagopa\crawler\FaultInterface;
use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

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