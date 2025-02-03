<?php

namespace pagopa\sert\payload\req;

use pagopa\sert\payload\RequestXML;

class paSendRT extends RequestXML
{

    const string XPATH_BROKER_PA                = '//paSendRTReq/idBrokerPA';
    const string XPATH_BROKER_STATION           = '//paSendRTReq/idStation';
    const string XPATH_PA_EMITTENTE             = '//paSendRTReq/receipt/fiscalCode';
    const string XPATH_NAV                      = '//paSendRTReq/receipt/noticeNumber';
    const string XPATH_TOKEN                    = '//paSendRTReq/receipt/receiptId';
    const string XPATH_OUTCOME                  = '//paSendRTReq/receipt/outcome';
    const string XPATH_IUV                      = '//paSendRTReq/receipt/creditorReferenceId';
    const string XPATH_CREDITOR_REFERENCE       = '//paSendRTReq/receipt/creditorReferenceId';
    const string XPATH_AMOUNT                   = '//paSendRTReq/receipt/paymentAmount';
    const string XPATH_TOTAL_AMOUNT             = '//paSendRTReq/receipt/paymentAmount';
    const string XPATH_PSP_ID                   = '//paSendRTReq/receipt/idPSP';
    const string XPATH_BROKER_CHANNEL           = '//paSendRTReq/receipt/idChannel';
    const string XPATH_TRANSFER_COUNT           = '//paSendRTReq/receipt/transferList/transfer';
    const string XPATH_TRANSFER_ID              = '//paSendRTReq/receipt/transferList/transfer[%1$d]/idTransfer';
    const string XPATH_TRANSFER_PA              = '//paSendRTReq/receipt/transferList/transfer[%1$d]/fiscalCodePA';
    const string XPATH_TRANSFER_IBAN            = '//paSendRTReq/receipt/transferList/transfer[%1$d]/IBAN';
    const string XPATH_TRANSFER_AMOUNT          = '//paSendRTReq/receipt/transferList/transfer[%1$d]/transferAmount';
    const string XPATH_TRANSFER_METADATA_COUNT  = '//paSendRTReq/receipt/transferList/transfer[%1$d]/metadata/mapEntry';
    const string XPATH_TRANSFER_METADATA_NAME   = '//paSendRTReq/receipt/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/key';
    const string XPATH_TRANSFER_METADATA_VALUE  = '//paSendRTReq/receipt/transferList/transfer[%2$d]/metadata/mapEntry[%1$d]/value';
    const string XPATH_PAYMENT_METADATA_COUNT   = '//paSendRTReq/receipt/metadata/mapEntry';
    const string XPATH_PAYMENT_METADATA_NAME    = '//paSendRTReq/receipt/metadata/mapEntry[%1$d]/key';
    const string XPATH_PAYMENT_METADATA_VALUE   = '//paSendRTReq/receipt/metadata/mapEntry[%1$d]/value';

	public function getPaymentsCount(): int
	{
		return 1;
	}
}
