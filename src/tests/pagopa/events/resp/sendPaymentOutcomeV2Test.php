<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\sendPaymentOutcomeV2;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\sendPaymentOutcomeV2::class')]
class sendPaymentOutcomeV2Test extends TestCase
{

    protected sendPaymentOutcomeV2 $payment;

    protected sendPaymentOutcomeV2 $fault;

    protected function setUp(): void
    {
        $this->payment = new sendPaymentOutcomeV2(
            [
                'date_event' => '2024-03-10',
                'inserted_timestamp' => '2024-03-10 08:07:00.201',
                'tipoevento' => 'sendPaymentOutcomeV2',
                'sottotipoevento' => 'RESP',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticenumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_000039',
                'sessionidoriginal' => '',
                'uniqueid' => 'T000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJPC9uZnA6c2VuZFBheW1lbnRPdXRjb21lVjJSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+',
            ]
        );
        $this->fault = new sendPaymentOutcomeV2(
            [
                'date_event' => '2024-03-10',
                'inserted_timestamp' => '2024-03-10 08:07:00.201',
                'tipoevento' => 'sendPaymentOutcomeV2',
                'sottotipoevento' => 'RESP',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticenumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_000039',
                'sessionidoriginal' => '',
                'uniqueid' => 'T000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UFBUX1RPS0VOX1NDQURVVE88L2ZhdWx0Q29kZT4KCQkJCTxmYXVsdFN0cmluZz5wYXltZW50VG9rZW4gaXMgZXhwaXJlZDwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+Tm9kb0RlaVBhZ2FtZW50aVNQQzwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+cGF5bWVudFRva2VuIGlzIGV4cGlyZWQ8L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCTwvbmZwOnNlbmRQYXltZW50T3V0Y29tZVYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==',
            ]
        );
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->payment->transactionDetails(0));
        $this->assertNull($this->fault->transactionDetails(0));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
        $this->assertNull($this->fault->getTransferCount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->payment->getIuvs());
        $this->assertEquals($value, $this->fault->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->payment->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->fault->getPaEmittenti());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->payment->transaction());
        $this->assertNull($this->fault->transaction());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->payment->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:07:00.201', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000010', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->fault->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:07:00.201', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000010', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('PPT_TOKEN_SCADUTO', $workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\sendPaymentOutcomeV2::class, $this->payment->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\sendPaymentOutcomeV2::class, $this->fault->getMethodInterface());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
        $this->assertEquals(1, $this->fault->getPaymentsCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000010'], $this->payment->getCcps());
        $this->assertEquals(['t0000000000000000000000000000010'], $this->fault->getCcps());
    }
}
