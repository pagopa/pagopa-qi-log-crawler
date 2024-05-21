<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\paSendRT;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\paGetPayment::class')]
class paSendRTTest extends TestCase
{
    protected paSendRT $paSendRT;

    protected function setUp(): void
    {
        $this->paSendRT = new paSendRT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'paSendRT',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_0010',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'r0209430439039409209312014857300',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'r0209430439039409209312014857300',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwYWZuPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L3BhL3BhRm9yTm9kZS54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcGFGb3JOb2RlIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBhZm46cGFTZW5kUlRSZXE+CgkJCTxpZFBBPjc3Nzc3Nzc3Nzc4PC9pZFBBPgoJCQk8aWRCcm9rZXJQQT43Nzc3Nzc3Nzc3NzwvaWRCcm9rZXJQQT4KCQkJPGlkU3RhdGlvbj43Nzc3Nzc3Nzc3N18wMTwvaWRTdGF0aW9uPgoJCQk8cmVjZWlwdD4KCQkJCTxyZWNlaXB0SWQ+cjAyMDk0MzA0MzkwMzk0MDkyMDkzMTIwMTQ4NTczMDA8L3JlY2VpcHRJZD4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMDEwPC9ub3RpY2VOdW1iZXI+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCQk8cGF5bWVudEFtb3VudD4xMzAuMDA8L3BheW1lbnRBbW91bnQ+CgkJCQk8ZGVzY3JpcHRpb24+VEFSSTwvZGVzY3JpcHRpb24+CgkJCQk8Y29tcGFueU5hbWU+Q29tdW5lIEluZXNpc3RlbnRlPC9jb21wYW55TmFtZT4KCQkJCTxkZWJ0b3I+CgkJCQkJPHVuaXF1ZUlkZW50aWZpZXI+CgkJCQkJCTxlbnRpdHlVbmlxdWVJZGVudGlmaWVyVHlwZT5GPC9lbnRpdHlVbmlxdWVJZGVudGlmaWVyVHlwZT4KCQkJCQkJPGVudGl0eVVuaXF1ZUlkZW50aWZpZXJWYWx1ZT5YWFhYWFhYWFhYWFhYWFhYPC9lbnRpdHlVbmlxdWVJZGVudGlmaWVyVmFsdWU+CgkJCQkJPC91bmlxdWVJZGVudGlmaWVyPgoJCQkJCTxmdWxsTmFtZT5YWFggWFhYPC9mdWxsTmFtZT4KCQkJCTwvZGVidG9yPgoJCQkJPHRyYW5zZmVyTGlzdD4KCQkJCQk8dHJhbnNmZXI+CgkJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJCTx0cmFuc2ZlckFtb3VudD4xMzAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJCTxJQkFOPklUMDEwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj5yZW1pdHRhbmNlPC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4PC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTwvdHJhbnNmZXI+CgkJCQk8L3RyYW5zZmVyTGlzdD4KCQkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJCTxwc3BGaXNjYWxDb2RlPjg4ODg4ODg4ODg4PC9wc3BGaXNjYWxDb2RlPgoJCQkJPFBTUENvbXBhbnlOYW1lPkJhbmNhPC9QU1BDb21wYW55TmFtZT4KCQkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJCTxjaGFubmVsRGVzY3JpcHRpb24+V0lTUDwvY2hhbm5lbERlc2NyaXB0aW9uPgoJCQkJPHBheW1lbnRNZXRob2Q+Q1A8L3BheW1lbnRNZXRob2Q+CgkJCQk8ZmVlPjAuNTA8L2ZlZT4KCQkJCTxwYXltZW50RGF0ZVRpbWU+MjAyNC0wNS0yMVQyMDoyNzozMzwvcGF5bWVudERhdGVUaW1lPgoJCQkJPGFwcGxpY2F0aW9uRGF0ZT4yMDI0LTA1LTIxPC9hcHBsaWNhdGlvbkRhdGU+CgkJCQk8dHJhbnNmZXJEYXRlPjIwMjQtMDUtMjI8L3RyYW5zZmVyRGF0ZT4KCQkJPC9yZWNlaXB0PgoJCTwvcGFmbjpwYVNlbmRSVFJlcT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'
            ]
        );
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->paSendRT->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['r0209430439039409209312014857300'];
        $this->assertEquals($value, $this->paSendRT->getCcps());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->paSendRT->getPaymentsCount());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->paSendRT->workflowEvent(0);
        $this->assertEquals(MapEvents::getMethodId('paSendRT', 'REQ'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));

        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->paSendRT->getTransferCount());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\paSendRT::class, $this->paSendRT->getMethodInterface());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->paSendRT->getPaEmittenti());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->paSendRT->transaction());
    }
}
