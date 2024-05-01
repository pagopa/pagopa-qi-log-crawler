<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\nodoChiediInformazioniPagamento;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\nodoChiediInformazioniPagamento::class')]
class nodoChiediInformazioniPagamentoTest extends TestCase
{

    protected nodoChiediInformazioniPagamento $event;

    protected function setUp(): void
    {
        $this->event = new nodoChiediInformazioniPagamento([
            'date_event' => '2023-09-01',
            'inserted_timestamp' => '2023-09-01 07:37:50',
            'tipoevento' => 'nodoChiediInformazioniPagamento',
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
            'payload' => ''
        ]);
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->event->getPaEmittenti());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->event->workflowEvent();
        $this->assertEquals(31, $workflow->getReadyColumnValue('fk_tipoevento'));
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
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->event->getCcps());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->event->getIuvs());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoChiediInformazioniPagamento::class, $this->event->getMethodInterface());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->event->getTransferCount());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->event->isFaultEvent());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->event->getFaultString());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->event->getFaultDescription());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->event->getPaymentsCount());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->event->getFaultCode());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
    }
}
