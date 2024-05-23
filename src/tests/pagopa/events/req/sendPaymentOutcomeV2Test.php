<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\sendPaymentOutcomeV2;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\sendPaymentOutcomeV2::class')]
class sendPaymentOutcomeV2Test extends TestCase
{

    protected sendPaymentOutcomeV2 $event;

    protected sendPaymentOutcomeV2 $multi;

    protected function setUp(): void
    {
        $this->event = new sendPaymentOutcomeV2(
            [
                'date_event' => '2024-03-10',
                'inserted_timestamp' => '2024-03-10 08:07:00.201',
                'tipoevento' => 'sendPaymentOutcomeV2',
                'sottotipoevento' => 'REQ',
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
                'payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgogIDxzb2FwOkJvZHk+CiAgICA8bnMzOnNlbmRQYXltZW50T3V0Y29tZVYyUmVxdWVzdCB4bWxuczpuczI9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JQc3AueHNkIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpuczU9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIj4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CiAgICAgIDxwYXltZW50VG9rZW5zPgogICAgICAgIDxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L3BheW1lbnRUb2tlbj4KICAgICAgPC9wYXltZW50VG9rZW5zPgogICAgICA8b3V0Y29tZT5PSzwvb3V0Y29tZT4KICAgIDwvbnMzOnNlbmRQYXltZW50T3V0Y29tZVYyUmVxdWVzdD4KICA8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg==',
            ]
        );

        $this->multi = new sendPaymentOutcomeV2(
            [
                'date_event' => '2024-03-10',
                'inserted_timestamp' => '2024-03-10 08:07:00.201',
                'tipoevento' => 'sendPaymentOutcomeV2',
                'sottotipoevento' => 'REQ',
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
                'payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgogIDxzb2FwOkJvZHk+CiAgICA8bnMzOnNlbmRQYXltZW50T3V0Y29tZVYyUmVxdWVzdCB4bWxuczpuczI9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JQc3AueHNkIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpuczU9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIj4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CiAgICAgIDxwYXltZW50VG9rZW5zPgogICAgICAgIDxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L3BheW1lbnRUb2tlbj4KICAgICAgICA8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyPC9wYXltZW50VG9rZW4+CiAgICAgICAgPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMzwvcGF5bWVudFRva2VuPgogICAgICA8L3BheW1lbnRUb2tlbnM+CiAgICAgIDxvdXRjb21lPk9LPC9vdXRjb21lPgogICAgPC9uczM6c2VuZFBheW1lbnRPdXRjb21lVjJSZXF1ZXN0PgogIDwvc29hcDpCb2R5Pgo8L3NvYXA6RW52ZWxvcGU+',
            ]
        );
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->event->getTransferCount());
        $this->assertNull($this->multi->getTransferCount());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\sendPaymentOutcomeV2::class, $this->event->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\sendPaymentOutcomeV2::class, $this->multi->getMethodInterface());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
        $this->assertNull($this->multi->transactionDetails(0));
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->event->workflowEvent();

        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'REQ'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:07:00.201', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000010', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->event->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->multi->getPaEmittenti());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000001'], $this->event->getCcps());
        $this->assertEquals(['t0000000000000000000000000000001', 't0000000000000000000000000000002', 't0000000000000000000000000000003'], $this->multi->getCcps());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->event->getIuvs());
        $this->assertEquals($value, $this->multi->getIuvs());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->event->getPaymentsCount());
        $this->assertEquals(3, $this->multi->getPaymentsCount());
    }
}
