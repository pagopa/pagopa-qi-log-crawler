<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\AbstractMethod;
use pagopa\crawler\methods\MethodInterface;
use \XMLReader;

class activatePaymentNotice extends AbstractMethod
{

    protected $prefix_xpath = 'activatePaymentNoticeReq';

    const XPATH_PA_EMITTENTE = '/qrCode/fiscalCode';

    const XPATH_NOTICE_NUMBER = '/qrCode/noticeNumber';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/amount';

    /**
     * Uso questo xpath per l'importo totale di un carrello per recuperare quello del singolo avviso
     * (che comunque potrebbe essere attualizzato)
     */
    const XPATH_TOTAL_CART_AMOUNT = '/amount';

    const XPATH_PSP = '/idPSP';

    const XPATH_BROKER_PSP = '/idBrokerPSP';

    const XPATH_CHANNEL = '/idChannel';


    /**
     * @return int|null
     */
    public function getPaymentsCount(): int|null
    {
        return 1;
    }
}