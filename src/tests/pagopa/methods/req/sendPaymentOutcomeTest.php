<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\sendPaymentOutcome;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;


#[TestDox('methods\req\sendPaymentOutcome::class')]
class sendPaymentOutcomeTest extends TestCase
{

    protected sendPaymentOutcome $instance;

    protected function setUp(): void
    {
        $this->instance = new sendPaymentOutcome(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDM0PC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPktPPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4='));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance->getIuvs());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance->getTransferAmount(0));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance->getTransferIban(0, 0));
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance->getAllNoticesNumbers());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->instance->getImportoTotale());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->instance->getPaEmittenti());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000034'], $this->instance->getCcps());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000034', $this->instance->getCcp());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance->getTransferCount());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance->getTransferPa(0,0));
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->instance->getPsp());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000034', $this->instance->getToken());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['t0000000000000000000000000000034'], $this->instance->getAllTokens());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance->getCanale());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo(0, 0));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->instance->getPaEmittente());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->instance->getImporto());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('KO', $this->instance->outcome());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance->getNoticeNumber());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance->getIuv());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance->getBrokerPsp());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance->getTransferId(0, 0));
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance->getStazione());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance->getBrokerPa());
    }
}
