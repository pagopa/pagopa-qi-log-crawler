<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;
class activatePaymentNotice extends ResponseXML
{

    const string XPATH_OUTCOME                  = '//activatePaymentNoticeRes/outcome';
    const string XPATH_TOTAL_AMOUNT             = '//activatePaymentNoticeRes/totalAmount';
    const string XPATH_AMOUNT                   = '//activatePaymentNoticeRes/totalAmount';
    const string XPATH_IUV                      = '//activatePaymentNoticeRes/creditorReferenceId';
    const string XPATH_CREDITOR_REFERENCE       = '//activatePaymentNoticeRes/creditorReferenceId';
    const string XPATH_PA_EMITTENTE             = '//activatePaymentNoticeRes/fiscalCodePA';
    const string XPATH_TOKEN                    = '//activatePaymentNoticeRes/paymentToken';
    const string XPATH_TRANSFER_COUNT           = '//activatePaymentNoticeRes/transferList/transfer';
    const string XPATH_TRANSFER_ID              = '//activatePaymentNoticeRes/transferList/transfer[%1$d]/idTransfer';
    const string XPATH_TRANSFER_AMOUNT          = '//activatePaymentNoticeRes/transferList/transfer[%1$d]/transferAmount';
    const string XPATH_TRANSFER_PA              = '//activatePaymentNoticeRes/transferList/transfer[%1$d]/fiscalCodePA';
    const string XPATH_TRANSFER_IBAN            = '//activatePaymentNoticeRes/transferList/transfer[%1$d]/IBAN';
    const string XPATH_TRANSFER_METADATA_COUNT  = '//activatePaymentNoticeRes/transferList/transfer[%1$d]/metadata/mapEntry';
    const string XPATH_TRANSFER_METADATA_NAME   = '//activatePaymentNoticeRes/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_TRANSFER_METADATA_VALUE  = '//activatePaymentNoticeRes/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';
    const string XPATH_FAULT_CODE               = '//activatePaymentNoticeRes/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//activatePaymentNoticeRes/fault/faultString';

    public function getPaymentsCount(): int
    {
        if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
    }

}