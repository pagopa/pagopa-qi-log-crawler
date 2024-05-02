<?php

namespace pagopa\crawler\methods\resp;

use pagopa\crawler\methods\AbstractResponseXmlPayload;

class cdInfoWisp extends AbstractResponseXmlPayload
{
    protected $prefix_xpath = 'cdInfoWispResponse';


    const XPATH_OUTCOME_ESITO = '/esito';
}