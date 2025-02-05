<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class pspNotifyPayment extends RequestXML
{

    const string XPATH_PSP_ID                       = '//pspNotifyPaymentReq/idPSP';
    const string XPATH_BROKER_PSP                   = '//pspNotifyPaymentReq/idBrokerPSP';
    const string XPATH_BROKER_CHANNEL               = '//pspNotifyPaymentReq/idChannel';
    const string XPATH_TOKEN                        = '//pspNotifyPaymentReq/paymentToken';
    const string XPATH_PA_EMITTENTE                 = '//pspNotifyPaymentReq/fiscalCodePA';
    const string XPATH_CREDITOR_REFERENCE           = '//pspNotifyPaymentReq/creditorReferenceId';
    const string XPATH_IUV                          = '//pspNotifyPaymentReq/creditorReferenceId';
    const string XPATH_AMOUNT                       = '//pspNotifyPaymentReq/debtAmount';
    const string XPATH_TOTAL_AMOUNT                 = '//pspNotifyPaymentReq/debtAmount';
    const string XPATH_TRANSFER_COUNT               = '//pspNotifyPaymentReq/transferList/transfer';
    const string XPATH_TRANSFER_ID                  = '//pspNotifyPaymentReq/transferList/transfer[%1$d]/idTransfer';
    const string XPATH_TRANSFER_AMOUNT              = '//pspNotifyPaymentReq/transferList/transfer[%1$d]/transferAmount';
    const string XPATH_TRANSFER_PA                  = '//pspNotifyPaymentReq/transferList/transfer[%1$d]/fiscalCodePA';
    const string XPATH_TRANSFER_IBAN                = '//pspNotifyPaymentReq/transferList/transfer[%1$d]/IBAN';
    const string XPATH_TRANSFER_METADATA_COUNT      = '//pspNotifyPaymentReq/transferList/transfer[%1$d]/metadata/mapEntry';
    const string XPATH_TRANSFER_METADATA_NAME       = '//pspNotifyPaymentReq/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_TRANSFER_METADATA_VALUE      = '//pspNotifyPaymentReq/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';

	public function getPaymentsCount(): int
	{
		return 1;
	}
}
