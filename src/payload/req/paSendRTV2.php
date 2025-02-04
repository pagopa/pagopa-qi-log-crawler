<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class paSendRTV2 extends RequestXML
{

    const string XPATH_BROKER_PA                = '//paSendRTV2Request/idBrokerPA';
    const string XPATH_BROKER_STATION           = '//paSendRTV2Request/idStation';
    const string XPATH_PA_EMITTENTE             = '//paSendRTV2Request/receipt/fiscalCode';
    const string XPATH_NAV                      = '//paSendRTV2Request/receipt/noticeNumber';
    const string XPATH_TOKEN                    = '//paSendRTV2Request/receipt/receiptId';
    const string XPATH_OUTCOME                  = '//paSendRTV2Request/receipt/outcome';
    const string XPATH_IUV                      = '//paSendRTV2Request/receipt/creditorReferenceId';
    const string XPATH_CREDITOR_REFERENCE       = '//paSendRTV2Request/receipt/creditorReferenceId';
    const string XPATH_AMOUNT                   = '//paSendRTV2Request/receipt/paymentAmount';
    const string XPATH_TOTAL_AMOUNT             = '//paSendRTV2Request/receipt/paymentAmount';
    const string XPATH_PSP_ID                   = '//paSendRTV2Request/receipt/idPSP';
    const string XPATH_BROKER_CHANNEL           = '//paSendRTV2Request/receipt/idChannel';
    const string XPATH_TRANSFER_COUNT           = '//paSendRTV2Request/receipt/transferList/transfer';
    const string XPATH_TRANSFER_ID              = '//paSendRTV2Request/receipt/transferList/transfer[%1$d]/idTransfer';
    const string XPATH_TRANSFER_PA              = '//paSendRTV2Request/receipt/transferList/transfer[%1$d]/fiscalCodePA';
    const string XPATH_TRANSFER_IBAN            = '//paSendRTV2Request/receipt/transferList/transfer[%1$d]/IBAN';
    const string XPATH_TRANSFER_BOLLO           = '//paSendRTV2Request/receipt/transferList/transfer[%1$d]/richiestaMarcaDaBollo';
    const string XPATH_TRANSFER_AMOUNT          = '//paSendRTV2Request/receipt/transferList/transfer[%1$d]/transferAmount';
    const string XPATH_TRANSFER_METADATA_COUNT  = '//paSendRTV2Request/receipt/transferList/transfer[%1$d]/metadata/mapEntry';
    const string XPATH_TRANSFER_METADATA_NAME   = '//paSendRTV2Request/receipt/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_TRANSFER_METADATA_VALUE  = '//paSendRTV2Request/receipt/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';
    const string XPATH_PAYMENT_METADATA_COUNT   = '//paSendRTV2Request/receipt/metadata/mapEntry';
    const string XPATH_PAYMENT_METADATA_NAME    = '//paSendRTV2Request/receipt/metadata/mapEntry[%1$d]/key';
    const string XPATH_PAYMENT_METADATA_VALUE   = '//paSendRTV2Request/receipt/metadata/mapEntry[%1$d]/value';

	public function getPaymentsCount(): int
	{
		return 1;
	}
}
