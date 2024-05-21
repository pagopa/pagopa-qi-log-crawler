<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\paSendRT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\paSendRT::class')]
class paSendRTTest extends TestCase
{

    protected paSendRT $ok;

    protected paSendRT $fault;

    protected function setUp(): void
    {
        $this->ok = new paSendRT(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnM2OnBhU2VuZFJUUmVzIHhtbG5zOm5zMj0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOm5zMz0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOm5zND0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi9wcHRoZWFkIiB4bWxuczpuczU9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zNj0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wYS9wYUZvck5vZGUueHNkIiB4bWxuczpuczc9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcGFGb3JOb2RlIj4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJPC9uczY6cGFTZW5kUlRSZXM+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg=='));
        $this->fault = new paSendRT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzZD0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8cGFTZW5kUlRSZXMgeG1sbnM9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcGEvcGFGb3JOb2RlLnhzZCI+CgkJCTxvdXRjb21lIHhtbG5zPSIiPktPPC9vdXRjb21lPgoJCQk8ZmF1bHQgeG1sbnM9IiI+CgkJCQk8ZmF1bHRDb2RlPlBBQV9SVF9EVVBMSUNBVEE8L2ZhdWx0Q29kZT4KCQkJCTxmYXVsdFN0cmluZz5MYSBSVCDDqCBnacOgIHN0YXRhIGFjY2V0dGF0YTwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+ODEwMDY1MDA2MDc8L2lkPgoJCQkJPGRlc2NyaXB0aW9uPjAxMDAwMDAwMDAwMDAwMDAwIHJpc3VsdMOgIGdpw6AgcGFnYXRvPC9kZXNjcmlwdGlvbj4KCQkJPC9mYXVsdD4KCQk8L3BhU2VuZFJUUmVzPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4='));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->ok->getAllTokens());
        $this->assertNull($this->fault->getAllTokens());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->ok->getTransferId());
        $this->assertNull($this->fault->getTransferId());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->ok->getPaymentMetaDataValue());
        $this->assertNull($this->fault->getPaymentMetaDataValue());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->ok->getBrokerPsp());
        $this->assertNull($this->fault->getBrokerPsp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->ok->getPaEmittenti());
        $this->assertNull($this->fault->getPaEmittenti());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->ok->getBrokerPa());
        $this->assertNull($this->fault->getBrokerPa());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->ok->getCcps());
        $this->assertNull($this->fault->getCcps());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok->getFaultDescription());
        $this->assertEquals('01000000000000000 risultà già pagato', $this->fault->getFaultDescription());

    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->ok->isValidPayload());
        $this->assertTrue($this->fault->isValidPayload());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->ok->isBollo());
        $this->assertFalse($this->fault->isBollo());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->ok->getPsp());
        $this->assertNull($this->fault->getPsp());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->ok->getTransferMetaDataValue());
        $this->assertNull($this->fault->getTransferMetaDataValue());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->ok->getToken());
        $this->assertNull($this->fault->getToken());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok->getFaultString());
        $this->assertEquals('La RT è già stata accettata', $this->fault->getFaultString());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->ok->getCcp());
        $this->assertNull($this->fault->getCcp());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->ok->getAllNoticesNumbers());
        $this->assertNull($this->fault->getAllNoticesNumbers());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->ok->getPaEmittente());
        $this->assertNull($this->fault->getPaEmittente());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->ok->getImporto());
        $this->assertNull($this->fault->getImporto());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok->getFaultCode());
        $this->assertEquals('PAA_RT_DUPLICATA', $this->fault->getFaultCode());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->ok->getTransferAmount());
        $this->assertNull($this->fault->getTransferAmount());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok->isFaultEvent());
        $this->assertTrue($this->fault->isFaultEvent());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->ok->getTransferPa());
        $this->assertNull($this->fault->getTransferPa());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->ok->getNoticeNumber());
        $this->assertNull($this->fault->getNoticeNumber());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->ok->outcome());
        $this->assertEquals('KO', $this->fault->outcome());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->ok->getTransferIban());
        $this->assertNull($this->fault->getTransferIban());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->ok->getPaymentMetaDataKey());
        $this->assertNull($this->fault->getPaymentMetaDataKey());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok->getPaymentsCount());
        $this->assertNull($this->fault->getPaymentsCount());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->ok->getImportoTotale());
        $this->assertNull($this->fault->getImportoTotale());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->ok->getPaymentMetaDataCount());
        $this->assertNull($this->fault->getPaymentMetaDataCount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->ok->getIuvs());
        $this->assertNull($this->fault->getIuvs());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->ok->getIuv());
        $this->assertNull($this->fault->getIuv());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->ok->getCanale());
        $this->assertNull($this->fault->getCanale());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->ok->getStazione());
        $this->assertNull($this->fault->getStazione());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->ok->getTransferMetaDataKey());
        $this->assertNull($this->fault->getTransferMetaDataKey());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok->getTransferCount());
        $this->assertNull($this->fault->getTransferCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->ok->getTransferMetaDataCount());
        $this->assertNull($this->fault->getTransferMetaDataCount());
    }
}
