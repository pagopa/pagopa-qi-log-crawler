<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseXmlPayload;

class nodoInviaRT extends AbstractResponseXmlPayload
{

    protected $prefix_xpath = 'nodoInviaRTRisposta';

    const XPATH_OUTCOME_ESITO = '/esito';

    /**
     * @inheritDoc
     */
    public function getPaymentsCount(): int|null
    {
        return null;
    }

}