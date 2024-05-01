<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\nodoChiediInformazioniPagamento;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\nodoChiediInformazioniPagamento::class')]
class nodoChiediInformazioniPagamentoTest extends TestCase
{

    protected nodoChiediInformazioniPagamento $event;


    protected function setUp(): void
    {
        $this->event = new nodoChiediInformazioniPagamento([
            'date_event' => '2023-09-01',
            'inserted_timestamp' => '2023-09-01 07:37:50',
            'tipoevento' => 'nodoChiediInformazioniPagamento',
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
            'payload' => 'ewogICAgIklCQU4iOiAiSVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxIiwKICAgICJib2xsb0RpZ2l0YWxlIjogZmFsc2UsCiAgICAiY29kaWNlRmlzY2FsZSI6ICJYWFhYWFhYWFhYWFhYWFgiLAogICAgImRldHRhZ2xpIjogWwogICAgICAgIHsKICAgICAgICAgICAgIkNDUCI6ICJjMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIsCiAgICAgICAgICAgICJJVVYiOiAiMDEwMDAwMDAwMDAwMDAwMTAiLAogICAgICAgICAgICAiY29kaWNlUGFnYXRvcmUiOiAiWFhYWFhYWFhYWFhYWFhYIiwKICAgICAgICAgICAgImVudGVCZW5lZmljaWFyaW8iOiAieHh4eHgiLAogICAgICAgICAgICAiaWREb21pbmlvIjogIjc3Nzc3Nzc3Nzc3IiwKICAgICAgICAgICAgImltcG9ydG8iOiA3NS41MCwKICAgICAgICAgICAgIm5vbWVQYWdhdG9yZSI6ICJ4eHh4eCIsCiAgICAgICAgICAgICJ0aXBvUGFnYXRvcmUiOiAiRiIKICAgICAgICB9CiAgICBdLAogICAgImltcG9ydG9Ub3RhbGUiOiA3NS41MCwKICAgICJvZ2dldHRvUGFnYW1lbnRvIjogIlBBR0FNRU5UTyBUQVJJIFJBVEEgMSIsCiAgICAicmFnaW9uZVNvY2lhbGUiOiAieHh4eHgiLAogICAgInVybFJlZGlyZWN0RUMiOiAiaHR0cDovL2V4YW1wbGUuY29tIgp9'
        ]);
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->event->getCcps());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {

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

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->event->getIuvs());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoChiediInformazioniPagamento::class, $this->event->getMethodInterface());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->event->getPaymentsCount());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->event->getFaultDescription());
    }
}
