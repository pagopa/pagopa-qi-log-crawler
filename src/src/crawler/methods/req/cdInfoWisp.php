<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;

class cdInfoWisp extends AbstractXmlPayload
{

    protected $prefix_xpath = 'cdInfoWisp';

    const XPATH_IUV = '/identificativoUnivocoVersamento';

    const XPATH_PA_EMITTENTE = '/identificativoDominio';

    const XPATH_TOKEN_CCP = '/codiceContestoPagamento';

    public function getPaymentsCount(): int|null
    {
        return 1;
    }
}