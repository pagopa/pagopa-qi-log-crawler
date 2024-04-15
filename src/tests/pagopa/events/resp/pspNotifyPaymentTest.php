<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\pspNotifyPayment;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\resp\pspNotifyPayment::class')]
class pspNotifyPaymentTest extends TestCase
{

    protected pspNotifyPayment $ok_payment;

    protected pspNotifyPayment $ko_payment;


    protected function setUp(): void
    {
        $this->ok_payment = new pspNotifyPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'pspNotifyPayment',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_no_data',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c0000000000000000000000000000010',
                'payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+'
            ]
        );

        $this->ko_payment = new pspNotifyPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'pspNotifyPayment',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_no_data',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c0000000000000000000000000000010',
                'payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPFNPQVAtRU5WOkhlYWRlciB4bWxuczpTT0FQLUVOVj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iLz4KCTxzb2FwOkJvZHk+CgkJPG5zMjpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMj0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5DQU5BTEVfQ0FSUkVMTE9fUklGSVVUQVRPPC9mYXVsdENvZGU+CgkJCQk8ZmF1bHRTdHJpbmc+Q2FycmVsbG8gcmlmaXV0YXRvPC9mYXVsdFN0cmluZz4KCQkJCTxpZD4wPC9pZD4KCQkJCTxkZXNjcmlwdGlvbj5FcnJvcmUgQWNjcmVkaXRvOkFQUDo8L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCTwvbnMyOnBzcE5vdGlmeVBheW1lbnRSZXM+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg=='
            ]
        );
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->ok_payment->transactionDetails(0));
        $this->assertNull($this->ko_payment->transactionDetails(0));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\pspNotifyPayment::class,$this->ok_payment->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\pspNotifyPayment::class,$this->ko_payment->getMethodInterface());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->ok_payment->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->ko_payment->getIuvs());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok_payment->getPaymentsCount());
        $this->assertNull($this->ko_payment->getPaymentsCount());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_payment->getFaultDescription());
        $this->assertEquals('Errore Accredito:APP:', $this->ko_payment->getFaultDescription());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_payment->getTransferCount());
        $this->assertNull($this->ko_payment->getTransferCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ok_payment->getCcps());
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ko_payment->getCcps());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_payment->getFaultString());
        $this->assertEquals('Carrello rifiutato', $this->ko_payment->getFaultString());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->ok_payment->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->ko_payment->getPaEmittenti());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_payment->getFaultCode());
        $this->assertEquals('CANALE_CARRELLO_RIFIUTATO', $this->ko_payment->getFaultCode());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->ok_payment->transaction());
        $this->assertNull($this->ko_payment->transaction());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->ok_payment->workflowEvent(0);

        $this->assertEquals(16, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_no_data', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));


        $workflow = $this->ko_payment->workflowEvent(0);

        $this->assertEquals(16, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_no_data', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('CANALE_CARRELLO_RIFIUTATO', $workflow->getReadyColumnValue('faultcode'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_payment->isFaultEvent());
        $this->assertTrue($this->ko_payment->isFaultEvent());

    }
}
