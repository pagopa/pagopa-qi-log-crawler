<?php

namespace pagopa\crawler\methods\req;

use pagopa\crawler\methods\AbstractXmlPayload;

class paGetPayment extends AbstractXmlPayload
{


    protected $prefix_xpath = 'paGetPaymentReq';

    const XPATH_PA_EMITTENTE = '/qrCode/fiscalCode';
    const XPATH_NOTICE_NUMBER = '/qrCode/noticeNumber';

    const XPATH_SINGLE_PAYMENT_IMPORT = '/amount';

    /**
     * Uso questo xpath per l'importo totale di un carrello per recuperare quello del singolo avviso
     * (che comunque potrebbe essere attualizzato)
     */
    const XPATH_TOTAL_CART_AMOUNT = '/amount';

    const XPATH_BROKER_PA = '/idBrokerPA';
    const XPATH_STATION = '/idStation';

    public function getPaymentsCount(): int|null
    {
        return 1;
    }
}