<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class paGetPayment extends ResponseXML
{

    const string XPATH_OUTCOME                          = '//paGetPaymentRes/outcome';
    const string XPATH_CREDITOR_REFERENCE               = '//paGetPaymentRes/data/creditorReferenceId';
    const string XPATH_IUV                              = '//paGetPaymentRes/data/creditorReferenceId';
    const string XPATH_AMOUNT                           = '//paGetPaymentRes/data/paymentAmount';
    const string XPATH_TOTAL_AMOUNT                     = '//paGetPaymentRes/data/paymentAmount';
    const string XPATH_TRANSFER_COUNT                   = '//paGetPaymentRes/data/transferList/transfer';
    const string XPATH_TRANSFER_ID                      = '//paGetPaymentRes/data/transferList/transfer[%1$d]/idTransfer';
    const string XPATH_TRANSFER_IBAN                    = '//paGetPaymentRes/data/transferList/transfer[%1$d]/IBAN';
    const string XPATH_TRANSFER_PA                      = '//paGetPaymentRes/data/transferList/transfer[%1$d]/fiscalCodePA';
    const string XPATH_TRANSFER_AMOUNT                  = '//paGetPaymentRes/data/transferList/transfer[%1$d]/transferAmount';
    const string XPATH_TRANSFER_METADATA_COUNT          = '//paGetPaymentRes/data/transferList/transfer[%1$d]/metadata/mapEntry';
    const string XPATH_TRANSFER_METADATA_NAME           = '//paGetPaymentRes/data/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_TRANSFER_METADATA_VALUE          = '//paGetPaymentRes/data/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';
    const string XPATH_PAYMENT_METADATA_COUNT           = '//paGetPaymentRes/data/metadata/mapEntry';
    const string XPATH_PAYMENT_METADATA_NAME            = '//paGetPaymentRes/data/metadata/mapEntry[%1$d]/key';
    const string XPATH_PAYMENT_METADATA_VALUE           = '//paGetPaymentRes/data/metadata/mapEntry[%1$d]/value';

    const string XPATH_FAULT_CODE                       = '//paGetPaymentRes/fault/faultCode';
    const string XPATH_FAULT_STRING                     = '//paGetPaymentRes/fault/faultString';

    public function getPaymentsCount(): int
    {
        if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
    }
}
