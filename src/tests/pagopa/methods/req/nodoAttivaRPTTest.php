<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoAttivaRPT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('methods\req\nodoAttivaRPT::class')]
class nodoAttivaRPTTest extends TestCase
{

    protected nodoAttivaRPT $instance;

    protected function setUp(): void
    {
        $this->instance = new nodoAttivaRPT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8cHB0Om5vZG9BdHRpdmFSUFQgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQUGFnYW1lbnRvPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1BQYWdhbWVudG8+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZVBhZ2FtZW50bz44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGVQYWdhbWVudG8+CgkJCTxjb2RpZmljYUluZnJhc3RydXR0dXJhUFNQPlFSLUNPREU8L2NvZGlmaWNhSW5mcmFzdHJ1dHR1cmFQU1A+CgkJCTxjb2RpY2VJZFJQVD4KCQkJCTxxcmM6UXJDb2RlPgoJCQkJCTxxcmM6Q0Y+Nzc3Nzc3Nzc3Nzc8L3FyYzpDRj4KCQkJCQk8cXJjOkF1eERpZ2l0PjM8L3FyYzpBdXhEaWdpdD4KCQkJCQk8cXJjOkNvZElVVj4wMTAwMDAwMDAwMDAwMDAxMDwvcXJjOkNvZElVVj4KCQkJCTwvcXJjOlFyQ29kZT4KCQkJPC9jb2RpY2VJZFJQVD4KCQkJPGRhdGlQYWdhbWVudG9QU1A+CgkJCQk8aW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPjI4LjAwPC9pbXBvcnRvU2luZ29sb1ZlcnNhbWVudG8+CgkJCTwvZGF0aVBhZ2FtZW50b1BTUD4KCQk8L3BwdDpub2RvQXR0aXZhUlBUPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4='));
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance->getTransferMetaDataValue());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals('c0000000000000000000000000000010', $this->instance->getCcp());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('28.00', $this->instance->getImporto());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance->getTransferCount());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance->getTransferPa());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance->getStazione());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->instance->getTransferMetaDataKey());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('c0000000000000000000000000000010', $this->instance->getToken());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance->getBrokerPa());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('28.00', $this->instance->getImportoTotale());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance->getTransferAmount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance->getPaymentMetaDataValue());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance->getTransferId());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->instance->getPsp());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->instance->getPaymentMetaDataKey());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->instance->getIuvs());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('c0000000000000000000000000000010', $this->instance->getCcp());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance->getCanale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance->getBrokerPsp());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->instance->getTransferMetaDataCount());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->instance->getPaymentsCount());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance->getTransferIban());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->instance->getAllTokens());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000010', $this->instance->getIuv());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('301000000000000010', $this->instance->getNoticeNumber());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance->getPaEmittenti());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertEquals(['301000000000000010'], $this->instance->getAllNoticesNumbers());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->instance->getPaymentMetaDataCount());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->instance->outcome());
    }
}
