<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\nodoInoltraEsitoPagamentoPayPal;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\nodoInoltraEsitoPagamentoPayPal::class')]
class nodoInoltraEsitoPagamentoPayPalTest extends TestCase
{

    protected nodoInoltraEsitoPagamentoPayPal $paypal;

    protected function setUp(): void
    {
        $this->paypal = new nodoInoltraEsitoPagamentoPayPal(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoInoltraEsitoPagamentoPayPal',
                'sottotipoevento' => 'REQ',
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
                'payload' => 'ewogICAgImlkUGFnYW1lbnRvIjogIjEwMjkyMzAxMDIzOTIyMDM5MjAwMTI5MzkzMDIwMTIyIiwKICAgICJpZFRyYW5zYXppb25lIjogIjExMTExMTExMyIsCiAgICAiaWRUcmFuc2F6aW9uZVBzcCI6ICI5OTk5OTk5OTk5OTk5OSIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAiaW1wb3J0b1RvdGFsZVBhZ2F0byI6IDcwLjAwLAogICAgInRpbWVzdGFtcE9wZXJhemlvbmUiOiAiMjAyNC0wNS0wMlQyMjoxMDoyMC45MjIrMDI6MDAiCn0='
            ]
        );
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->paypal->getPaymentsCount());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoInoltraEsitoPagamentoPayPal::class, $this->paypal->getMethodInterface());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $values = ['t0000000000000000000000000000010'];
        $this->assertEquals($values, $this->paypal->getCcps());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->paypal->getTransferCount());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $values = ['77777777777'];
        $this->assertEquals($values, $this->paypal->getPaEmittenti());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $values = ['01000000000000010'];
        $this->assertEquals($values, $this->paypal->getIuvs());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->paypal->workflowEvent();

        $this->assertEquals(MapEvents::getMethodId('nodoInoltraEsitoPagamentoPayPal', 'REQ'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_PayPal', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->paypal->transaction());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->paypal->transactionDetails(0));
    }
}
