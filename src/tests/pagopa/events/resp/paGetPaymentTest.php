<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\paGetPayment;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;


#[TestDox('events\resp\paGetPayment::class')]
class paGetPaymentTest extends TestCase
{

    protected paGetPayment $event;

    protected paGetPayment $fault;


    protected function setUp(): void
    {
        $this->event = new paGetPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'paGetPayment',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_0010',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c000000000000000010',
                'payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cGFHZXRQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wYS9wYUZvck5vZGUueHNkIj4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTxkYXRhPgoJCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCQk8cGF5bWVudEFtb3VudD4xMTUuMDA8L3BheW1lbnRBbW91bnQ+CgkJCQk8ZHVlRGF0ZT4yMDI0LTA1LTEzPC9kdWVEYXRlPgoJCQkJPGRlc2NyaXB0aW9uPnh4eHh4eHg8L2Rlc2NyaXB0aW9uPgoJCQkJPGNvbXBhbnlOYW1lPnh4eHh4PC9jb21wYW55TmFtZT4KCQkJCTx0cmFuc2Zlckxpc3Q+CgkJCQkJPHRyYW5zZmVyPgoJCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTE1LjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L0lCQU4+CgkJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJPHRyYW5zZmVyQ2F0ZWdvcnk+MDEwMTEwMUlNPC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTwvdHJhbnNmZXI+CgkJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPC9kYXRhPgoJCTwvbnMzOnBhR2V0UGF5bWVudFJlcz4KCTwvU09BUC1FTlY6Qm9keT4KPC9TT0FQLUVOVjpFbnZlbG9wZT4='
            ]
        );

        $this->fault = new paGetPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'paGetPayment',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_0010',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c000000000000000010',
                'payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cGFHZXRQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wYS9wYUZvck5vZGUueHNkIj4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UEFBX1BBR0FNRU5UT19JTl9DT1JTTzwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPlBhZ2FtZW50byBpbiBhdHRlc2EgcmlzdWx0YSBpbiBjb3JzbyBhbGzigJlFbnRlIENyZWRpdG9yZS48L2ZhdWx0U3RyaW5nPgoJCQkJPGlkPjk3MDg2NzQwNTgyPC9pZD4KCQkJPC9mYXVsdD4KCQk8L25zMzpwYUdldFBheW1lbnRSZXM+Cgk8L1NPQVAtRU5WOkJvZHk+CjwvU09BUC1FTlY6RW52ZWxvcGU+'
            ]
        );
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
        $this->assertNull($this->fault->transaction());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->event->getIuvs());
        $this->assertEquals($value, $this->fault->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['c000000000000000010'];
        $this->assertEquals($value, $this->event->getCcps());
        $this->assertEquals($value, $this->fault->getCcps());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->event->getTransferCount());
        $this->assertNull($this->fault->getTransferCount());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\paGetPayment::class, $this->event->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\paGetPayment::class, $this->fault->getMethodInterface());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->event->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('paGetPayment', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->fault->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('paGetPayment', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('PAA_PAGAMENTO_IN_CORSO', $workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
        $this->assertNull($this->fault->transactionDetails(0));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->event->getPaymentsCount());
        $this->assertEquals(1, $this->fault->getPaymentsCount());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->event->getPaEmittenti());
        $this->assertEquals($value, $this->fault->getPaEmittenti());
    }
}
