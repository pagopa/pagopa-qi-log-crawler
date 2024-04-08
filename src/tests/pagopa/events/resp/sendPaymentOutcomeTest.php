<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\sendPaymentOutcome;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\resp\sendPaymentOutcome::class')]
class sendPaymentOutcomeTest extends TestCase
{

    protected sendPaymentOutcome $instance_OK;

    protected sendPaymentOutcome $instance_KO;

    public function setUp(): void
    {
        $this->instance_OK = new sendPaymentOutcome(
            [
                'id' => 67,
                'date_event' => '2024-03-10',
                'inserted_timestamp' => '2024-03-10 08:08:00.201',
                'tipoevento' => 'sendPaymentOutcome',
                'sottotipoevento' => 'RESP',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000035',
                'ccp' => 't0000000000000000000000000000035',
                'noticenumber' => '301000000000000035',
                'creditorreferenceid' => '01000000000000035',
                'paymenttoken' => 't0000000000000000000000000000035',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_000041',
                'sessionidoriginal' => '',
                'uniqueid' => 'T000067',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
            ]
        );

        $this->instance_KO = new sendPaymentOutcome(
            [
                'id' => 67,
                'date_event' => '2024-03-10',
                'inserted_timestamp' => '2024-03-10 08:08:00.201',
                'tipoevento' => 'sendPaymentOutcome',
                'sottotipoevento' => 'RESP',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000036',
                'ccp' => 't0000000000000000000000000000036',
                'noticenumber' => '301000000000000036',
                'creditorreferenceid' => '01000000000000036',
                'paymenttoken' => 't0000000000000000000000000000036',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_000041',
                'sessionidoriginal' => '',
                'uniqueid' => 'T000067',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lUmVzPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfRVNJVE9fQUNRVUlTSVRPPC9mYXVsdENvZGU+CgkJCQk8ZmF1bHRTdHJpbmc+cGF5bWVudFRva2VuIGlzIGV4cGlyZWQ8L2ZhdWx0U3RyaW5nPgoJCQkJPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgoJCQkJPGRlc2NyaXB0aW9uPnBheW1lbnRUb2tlbiBpcyBleHBpcmVkPC9kZXNjcmlwdGlvbj4KCQkJPC9mYXVsdD4KCQk8L25mcDpzZW5kUGF5bWVudE91dGNvbWVSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
            ]
        );
    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertEquals('01000000000000035', $this->instance_OK->getCreditorReferenceId());
        $this->assertEquals('01000000000000036', $this->instance_KO->getCreditorReferenceId());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance_OK->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_KO->getBrokerPsp());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance_OK->getTransferCount());
        $this->assertNull($this->instance_KO->getTransferCount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000035'], $this->instance_OK->getIuvs());
        $this->assertEquals(['01000000000000036'], $this->instance_KO->getIuvs());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_OK->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_KO->getPaEmittente());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_OK->getPaymentsCount());
        $this->assertEquals(1, $this->instance_KO->getPaymentsCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000035', $this->instance_OK->getIuv());
        $this->assertEquals('01000000000000036', $this->instance_KO->getIuv());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000035', $this->instance_OK->getCcp());
        $this->assertEquals('t0000000000000000000000000000036', $this->instance_KO->getCcp());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance_OK->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_KO->getCanale());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->instance_OK->getStazione());
        $this->assertEquals('77777777777_01', $this->instance_KO->getStazione());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->instance_OK->getBrokerPa());
        $this->assertEquals('77777777777', $this->instance_KO->getBrokerPa());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000035'], $this->instance_OK->getCcps());
        $this->assertEquals(['t0000000000000000000000000000036'], $this->instance_KO->getCcps());
    }

    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertEquals('t0000000000000000000000000000035', $this->instance_OK->getPaymentToken());
        $this->assertEquals('t0000000000000000000000000000036', $this->instance_KO->getPaymentToken());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\sendPaymentOutcome::class, $this->instance_OK->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\sendPaymentOutcome::class, $this->instance_KO->getMethodInterface());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance_OK->getFaultDescription());
        $this->assertEquals('paymentToken is expired', $this->instance_KO->getFaultDescription());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance_OK->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_KO->getPaEmittenti());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_OK->getFaultString());
        $this->assertEquals('paymentToken is expired', $this->instance_KO->getFaultString());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('301000000000000035', $this->instance_OK->getNoticeNumber());
        $this->assertEquals('301000000000000036', $this->instance_KO->getNoticeNumber());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_OK->getFaultCode());
        $this->assertEquals('PPT_ESITO_ACQUISITO', $this->instance_KO->getFaultCode());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->instance_OK->getPsp());
        $this->assertEquals('AGID_01', $this->instance_KO->getPsp());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance_OK->isFaultEvent());
        $this->assertTrue($this->instance_KO->isFaultEvent());
    }
}
