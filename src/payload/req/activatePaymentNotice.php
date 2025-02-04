<?php


namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class activatePaymentNotice extends RequestXML
{

    const string XPATH_NAV              = '//activatePaymentNoticeReq/qrCode/noticeNumber';
    const string XPATH_PA_EMITTENTE     = '//activatePaymentNoticeReq/qrCode/fiscalCode';
    const string XPATH_PSP_ID           = '//activatePaymentNoticeReq/idPSP';
    const string XPATH_BROKER_PSP       = '//activatePaymentNoticeReq/idBrokerPSP';
    const string XPATH_BROKER_CHANNEL   = '//activatePaymentNoticeReq/idChannel';
    const string XPATH_AMOUNT           = '//activatePaymentNoticeReq/amount';
    const string XPATH_TOTAL_AMOUNT     = '//activatePaymentNoticeReq/amount';

    public function getPaymentsCount(): int
    {
        return 1;
    }

}