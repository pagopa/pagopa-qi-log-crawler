<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class pspNotifyPaymentV2 extends RequestXML
{

    const string XPATH_PSP_ID                       = '//pspNotifyPaymentV2/idPSP';
    const string XPATH_BROKER_PSP                   = '//pspNotifyPaymentV2/idBrokerPSP';
    const string XPATH_BROKER_CHANNEL               = '//pspNotifyPaymentV2/idChannel';
    const string XPATH_TOTAL_AMOUNT                 = '//pspNotifyPaymentV2/totalAmount';
    const string XPATH_TOKEN                        = '//pspNotifyPaymentV2/paymentList/payment[%1$d]/paymentToken';
    const string XPATH_PA_EMITTENTE                 = '//pspNotifyPaymentV2/paymentList/payment[%1$d]/fiscalCodePA';
    const string XPATH_CREDITOR_REFERENCE           = '//pspNotifyPaymentV2/paymentList/payment[%1$d]/creditorReferenceId';
    const string XPATH_IUV                          = '//pspNotifyPaymentV2/paymentList/payment[%1$d]/creditorReferenceId';
    const string XPATH_AMOUNT                       = '//pspNotifyPaymentV2/paymentList/payment[%1$d]/debtAmount';
    const string XPATH_TRANSFER_COUNT               = '//pspNotifyPaymentV2/paymentList/payment[%1$d]/transferList/transfer';
    const string XPATH_TRANSFER_ID                  = '//pspNotifyPaymentV2/paymentList/payment[%2$d]/transferList/transfer[%1$d]/idTransfer';
    const string XPATH_TRANSFER_AMOUNT              = '//pspNotifyPaymentV2/paymentList/payment[%2$d]/transferList/transfer[%1$d]/transferAmount';
    const string XPATH_TRANSFER_PA                  = '//pspNotifyPaymentV2/paymentList/payment[%2$d]/transferList/transfer[%1$d]/fiscalCodePA';
    const string XPATH_TRANSFER_IBAN                = '//pspNotifyPaymentV2/paymentList/payment[%2$d]/transferList/transfer[%1$d]/IBAN';
    const string XPATH_TRANSFER_BOLLO               = '//pspNotifyPaymentV2/paymentList/payment[%2$d]/transferList/transfer[%1$d]/richiestaMarcaDaBollo';
    const string XPATH_TRANSFER_METADATA_COUNT      = '//pspNotifyPaymentV2/paymentList/payment[%2$d]/transferList/transfer[%1$d]/metadata/mapEntry';
    const string XPATH_TRANSFER_METADATA_NAME       = '//pspNotifyPaymentV2/paymentList/payment[%3$d]/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_TRANSFER_METADATA_VALUE      = '//pspNotifyPaymentV2/paymentList/payment[%3$d]/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';
    const string XPATH_PAYMENT_METADATA_COUNT       = '//pspNotifyPaymentV2/paymentList/payment[%1$d]/metadata/mapEntry';
    const string XPATH_PAYMENT_METADATA_NAME        = '//pspNotifyPaymentV2/paymentList/payment[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_PAYMENT_METADATA_VALUE       = '//pspNotifyPaymentV2/paymentList/payment[%2$d]/metadata/mapEntry[%1$d]/value';


	public function getPaymentsCount(): int
	{
        $xpath = '//pspNotifyPaymentV2/paymentList/payment';
        return $this->getElementsCount($xpath);
	}
}
