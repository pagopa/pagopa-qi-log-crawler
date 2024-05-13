<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\paGetPayment;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\paGetPayment::class')]
class paGetPaymentTest extends TestCase
{

    protected paGetPayment $resp;

    protected paGetPayment $fault;

    protected function setUp(): void
    {
        $this->resp = new paGetPayment(base64_decode('PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cGFHZXRQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wYS9wYUZvck5vZGUueHNkIj4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTxkYXRhPgoJCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCQk8cGF5bWVudEFtb3VudD4xMTUuMDA8L3BheW1lbnRBbW91bnQ+CgkJCQk8ZHVlRGF0ZT4yMDI0LTA1LTEzPC9kdWVEYXRlPgoJCQkJPGRlc2NyaXB0aW9uPnh4eHh4eHg8L2Rlc2NyaXB0aW9uPgoJCQkJPGNvbXBhbnlOYW1lPnh4eHh4PC9jb21wYW55TmFtZT4KCQkJCTx0cmFuc2Zlckxpc3Q+CgkJCQkJPHRyYW5zZmVyPgoJCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTE1LjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L0lCQU4+CgkJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJPHRyYW5zZmVyQ2F0ZWdvcnk+MDEwMTEwMUlNPC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTwvdHJhbnNmZXI+CgkJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPC9kYXRhPgoJCTwvbnMzOnBhR2V0UGF5bWVudFJlcz4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4='));
        $this->fault = new paGetPayment(base64_decode('PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cGFHZXRQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wYS9wYUZvck5vZGUueHNkIj4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UEFBX1BBR0FNRU5UT19JTl9DT1JTTzwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPlBhZ2FtZW50byBpbiBhdHRlc2EgcmlzdWx0YSBpbiBjb3JzbyBhbGzigJlFbnRlIENyZWRpdG9yZS48L2ZhdWx0U3RyaW5nPgoJCQkJPGlkPjk3MDg2NzQwNTgyPC9pZD4KCQkJPC9mYXVsdD4KCQk8L25zMzpwYUdldFBheW1lbnRSZXM+Cgk8L1NPQVAtRU5WOkJvZHk+CjwvU09BUC1FTlY6RW52ZWxvcGU+'));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->resp->getTransferPa());
        $this->assertNull($this->fault->getTransferPa());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->resp->getTransferId());
        $this->assertNull($this->fault->getTransferId());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->resp->getTransferMetaDataValue());
        $this->assertNull($this->fault->getTransferMetaDataValue());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->resp->getToken());
        $this->assertNull($this->fault->getToken());

    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->resp->getNoticeNumber());
        $this->assertNull($this->fault->getNoticeNumber());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->resp->getTransferIban());
        $this->assertNull($this->fault->getTransferIban());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->resp->getFaultCode());
        $this->assertEquals('PAA_PAGAMENTO_IN_CORSO', $this->fault->getFaultCode());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('115.00', $this->resp->getImportoTotale());
        $this->assertNull($this->fault->getImportoTotale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->resp->getBrokerPsp());
        $this->assertNull($this->fault->getBrokerPsp());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->resp->getPaymentMetaDataCount());
        $this->assertNull($this->fault->getPaymentMetaDataCount());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->resp->getPsp());
        $this->assertNull($this->fault->getPsp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->resp->getPaymentMetaDataValue());
        $this->assertNull($this->fault->getPaymentMetaDataValue());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->resp->getAllTokens());
        $this->assertNull($this->fault->getAllTokens());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->resp->getIuvs());
        $this->assertNull($this->fault->getIuvs());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('115.00', $this->resp->getImporto());
        $this->assertNull($this->fault->getImporto());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->resp->getCcp());
        $this->assertNull($this->fault->getCcp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->resp->getPaEmittenti());
        $this->assertNull($this->fault->getPaEmittenti());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->resp->getFaultDescription());
        $this->assertNull($this->fault->getFaultDescription());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000010', $this->resp->getIuv());
        $this->assertNull($this->fault->getIuv());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->resp->getCcps());
        $this->assertNull($this->fault->getCcps());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->resp->getTransferCount());
        $this->assertNull($this->fault->getTransferCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->resp->isBollo());
        $this->assertFalse($this->fault->isBollo());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->resp->getBrokerPa());
        $this->assertNull($this->fault->getBrokerPa());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->resp->getCanale());
        $this->assertNull($this->fault->getCanale());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->resp->outcome());
        $this->assertEquals('KO', $this->fault->outcome());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->resp->isFaultEvent());
        $this->assertTrue($this->fault->isFaultEvent());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->resp->getTransferMetaDataCount());
        $this->assertNull($this->fault->getTransferMetaDataCount());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->resp->getPaymentsCount());
        $this->assertEquals(1, $this->fault->getPaymentsCount());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->resp->getFaultString());
        $this->assertEquals('Pagamento in attesa risulta in corso all’Ente Creditore.', $this->fault->getFaultString());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->resp->getStazione());
        $this->assertNull($this->fault->getStazione());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->resp->getAllNoticesNumbers());
        $this->assertNull($this->fault->getAllNoticesNumbers());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->resp->getTransferMetaDataKey());
        $this->assertNull($this->fault->getTransferMetaDataKey());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->resp->getPaEmittente());
        $this->assertNull($this->fault->getPaEmittente());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->resp->isValidPayload());
        $this->assertTrue($this->fault->isValidPayload());

    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->resp->getPaymentMetaDataKey());
        $this->assertNull($this->fault->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->resp->getTransferAmount());
        $this->assertNull($this->fault->getTransferAmount());
    }
}
