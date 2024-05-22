<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\paGetPaymentV2;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\paGetPaymentV2::class')]
class paGetPaymentV2Test extends TestCase
{

    protected paGetPaymentV2 $payment;

    protected function setUp(): void
    {
        $this->payment = new paGetPaymentV2(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'paGetPaymentV2',
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
                'ccp' => 'c000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwYWZuPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L3BhL3BhRm9yTm9kZS54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcGFGb3JOb2RlIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBhZm46cGFHZXRQYXltZW50VjJSZXF1ZXN0PgoJCQk8aWRQQT43Nzc3Nzc3Nzc3NzwvaWRQQT4KCQkJPGlkQnJva2VyUEE+Nzc3Nzc3Nzc3Nzc8L2lkQnJva2VyUEE+CgkJCTxpZFN0YXRpb24+Nzc3Nzc3Nzc3NzdfMDE8L2lkU3RhdGlvbj4KCQkJPHFyQ29kZT4KCQkJCTxmaXNjYWxDb2RlPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlPgoJCQkJPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAwMTA8L25vdGljZU51bWJlcj4KCQkJPC9xckNvZGU+CgkJCTxhbW91bnQ+MjAwLjAwPC9hbW91bnQ+CgkJCTx0cmFuc2ZlclR5cGU+UEFHT1BBPC90cmFuc2ZlclR5cGU+CgkJPC9wYWZuOnBhR2V0UGF5bWVudFYyUmVxdWVzdD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'
            ]
        );
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->payment->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->payment->getPaEmittenti());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->payment->transactionDetails(0));
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->payment->transaction());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->payment->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'REQ'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['c000000000000000010'];
        $this->assertEquals($value, $this->payment->getCcps());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\paGetPaymentV2::class, $this->payment->getMethodInterface());
    }
}
