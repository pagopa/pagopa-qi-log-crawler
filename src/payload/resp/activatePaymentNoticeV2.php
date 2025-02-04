<?php

namespace pagopa\sert\payload\resp;

use pagopa\sert\payload\ResponseXML;

class activatePaymentNoticeV2 extends ResponseXML
{
    const string XPATH_OUTCOME                  = '//activatePaymentNoticeV2Response/outcome';
    const string XPATH_TOTAL_AMOUNT             = '//activatePaymentNoticeV2Response/totalAmount';
    const string XPATH_AMOUNT                   = '//activatePaymentNoticeV2Response/totalAmount';
    const string XPATH_IUV                      = '//activatePaymentNoticeV2Response/creditorReferenceId';
    const string XPATH_CREDITOR_REFERENCE       = '//activatePaymentNoticeV2Response/creditorReferenceId';
    const string XPATH_PA_EMITTENTE             = '//activatePaymentNoticeV2Response/fiscalCodePA';
    const string XPATH_TOKEN                    = '//activatePaymentNoticeV2Response/paymentToken';
    const string XPATH_TRANSFER_COUNT           = '//activatePaymentNoticeV2Response/transferList/transfer';
    const string XPATH_TRANSFER_ID              = '//activatePaymentNoticeV2Response/transferList/transfer[%1$d]/idTransfer';
    const string XPATH_TRANSFER_AMOUNT          = '//activatePaymentNoticeV2Response/transferList/transfer[%1$d]/transferAmount';
    const string XPATH_TRANSFER_PA              = '//activatePaymentNoticeV2Response/transferList/transfer[%1$d]/fiscalCodePA';
    const string XPATH_TRANSFER_IBAN            = '//activatePaymentNoticeV2Response/transferList/transfer[%1$d]/IBAN';
    const string XPATH_TRANSFER_BOLLO           = '//activatePaymentNoticeV2Response/transferList/transfer[%1$d]/richiestaMarcaDaBollo';
    const string XPATH_TRANSFER_METADATA_COUNT  = '//activatePaymentNoticeV2Response/transferList/transfer[%1$d]/metadata/mapEntry';
    const string XPATH_TRANSFER_METADATA_NAME   = '//activatePaymentNoticeV2Response/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_TRANSFER_METADATA_VALUE  = '//activatePaymentNoticeV2Response/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';
    const string XPATH_PAYMENT_METADATA_COUNT   = '//activatePaymentNoticeV2Response/metadata/mapEntry';
    const string XPATH_PAYMENT_METADATA_NAME    = '//activatePaymentNoticeV2Response/metadata/mapEntry[%1$d]/key';
    const string XPATH_PAYMENT_METADATA_VALUE   = '//activatePaymentNoticeV2Response/metadata/mapEntry[%1$d]/value';
    const string XPATH_FAULT_CODE               = '//activatePaymentNoticeV2Response/fault/faultCode';
    const string XPATH_FAULT_STRING             = '//activatePaymentNoticeV2Response/fault/faultString';

    public function getPaymentsCount(): int
	{
		if ($this->getOutcome() == 'KO')
        {
            return 0;
        }
        return 1;
	}
}
