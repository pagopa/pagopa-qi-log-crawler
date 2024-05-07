<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\nodoInoltraPagamentoMod1;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\nodoInoltraPagamentoMod1::class')]
class nodoInoltraPagamentoMod1Test extends TestCase
{

    protected nodoInoltraPagamentoMod1 $nodoInoltraPagamentoMod1;


    protected function setUp(): void
    {
        $this->nodoInoltraPagamentoMod1 = new nodoInoltraPagamentoMod1(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoInoltraPagamentoMod1',
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
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'ewogICAgImlkUGFnYW1lbnRvIjogIjIyYmRlYmYzLThjZTgtNDM4OS1iMDA0LWI4MjIyOTM4YmFmOCIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAidGlwb09wZXJhemlvbmUiOiAid2ViIiwKICAgICJ0aXBvVmVyc2FtZW50byI6ICJCQlQiCn0='
            ]
        );
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->transaction());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->nodoInoltraPagamentoMod1->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('nodoInoltraPagamentoMod1', 'REQ'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->transactionDetails(0));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->nodoInoltraPagamentoMod1->getIuvs());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoInoltraPagamentoMod1::class, $this->nodoInoltraPagamentoMod1->getMethodInterface());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->nodoInoltraPagamentoMod1->getPaymentsCount());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->nodoInoltraPagamentoMod1->getPaEmittenti());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->nodoInoltraPagamentoMod1->getCcps());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferCount());
    }
}
