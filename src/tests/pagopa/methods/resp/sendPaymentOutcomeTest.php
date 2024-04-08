<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\sendPaymentOutcome;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;


#[TestDox('methods\resp\sendPaymentOutcome::class')]
class sendPaymentOutcomeTest extends TestCase
{

    protected sendPaymentOutcome $instance_ok;

    protected sendPaymentOutcome $instance_ko;

    protected function setUp(): void
    {
        $this->instance_ok = new sendPaymentOutcome(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
        $this->instance_ko = new sendPaymentOutcome(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfRVNJVE9fQUNRVUlTSVRPPC9mYXVsdENvZGU+CgkJCQk8ZmF1bHRTdHJpbmc+cGF5bWVudFRva2VuIGlzIGV4cGlyZWQ8L2ZhdWx0U3RyaW5nPgoJCQkJPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgoJCQkJPGRlc2NyaXB0aW9uPnBheW1lbnRUb2tlbiBpcyBleHBpcmVkPC9kZXNjcmlwdGlvbj4KCQkJPC9mYXVsdD4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance_ok->getIuvs());
        $this->assertNull($this->instance_ko->getIuvs());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance_ok->getTransferAmount(0));
        $this->assertNull($this->instance_ko->getTransferAmount(0));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance_ok->getTransferIban(0,0));
        $this->assertNull($this->instance_ko->getTransferIban(0,0));
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance_ok->getAllNoticesNumbers());
        $this->assertNull($this->instance_ko->getAllNoticesNumbers());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->instance_ok->getImportoTotale());
        $this->assertNull($this->instance_ko->getImportoTotale());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->instance_ok->getPaEmittenti());
        $this->assertNull($this->instance_ko->getPaEmittenti());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance_ok->getCcps());
        $this->assertNull($this->instance_ko->getCcps());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance_ok->getCcp());
        $this->assertNull($this->instance_ko->getCcp());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance_ok->getTransferCount(0));
        $this->assertNull($this->instance_ko->getTransferCount(0));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance_ok->getTransferPa(0,0));
        $this->assertNull($this->instance_ko->getTransferPa(0,0));
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->instance_ok->getPsp());
        $this->assertNull($this->instance_ko->getPsp());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->instance_ok->getToken());
        $this->assertNull($this->instance_ko->getToken());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->instance_ok->getAllTokens());
        $this->assertNull($this->instance_ko->getAllTokens());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->instance_ok->getCanale());
        $this->assertNull($this->instance_ko->getCanale());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->instance_ok->getPaymentsCount());
        $this->assertNull($this->instance_ko->getPaymentsCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_ok->isBollo(0,0));
        $this->assertFalse($this->instance_ko->isBollo(0,0));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->instance_ok->getPaEmittente());
        $this->assertNull($this->instance_ko->getPaEmittente());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->instance_ok->getImporto());
        $this->assertNull($this->instance_ko->getImporto());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->instance_ok->outcome());
        $this->assertEquals('KO', $this->instance_ko->outcome());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_ok->getNoticeNumber());
        $this->assertNull($this->instance_ko->getNoticeNumber());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance_ok->getIuv());
        $this->assertNull($this->instance_ko->getIuv());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->instance_ok->getBrokerPsp());
        $this->assertNull($this->instance_ko->getBrokerPsp());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance_ok->getTransferId(0, 0));
        $this->assertNull($this->instance_ko->getTransferId(0, 0));
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance_ok->getStazione());
        $this->assertNull($this->instance_ko->getStazione());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance_ok->getBrokerPa());
        $this->assertNull($this->instance_ko->getBrokerPa());
    }
}
