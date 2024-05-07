<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\nodoInoltraPagamentoMod1;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\nodoInoltraPagamentoMod1::class')]
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
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'eyJlc2l0byI6Ik9LIiwidXJsUmVkaXJlY3RQU1AiOiJodHRwczovL3dmZXNwLnBhZ29wYS5nb3YuaXQvcmVkaXJlY3Qvd3BsMDIvZ2V0P2lkU2Vzc2lvbj0xODgxYTJhMi0xNmMzLTRlMjktYjk1OS0wNmZmNzhkYTRjYmMifQ=='
            ]
        );
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->nodoInoltraPagamentoMod1->getPaEmittenti());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->nodoInoltraPagamentoMod1->getIuvs());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->transactionDetails(0));
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->nodoInoltraPagamentoMod1->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('nodoInoltraPagamentoMod1', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->nodoInoltraPagamentoMod1->getPaymentsCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->nodoInoltraPagamentoMod1->getCcps());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoInoltraPagamentoMod1::class, $this->nodoInoltraPagamentoMod1->getMethodInterface());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->transaction());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferCount());
    }

}
