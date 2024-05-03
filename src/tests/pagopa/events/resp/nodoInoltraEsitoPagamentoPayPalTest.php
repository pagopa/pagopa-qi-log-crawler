<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\nodoInoltraEsitoPagamentoPayPal;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\nodoInoltraEsitoPagamentoPayPal::class')]
class nodoInoltraEsitoPagamentoPayPalTest extends TestCase
{

    protected nodoInoltraEsitoPagamentoPayPal $event;

    protected function setUp(): void
    {
        $this->event = new nodoInoltraEsitoPagamentoPayPal(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoInoltraEsitoPagamentoPayPal',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_0010',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_PayPal',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => ''
            ]
        );
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoInoltraEsitoPagamentoPayPal::class, $this->event->getMethodInterface());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->event->workflowEvent();

        $this->assertEquals(MapEvents::getMethodId('nodoInoltraEsitoPagamentoPayPal', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_PayPal', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $values = ['77777777777'];
        $this->assertEquals($values, $this->event->getPaEmittenti());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $values = ['01000000000000010'];
        $this->assertEquals($values, $this->event->getIuvs());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->event->getPaymentsCount());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->event->getTransferCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $values = ['t0000000000000000000000000000010'];
        $this->assertEquals($values, $this->event->getCcps());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
    }
}
