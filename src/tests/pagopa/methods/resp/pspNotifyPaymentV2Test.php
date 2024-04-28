<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\pspNotifyPaymentV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\pspNotifyPaymentV2::class')]
class pspNotifyPaymentV2Test extends TestCase
{

    protected pspNotifyPaymentV2 $ok_instance;

    protected pspNotifyPaymentV2 $ko_instance;


    protected function setUp(): void
    {
        $this->ok_instance = new pspNotifyPaymentV2(base64_decode('PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cHNwTm90aWZ5UGF5bWVudFYyUmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25zMzpwc3BOb3RpZnlQYXltZW50VjJSZXM+Cgk8L1NPQVAtRU5WOkJvZHk+CjwvU09BUC1FTlY6RW52ZWxvcGU+'));
        $this->ko_instance = new pspNotifyPaymentV2(base64_decode('PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cHNwTm90aWZ5UGF5bWVudFYyUmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QU1BfRVJST1JFX0VNRVNTTzwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPkVycm9yZSBlbWVzc28gZGFsIFBTUDwvZmF1bHRTdHJpbmc+CgkJCQk8ZGVzY3JpcHRpb24+RXJyb3JlIGVtZXNzbyBkYWwgUHJlc3RhdG9yZSBkaSBTZXJ2aXppIGRpIFBhZ2FtZW50bzwvZGVzY3JpcHRpb24+CgkJCTwvZmF1bHQ+CgkJPC9uczM6cHNwTm90aWZ5UGF5bWVudFYyUmVzPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg=='));
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataKey(0, 0, 1));

