<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\pspNotifyPaymentV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\pspNotifyPaymentV2::class')]
class pspNotifyPaymentV2Test extends TestCase
{

    protected pspNotifyPaymentV2 $event;


    protected function setUp(): void
    {
        $this->event = new pspNotifyPaymentV2(
          [
              'date_event' => '2024-03-10',
              'inserted_timestamp' => '2024-03-10 10:27:00.197',
              'tipoevento' => 'pspNotifyPaymentV2',
              'sottotipoevento' => 'REQ',
              'iddominio' => '77777777777',
              'iuv' => '01000000000000001',
              'ccp' => 't0000000000000000000000000000001',
              'noticenumber' => '301000000000000001',
              'creditorreferenceid' => '01000000000000001',
              'paymenttoken' => 't0000000000000000000000000000001',
              'psp' => 'PSP_V2',
              'stazione' => '77777777777_01',
              'canale' => '88888888888_01',
              'sessionid' => 'sessid_100176',
              'sessionidoriginal' => 'sessidoriginal_closepayment_v2',
              'uniqueid' => 'T000178',
              'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50VjI+CgkJCTxpZFBTUD5QU1BfVjI8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAyPC9pZENoYW5uZWw+CgkJCTx0cmFuc2FjdGlvbklkPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDAwPC90cmFuc2FjdGlvbklkPgoJCQk8dG90YWxBbW91bnQ+NzAxLjAwPC90b3RhbEFtb3VudD4KCQkJPGZlZT4xLjAwPC9mZWU+CgkJCTx0aW1lc3RhbXBPcGVyYXRpb24+MjAyNC0wNC0xOVQyMzowMTo0NDwvdGltZXN0YW1wT3BlcmF0aW9uPgoJCQk8cGF5bWVudExpc3Q+CgkJCQk8cGF5bWVudD4KCQkJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9wYXltZW50VG9rZW4+CgkJCQkJPHBheW1lbnREZXNjcmlwdGlvbj5wYWdhbWVudG8gbXVsdGliZW5lZmljaWFyaW88L3BheW1lbnREZXNjcmlwdGlvbj4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAwMTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQkJCQk8ZGVidEFtb3VudD4yNTAuMDA8L2RlYnRBbW91bnQ+CgkJCQkJPHRyYW5zZmVyTGlzdD4KCQkJCQkJPHRyYW5zZmVyPgoJCQkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQkJCTx0cmFuc2ZlckFtb3VudD4xMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMV8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzFfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMV8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzFfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJCTx0cmFuc2Zlcj4KCQkJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTUwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQkJCTxJQkFOPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMl8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzJfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMl8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzJfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJPC90cmFuc2Zlckxpc3Q+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzI8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCTwvbWV0YWRhdGE+CgkJCQk8L3BheW1lbnQ+CgkJCQk8cGF5bWVudD4KCQkJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyPC9wYXltZW50VG9rZW4+CgkJCQkJPHBheW1lbnREZXNjcmlwdGlvbj5wYWdhbWVudG8gbXVsdGliZW5lZmljaWFyaW88L3BheW1lbnREZXNjcmlwdGlvbj4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzg3PC9maXNjYWxDb2RlUEE+CgkJCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAwMjwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQkJCQk8ZGVidEFtb3VudD40NTAuMDA8L2RlYnRBbW91bnQ+CgkJCQkJPHRyYW5zZmVyTGlzdD4KCQkJCQkJPHRyYW5zZmVyPgoJCQkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc4NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDExPC9JQkFOPgoJCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMV8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzFfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMV8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzFfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJCTx0cmFuc2Zlcj4KCQkJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MjUwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3ODg8L2Zpc2NhbENvZGVQQT4KCQkJCQkJCTxJQkFOPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMjwvSUJBTj4KCQkJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMl8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzJfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMl8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzJfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJPC90cmFuc2Zlckxpc3Q+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzI8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCTwvbWV0YWRhdGE+CgkJCQk8L3BheW1lbnQ+CgkJCTwvcGF5bWVudExpc3Q+CgkJCTxhZGRpdGlvbmFsUGF5bWVudEluZm9ybWF0aW9ucz4KCQkJCTxtZXRhZGF0YT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+dGlwb1ZlcnNhbWVudG88L2tleT4KCQkJCQkJPHZhbHVlPkNQPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJCTxtYXBFbnRyeT4KCQkJCQkJPGtleT5vdXRjb21lUGF5bWVudEdhdGV3YXk8L2tleT4KCQkJCQkJPHZhbHVlPk9LPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJCTxtYXBFbnRyeT4KCQkJCQkJPGtleT50aW1lc3RhbXBPcGVyYXRpb248L2tleT4KCQkJCQkJPHZhbHVlPjIwMjQtMDQtMTlUMjM6MDE6NDQ8L3ZhbHVlPgoJCQkJCTwvbWFwRW50cnk+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PnRvdGFsQW1vdW50PC9rZXk+CgkJCQkJCTx2YWx1ZT43MDEuMDA8L3ZhbHVlPgoJCQkJCTwvbWFwRW50cnk+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PmZlZTwva2V5PgoJCQkJCQk8dmFsdWU+MS4wMDwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+YXV0aG9yaXphdGlvbkNvZGU8L2tleT4KCQkJCQkJPHZhbHVlPjEwMDAwMTwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+cnJuPC9rZXk+CgkJCQkJCTx2YWx1ZT56enp6enp6enp6enp6enp6enp6enoxPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJPC9tZXRhZGF0YT4KCQkJPC9hZGRpdGlvbmFsUGF5bWVudEluZm9ybWF0aW9ucz4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50VjI+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
          ]
        );
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspNotifyPaymentV2::class, $this->event->getMethodInterface());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777','77777777787'], $this->event->getPaEmittenti());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000001','01000000000000002'], $this->event->getIuvs());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(2, $this->event->getTransferCount(0));
        $this->assertEquals(2, $this->event->getTransferCount(1));
        $this->assertNull($this->event->getTransferCount(2));
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->event->workflowEvent(0);

        $this->assertEquals('25', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PSP_V2', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));

        $workflow = $this->event->workflowEvent(1);

        $this->assertEquals('25', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PSP_V2', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));

    }
    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(2, $this->event->getPaymentsCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000001','t0000000000000000000000000000002'], $this->event->getCcps());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
    }

}
