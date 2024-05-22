<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\paGetPaymentV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\paGetPaymentV2::class')]
class paGetPaymentV2Test extends TestCase
{

    protected paGetPaymentV2 $payment;

    protected paGetPaymentV2 $fault;

    protected function setUp(): void
    {
        $this->payment = new paGetPaymentV2(base64_decode('PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6cGFmPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L3BhL3BhRm9yTm9kZS54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxwYWY6cGFHZXRQYXltZW50VjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTxkYXRhPgoJCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCQk8cGF5bWVudEFtb3VudD4yMDAuMDA8L3BheW1lbnRBbW91bnQ+CgkJCQk8ZHVlRGF0ZT4yMDI0LTA1LTIyPC9kdWVEYXRlPgoJCQkJPHJldGVudGlvbkRhdGU+MjAyNC0wNS0yM1QwMDowMDowMDwvcmV0ZW50aW9uRGF0ZT4KCQkJCTxsYXN0UGF5bWVudD4wPC9sYXN0UGF5bWVudD4KCQkJCTxkZXNjcmlwdGlvbj54eHh4eHh4eDwvZGVzY3JpcHRpb24+CgkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQk8b2ZmaWNlTmFtZT54eHh4eDwvb2ZmaWNlTmFtZT4KCQkJCTxkZWJ0b3I+CgkJCQkJPHVuaXF1ZUlkZW50aWZpZXI+CgkJCQkJCTxlbnRpdHlVbmlxdWVJZGVudGlmaWVyVHlwZT5GPC9lbnRpdHlVbmlxdWVJZGVudGlmaWVyVHlwZT4KCQkJCQkJPGVudGl0eVVuaXF1ZUlkZW50aWZpZXJWYWx1ZT5YWFhYWFhYWFhYWFhYWFhYPC9lbnRpdHlVbmlxdWVJZGVudGlmaWVyVmFsdWU+CgkJCQkJPC91bmlxdWVJZGVudGlmaWVyPgoJCQkJCTxmdWxsTmFtZT54eHh4eHg8L2Z1bGxOYW1lPgoJCQkJCTxlLW1haWw+eHh4eHh4eHhAeHh4eHgueHh4PC9lLW1haWw+CgkJCQk8L2RlYnRvcj4KCQkJCTx0cmFuc2Zlckxpc3Q+CgkJCQkJPHRyYW5zZmVyPgoJCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MjAwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJCTxJQkFOPklUMDEwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJPHRyYW5zZmVyQ2F0ZWdvcnk+eHh4eHh4PC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTwvdHJhbnNmZXI+CgkJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPC9kYXRhPgoJCTwvcGFmOnBhR2V0UGF5bWVudFYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
        $this->fault = new paGetPaymentV2(base64_decode('PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6SGVhZGVyLz4KCTxzb2FwZW52OkJvZHk+CgkJPG5zMjpwYUdldFBheW1lbnRWMlJlc3BvbnNlIHhtbG5zOm5zMj0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wYS9wYUZvck5vZGUueHNkIj4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UEFBX1BBR0FNRU5UT19TQ09OT1NDSVVUTzwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPnBhZ2FtZW50byBzY29ub3NjaXV0bzwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+MTUzNzYzNzEwMDk8L2lkPgoJCQkJPGRlc2NyaXB0aW9uPkwnaWQgZGVsIHBhZ2FtZW50byByaWNldnV0byBub24gZXNpc3RlPC9kZXNjcmlwdGlvbj4KCQkJPC9mYXVsdD4KCQk8L25zMjpwYUdldFBheW1lbnRWMlJlc3BvbnNlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->payment->getTransferPa());
        $this->assertNull($this->fault->getTransferPa());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->payment->getAllNoticesNumbers());
        $this->assertNull($this->fault->getAllNoticesNumbers());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->payment->getTransferMetaDataKey());
        $this->assertNull($this->fault->getTransferMetaDataKey());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->payment->getPaEmittente());
        $this->assertNull($this->fault->getPaEmittente());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->payment->getFaultDescription());
        $this->assertEquals('L\'id del pagamento ricevuto non esiste', $this->fault->getFaultDescription());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->payment->getToken());
        $this->assertNull($this->fault->getToken());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->payment->getTransferAmount());
        $this->assertNull($this->fault->getTransferAmount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->payment->getIuvs());
        $this->assertNull($this->fault->getIuvs());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->payment->getBrokerPa());
        $this->assertNull($this->fault->getBrokerPa());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->payment->getNoticeNumber());
        $this->assertNull($this->fault->getNoticeNumber());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->payment->getPaymentMetaDataKey());
        $this->assertNull($this->fault->getPaymentMetaDataKey());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->payment->getPaymentMetaDataValue());
        $this->assertNull($this->fault->getPaymentMetaDataValue());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('200.00', $this->payment->getImporto());
        $this->assertNull($this->fault->getImporto());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->payment->getStazione());
        $this->assertNull($this->fault->getStazione());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->payment->getTransferMetaDataValue());
        $this->assertNull($this->fault->getTransferMetaDataValue());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->payment->getCcps());
        $this->assertNull($this->fault->getCcps());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $value = '01000000000000010';
        $this->assertEquals($value, $this->payment->getIuv());
        $this->assertNull($this->fault->getIuv());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->payment->getFaultString());
        $this->assertEquals('pagamento sconosciuto', $this->fault->getFaultString());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->payment->getPaymentMetaDataCount());
        $this->assertNull($this->fault->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->payment->getTransferMetaDataCount());
        $this->assertNull($this->fault->getTransferMetaDataCount());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->payment->outcome());
        $this->assertEquals('KO', $this->fault->outcome());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->payment->getAllTokens());
        $this->assertNull($this->fault->getAllTokens());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->payment->getCanale());
        $this->assertNull($this->fault->getCanale());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->payment->getFaultCode());
        $this->assertEquals('PAA_PAGAMENTO_SCONOSCIUTO', $this->fault->getFaultCode());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->payment->getPaEmittenti());
        $this->assertNull($this->fault->getPaEmittenti());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->payment->getTransferIban());
        $this->assertNull($this->fault->getTransferIban());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
        $this->assertEquals(1, $this->fault->getPaymentsCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->payment->isBollo());
        $this->assertFalse($this->fault->isBollo());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->payment->getPsp());
        $this->assertNull($this->fault->getPsp());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->payment->getTransferId());
        $this->assertNull($this->fault->getTransferId());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->payment->getBrokerPsp());
        $this->assertNull($this->fault->getBrokerPsp());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('200.00', $this->payment->getImportoTotale());
        $this->assertNull($this->fault->getImportoTotale());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
        $this->assertNull($this->fault->getTransferCount());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->payment->isValidPayload());
        $this->assertTrue($this->fault->isValidPayload());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->payment->isFaultEvent());
        $this->assertTrue($this->fault->isFaultEvent());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->payment->getCcp());
        $this->assertNull($this->fault->getCcp());
    }
}
