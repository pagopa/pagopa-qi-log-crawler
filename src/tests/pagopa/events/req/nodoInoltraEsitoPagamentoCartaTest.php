<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\nodoInoltraEsitoPagamentoCarta;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\nodoInoltraEsitoPagamentoCartaTest::class')]
class nodoInoltraEsitoPagamentoCartaTest extends TestCase
{

    protected nodoInoltraEsitoPagamentoCarta $event;

    protected function setUp(): void
    {
        $this->event = new nodoInoltraEsitoPagamentoCarta(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoInoltraEsitoPagamentoCarta',
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
                'payload' => 'ewogICAgIlJSTiI6IDExMTExMTExMTExMiwKICAgICJjb2RpY2VBdXRvcml6emF0aXZvIjogIjU1NTU1NSIsCiAgICAiZXNpdG9UcmFuc2F6aW9uZUNhcnRhIjogIjAwIiwKICAgICJpZFBhZ2FtZW50byI6ICJ0MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAiaW1wb3J0b1RvdGFsZVBhZ2F0byI6IDI0Mi45LAogICAgInRpbWVzdGFtcE9wZXJhemlvbmUiOiAiMjAyNC0wNC0zMFQyMzo1MTo1OC4xODMrMDI6MDAiLAogICAgInRpcG9WZXJzYW1lbnRvIjogIkNQIgp9'
            ]
        );

    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->event->getFaultDescription());
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

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->event->getFaultString());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoInoltraEsitoPagamentoCarta::class, $this->event->getMethodInterface());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->event->getFaultCode());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->event->getPaEmittenti());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->event->isFaultEvent());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->event->workflowEvent();

        $this->assertEquals(33, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));

        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
    }

}
