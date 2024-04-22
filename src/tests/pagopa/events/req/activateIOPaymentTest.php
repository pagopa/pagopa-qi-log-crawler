<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\activateIOPayment;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\req\activateIOPayment::class')]
class activateIOPaymentTest extends TestCase
{

    protected activateIOPayment $payment;


    protected function setUp(): void
    {
        $this->payment = new activateIOPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activateIOPayment',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6bmZwc3A9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9ySU8ueHNkIiB4bWxuczpzb2FwPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6dG5zPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvcklPLndzZGwiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXEgeG1sbnM6bmZwc3A9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9ySU8ueHNkIj4KCQkJPGlkUFNQPkFHSURfMDE8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+Nzc3Nzc3Nzc3Nzc8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjc3Nzc3Nzc3Nzc3XzAxPC9pZENoYW5uZWw+CgkJCTxwYXNzd29yZD54eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAxMDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4zMC4wMDwvYW1vdW50PgoJCTwvbmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXE+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg=='
            ]);
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\activateIOPayment::class, $this->payment->getMethodInterface());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->payment->getPaEmittenti());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->payment->transactionDetails(0));
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->payment->getFaultDescription());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $transaction = $this->payment->transaction();

        $this->assertEquals('2023-09-01 07:37:50.000', $transaction->getReadyColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000010', $transaction->getReadyColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getReadyColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000010', $transaction->getReadyColumnValue('notice_id'));
        $this->assertEquals('AGID_01', $transaction->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getReadyColumnValue('canale'));
        $this->assertEquals('30.00', $transaction->getReadyColumnValue('importo'));
        $this->assertEquals('APP_IO', $transaction->getReadyColumnValue('touchpoint'));

        $this->assertNull($transaction->getReadyColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->payment->getIuvs());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflowEvent = $this->payment->workflowEvent();

        $this->assertEquals('21', $workflowEvent->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflowEvent->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflowEvent->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflowEvent->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflowEvent->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflowEvent->getReadyColumnValue('canale'));

        $this->assertNull($workflowEvent->getReadyColumnValue('faultcode'));
        $this->assertNull($workflowEvent->getReadyColumnValue('outcome'));
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->payment->getFaultString());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000010'], $this->payment->getCcps());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->payment->isFaultEvent());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->payment->getFaultCode());
    }
}