        $this->assertNull($this->ok_instance->getTransferMetaDataKey(1, 0, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataKey(1, 0, 1));

        $this->assertNull($this->ok_instance->getTransferMetaDataKey(0, 1, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataKey(0, 1, 1));

        $this->assertNull($this->ok_instance->getTransferMetaDataKey(1, 1, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataKey(1, 1, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataKey(0, 0, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataKey(1, 0, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataKey(1, 0, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataKey(0, 1, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataKey(0, 1, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataKey(1, 1, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataKey(1, 1, 1));

    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->ok_instance->getCcps());
        $this->assertNull($this->ko_instance->getCcps());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->ok_instance->getIuvs());
        $this->assertNull($this->ko_instance->getIuvs());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->ok_instance->getBrokerPsp());
        $this->assertNull($this->ko_instance->getBrokerPsp());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->ok_instance->getPaymentMetaDataKey(0, 1));

        $this->assertNull($this->ok_instance->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->ok_instance->getPaymentMetaDataKey(1, 1));

        $this->assertNull($this->ko_instance->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->ko_instance->getPaymentMetaDataKey(0, 1));

        $this->assertNull($this->ko_instance->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->ko_instance->getPaymentMetaDataKey(1, 1));

    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->ok_instance->getBrokerPa());
        $this->assertNull($this->ko_instance->getBrokerPa());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataValue(0, 0, 1));

        $this->assertNull($this->ok_instance->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataValue(1, 0, 1));

        $this->assertNull($this->ok_instance->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataValue(0, 1, 1));

        $this->assertNull($this->ok_instance->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataValue(1, 1, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataValue(0, 0, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataValue(1, 0, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataValue(0, 1, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataValue(1, 1, 1));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->ok_instance->getAllTokens());
        $this->assertNull($this->ko_instance->getAllTokens());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount(0));
        $this->assertNull($this->ok_instance->getTransferCount(1));
        $this->assertNull($this->ko_instance->getTransferCount(0));
        $this->assertNull($this->ko_instance->getTransferCount(1));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->ok_instance->getIuv(0));
        $this->assertNull($this->ok_instance->getIuv(1));
        $this->assertNull($this->ko_instance->getIuv(0));
        $this->assertNull($this->ko_instance->getIuv(1));
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->ok_instance->getCcp(0));
        $this->assertNull($this->ok_instance->getCcp(1));
        $this->assertNull($this->ko_instance->getCcp(0));
        $this->assertNull($this->ko_instance->getCcp(1));
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->ok_instance->getImportoTotale());
        $this->assertNull($this->ko_instance->getImportoTotale());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->ok_instance->getToken(0));
        $this->assertNull($this->ok_instance->getToken(1));
        $this->assertNull($this->ko_instance->getToken(0));
        $this->assertNull($this->ko_instance->getToken(1));
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->ok_instance->getPsp());
        $this->assertNull($this->ko_instance->getPsp());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataCount(0, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataCount(1, 0));
        $this->assertNull($this->ok_instance->getTransferMetaDataCount(0, 1));
        $this->assertNull($this->ok_instance->getTransferMetaDataCount(1, 1));

        $this->assertNull($this->ko_instance->getTransferMetaDataCount(0, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataCount(1, 0));
        $this->assertNull($this->ko_instance->getTransferMetaDataCount(0, 1));
        $this->assertNull($this->ko_instance->getTransferMetaDataCount(1, 1));

    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue(1, 1));

        $this->assertNull($this->ko_instance->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->ko_instance->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->ko_instance->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->ko_instance->getPaymentMetaDataValue(1, 1));
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('PSP_ERRORE_EMESSO', $this->ko_instance->getFaultCode());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->ok_instance->getPaEmittenti());
        $this->assertNull($this->ko_instance->getPaEmittenti());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok_instance->getPaymentsCount());
        $this->assertNull($this->ko_instance->getPaymentsCount());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->ok_instance->getImporto());
        $this->assertNull($this->ko_instance->getImporto());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->ok_instance->getAllNoticesNumbers());
        $this->assertNull($this->ko_instance->getAllNoticesNumbers());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->ok_instance->getCanale());
        $this->assertNull($this->ko_instance->getCanale());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('Errore emesso dal Prestatore di Servizi di Pagamento', $this->ko_instance->getFaultDescription());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->ok_instance->getTransferIban(0, 0));
        $this->assertNull($this->ok_instance->getTransferIban(1, 0));
        $this->assertNull($this->ok_instance->getTransferIban(0, 1));
        $this->assertNull($this->ok_instance->getTransferIban(1, 1));

        $this->assertNull($this->ko_instance->getTransferIban(0, 0));
        $this->assertNull($this->ko_instance->getTransferIban(1, 0));
        $this->assertNull($this->ko_instance->getTransferIban(0, 1));
        $this->assertNull($this->ko_instance->getTransferIban(1, 1));
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataCount(0));
        $this->assertNull($this->ok_instance->getPaymentMetaDataCount(1));

        $this->assertNull($this->ko_instance->getPaymentMetaDataCount(0));
        $this->assertNull($this->ko_instance->getPaymentMetaDataCount(1));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->ok_instance->getPaEmittente());
        $this->assertNull($this->ko_instance->getPaEmittente());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->ok_instance->getTransferPa(0, 0));
        $this->assertNull($this->ok_instance->getTransferPa(1, 0));
        $this->assertNull($this->ok_instance->getTransferPa(0, 1));
        $this->assertNull($this->ok_instance->getTransferPa(1, 1));

        $this->assertNull($this->ko_instance->getTransferPa(0, 0));
        $this->assertNull($this->ko_instance->getTransferPa(1, 0));
        $this->assertNull($this->ko_instance->getTransferPa(0, 1));
        $this->assertNull($this->ko_instance->getTransferPa(1, 1));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->ok_instance->isBollo(0, 0));
        $this->assertFalse($this->ok_instance->isBollo(1, 0));
        $this->assertFalse($this->ok_instance->isBollo(0, 1));
        $this->assertFalse($this->ok_instance->isBollo(1, 1));

        $this->assertFalse($this->ko_instance->isBollo(0, 0));
        $this->assertFalse($this->ko_instance->isBollo(1, 0));
        $this->assertFalse($this->ko_instance->isBollo(0, 1));
        $this->assertFalse($this->ko_instance->isBollo(1, 1));
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->ok_instance->outcome());
        $this->assertEquals('KO', $this->ko_instance->outcome());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('Errore emesso dal PSP', $this->ko_instance->getFaultString());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->ok_instance->getTransferId(0, 0));
        $this->assertNull($this->ok_instance->getTransferId(1, 0));
        $this->assertNull($this->ok_instance->getTransferId(0, 1));
        $this->assertNull($this->ok_instance->getTransferId(1, 1));

        $this->assertNull($this->ko_instance->getTransferId(0, 0));
        $this->assertNull($this->ko_instance->getTransferId(1, 0));
        $this->assertNull($this->ko_instance->getTransferId(0, 1));
        $this->assertNull($this->ko_instance->getTransferId(1, 1));
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->ok_instance->getStazione());
        $this->assertNull($this->ko_instance->getStazione());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_instance->isFaultEvent());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->ok_instance->getTransferAmount(0, 0));
        $this->assertNull($this->ok_instance->getTransferAmount(1, 0));
        $this->assertNull($this->ok_instance->getTransferAmount(0, 1));
        $this->assertNull($this->ok_instance->getTransferAmount(1, 1));

        $this->assertNull($this->ko_instance->getTransferAmount(0, 0));
        $this->assertNull($this->ko_instance->getTransferAmount(1, 0));
        $this->assertNull($this->ko_instance->getTransferAmount(0, 1));
        $this->assertNull($this->ko_instance->getTransferAmount(1, 1));
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->ok_instance->getNoticeNumber(0));
        $this->assertNull($this->ok_instance->getNoticeNumber(1));

        $this->assertNull($this->ko_instance->getNoticeNumber(0));
        $this->assertNull($this->ko_instance->getNoticeNumber(1));

    }
}
