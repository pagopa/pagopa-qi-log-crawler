<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class paGetPaymentV2 extends ResponseXML
{
    const string XPATH_OUTCOME                          = '//paGetPaymentV2Response/outcome';
    const string XPATH_CREDITOR_REFERENCE               = '//paGetPaymentV2Response/data/creditorReferenceId';
    const string XPATH_IUV                              = '//paGetPaymentV2Response/data/creditorReferenceId';
    const string XPATH_AMOUNT                           = '//paGetPaymentV2Response/data/paymentAmount';
    const string XPATH_TOTAL_AMOUNT                     = '//paGetPaymentV2Response/data/paymentAmount';
    const string XPATH_TRANSFER_COUNT                   = '//paGetPaymentV2Response/data/transferList/transfer';
    const string XPATH_TRANSFER_ID                      = '//paGetPaymentV2Response/data/transferList/transfer[%1$d]/idTransfer';
    const string XPATH_TRANSFER_IBAN                    = '//paGetPaymentV2Response/data/transferList/transfer[%1$d]/IBAN';
    const string XPATH_TRANSFER_BOLLO                   = '//paGetPaymentV2Response/data/transferList/transfer[%1$d]/richiestaMarcaDaBollo';
    const string XPATH_TRANSFER_PA                      = '//paGetPaymentV2Response/data/transferList/transfer[%1$d]/fiscalCodePA';
    const string XPATH_TRANSFER_AMOUNT                  = '//paGetPaymentV2Response/data/transferList/transfer[%1$d]/transferAmount';
    const string XPATH_TRANSFER_METADATA_COUNT          = '//paGetPaymentV2Response/data/transferList/transfer[%1$d]/metadata/mapEntry';
    const string XPATH_TRANSFER_METADATA_NAME           = '//paGetPaymentV2Response/data/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_TRANSFER_METADATA_VALUE          = '//paGetPaymentV2Response/data/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';
    const string XPATH_PAYMENT_METADATA_COUNT           = '//paGetPaymentV2Response/data/metadata/mapEntry';
    const string XPATH_PAYMENT_METADATA_NAME            = '//paGetPaymentV2Response/data/metadata/mapEntry[%1$d]/key';
    const string XPATH_PAYMENT_METADATA_VALUE           = '//paGetPaymentV2Response/data/metadata/mapEntry[%1$d]/value';

    const string XPATH_FAULT_CODE                       = '//paGetPaymentV2Response/fault/faultCode';
    const string XPATH_FAULT_STRING                     = '//paGetPaymentV2Response/fault/faultString';
	public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
