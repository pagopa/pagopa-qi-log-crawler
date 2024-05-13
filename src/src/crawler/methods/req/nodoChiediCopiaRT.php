<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;

class nodoChiediCopiaRT extends AbstractXmlPayload
{

    protected $prefix_xpath = 'nodoChiediCopiaRT';
    const XPATH_BROKER_PA = '/identificativoIntermediarioPA';
    const XPATH_STATION = '/identificativoStazioneIntermediarioPA';

    const XPATH_IUV = '/identificativoUnivocoVersamento';

    const XPATH_PA_EMITTENTE = '/identificativoDominio';

    const XPATH_TOKEN_CCP = '/codiceContestoPagamento';

    public function getPaymentsCount(): int|null
    {
        return 1;
    }

}