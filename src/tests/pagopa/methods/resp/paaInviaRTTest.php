<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\paaInviaRT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('methods\resp\paaInviaRT::class')]
class paaInviaRTTest extends TestCase
{

    protected paaInviaRT $ok_instance;

    protected paaInviaRT $ko_instance;


    protected function setUp(): void
    {
        $this->ok_instance = new paaInviaRT(base64_decode('PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cGFhSW52aWFSVFJpc3Bvc3RhIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFhSW52aWFSVFJpc3Bvc3RhPgoJCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPC9wYWFJbnZpYVJUUmlzcG9zdGE+CgkJPC9uczM6cGFhSW52aWFSVFJpc3Bvc3RhPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg=='));
        $this->ko_instance = new paaInviaRT(base64_decode('PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cGFhSW52aWFSVFJpc3Bvc3RhIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFhSW52aWFSVFJpc3Bvc3RhPgoJCQkJPGZhdWx0PgoJCQkJCTxmYXVsdENvZGU+UEFBX1BBR0FNRU5UT19TQ0FEVVRPPC9mYXVsdENvZGU+CgkJCQkJPGZhdWx0U3RyaW5nPlBhZ2FtZW50byBpbiBhdHRlc2EgcmlzdWx0YSBzY2FkdXRvIGFsbOKAmUVudGUgQ3JlZGl0b3JlPC9mYXVsdFN0cmluZz4KCQkJCQk8aWQ+ZGFzZHM8L2lkPgoJCQkJCTxkZXNjcmlwdGlvbj5UcmFuc2F6aW9uZSBkaSBQYWdhbWVudG8gc2NhZHV0YTwvZGVzY3JpcHRpb24+CgkJCQk8L2ZhdWx0PgoJCQkJPGVzaXRvPktPPC9lc2l0bz4KCQkJPC9wYWFJbnZpYVJUUmlzcG9zdGE+CgkJPC9uczM6cGFhSW52aWFSVFJpc3Bvc3RhPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg=='));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->ok_instance->getCcps());
        $this->assertNull($this->ko_instance->getCcps());
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
        $this->assertNull($this->ok_instance->getTransferMetaDataCount());
        $this->assertNull($this->ko_instance->getTransferMetaDataCount());

    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('Pagamento in attesa risulta scaduto all’Ente Creditore', $this->ko_instance->getFaultString());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->ok_instance->getTransferAmount());
        $this->assertNull($this->ko_instance->getTransferAmount());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue());
        $this->assertNull($this->ko_instance->getPaymentMetaDataValue());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->ok_instance->getImportoTotale());
        $this->assertNull($this->ko_instance->getImportoTotale());

    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->ok_instance->getTransferId());
        $this->assertNull($this->ko_instance->getTransferId());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->ok_instance->getIuv());
        $this->assertNull($this->ko_instance->getIuv());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->ok_instance->getToken());
        $this->assertNull($this->ko_instance->getToken());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataValue());
        $this->assertNull($this->ko_instance->getTransferMetaDataValue());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataKey());
        $this->assertNull($this->ko_instance->getTransferMetaDataKey());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->ok_instance->getTransferIban());
        $this->assertNull($this->ko_instance->getTransferIban());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->ok_instance->getImporto());
        $this->assertNull($this->ko_instance->getImporto());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('PAA_PAGAMENTO_SCADUTO', $this->ko_instance->getFaultCode());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_instance->isFaultEvent());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->ok_instance->getPaEmittenti());
        $this->assertNull($this->ko_instance->getPaEmittenti());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->ok_instance->getTransferPa());
        $this->assertNull($this->ko_instance->getTransferPa());

    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('Transazione di Pagamento scaduta', $this->ko_instance->getFaultDescription());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount());
        $this->assertNull($this->ko_instance->getTransferCount());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->ok_instance->getNoticeNumber());
        $this->assertNull($this->ko_instance->getNoticeNumber());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->ok_instance->getStazione());
        $this->assertNull($this->ko_instance->getStazione());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->ok_instance->outcome());
        $this->assertEquals('KO', $this->ko_instance->outcome());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->ok_instance->getCanale());
        $this->assertNull($this->ko_instance->getCanale());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->ok_instance->getCcp());
        $this->assertNull($this->ko_instance->getCcp());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->ok_instance->getBrokerPa());
        $this->assertNull($this->ko_instance->getBrokerPa());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->ok_instance->getAllNoticesNumbers());
        $this->assertNull($this->ko_instance->getAllNoticesNumbers());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->ok_instance->getAllTokens());
        $this->assertNull($this->ko_instance->getAllTokens());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->ok_instance->isBollo(0));
        $this->assertFalse($this->ko_instance->isBollo(0));
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

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->ok_instance->getPaEmittente());
        $this->assertNull($this->ko_instance->getPaEmittente());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok_instance->getPaymentsCount());
        $this->assertNull($this->ko_instance->getPaymentsCount());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataCount());
        $this->assertNull($this->ko_instance->getPaymentMetaDataCount());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataKey());
        $this->assertNull($this->ko_instance->getPaymentMetaDataKey());
    }
}
