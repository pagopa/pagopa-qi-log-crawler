<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\paGetPaymentV2;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
#[TestDox('events\resp\paGetPaymentV2::class')]
class paGetPaymentV2Test extends TestCase
{

    protected paGetPaymentV2 $payment;

    protected paGetPaymentV2 $fault;

    protected function setUp(): void
    {
        $this->payment = new paGetPaymentV2(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'paGetPaymentV2',
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
                'payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6cGFmPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L3BhL3BhRm9yTm9kZS54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxwYWY6cGFHZXRQYXltZW50VjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTxkYXRhPgoJCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCQk8cGF5bWVudEFtb3VudD4yMDAuMDA8L3BheW1lbnRBbW91bnQ+CgkJCQk8ZHVlRGF0ZT4yMDI0LTA1LTIyPC9kdWVEYXRlPgoJCQkJPHJldGVudGlvbkRhdGU+MjAyNC0wNS0yM1QwMDowMDowMDwvcmV0ZW50aW9uRGF0ZT4KCQkJCTxsYXN0UGF5bWVudD4wPC9sYXN0UGF5bWVudD4KCQkJCTxkZXNjcmlwdGlvbj54eHh4eHh4eDwvZGVzY3JpcHRpb24+CgkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQk8b2ZmaWNlTmFtZT54eHh4eDwvb2ZmaWNlTmFtZT4KCQkJCTxkZWJ0b3I+CgkJCQkJPHVuaXF1ZUlkZW50aWZpZXI+CgkJCQkJCTxlbnRpdHlVbmlxdWVJZGVudGlmaWVyVHlwZT5GPC9lbnRpdHlVbmlxdWVJZGVudGlmaWVyVHlwZT4KCQkJCQkJPGVudGl0eVVuaXF1ZUlkZW50aWZpZXJWYWx1ZT5YWFhYWFhYWFhYWFhYWFhYPC9lbnRpdHlVbmlxdWVJZGVudGlmaWVyVmFsdWU+CgkJCQkJPC91bmlxdWVJZGVudGlmaWVyPgoJCQkJCTxmdWxsTmFtZT54eHh4eHg8L2Z1bGxOYW1lPgoJCQkJCTxlLW1haWw+eHh4eHh4eHhAeHh4eHgueHh4PC9lLW1haWw+CgkJCQk8L2RlYnRvcj4KCQkJCTx0cmFuc2Zlckxpc3Q+CgkJCQkJPHRyYW5zZmVyPgoJCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MjAwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJCTxJQkFOPklUMDEwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJPHRyYW5zZmVyQ2F0ZWdvcnk+eHh4eHh4PC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTwvdHJhbnNmZXI+CgkJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPC9kYXRhPgoJCTwvcGFmOnBhR2V0UGF5bWVudFYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );

        $this->fault = new paGetPaymentV2(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'paGetPaymentV2',
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
                'payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6SGVhZGVyLz4KCTxzb2FwZW52OkJvZHk+CgkJPG5zMjpwYUdldFBheW1lbnRWMlJlc3BvbnNlIHhtbG5zOm5zMj0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wYS9wYUZvck5vZGUueHNkIj4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UEFBX1BBR0FNRU5UT19TQ09OT1NDSVVUTzwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPnBhZ2FtZW50byBzY29ub3NjaXV0bzwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+MTUzNzYzNzEwMDk8L2lkPgoJCQkJPGRlc2NyaXB0aW9uPkwnaWQgZGVsIHBhZ2FtZW50byByaWNldnV0byBub24gZXNpc3RlPC9kZXNjcmlwdGlvbj4KCQkJPC9mYXVsdD4KCQk8L25zMjpwYUdldFBheW1lbnRWMlJlc3BvbnNlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );

    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->payment->getPaEmittenti());
        $this->assertEquals($value, $this->fault->getPaEmittenti());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->payment->transaction());
        $this->assertNull($this->fault->transaction());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->payment->transactionDetails(0));
        $this->assertNull($this->fault->transactionDetails(0));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['c000000000000000010'];
        $this->assertEquals($value, $this->payment->getCcps());
        $this->assertEquals($value, $this->fault->getCcps());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->payment->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->fault->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('PAA_PAGAMENTO_SCONOSCIUTO', $workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\paGetPaymentV2::class, $this->payment->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\paGetPaymentV2::class, $this->fault->getMethodInterface());
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

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
        $this->assertEquals(1, $this->fault->getPaymentsCount());
    }
}
