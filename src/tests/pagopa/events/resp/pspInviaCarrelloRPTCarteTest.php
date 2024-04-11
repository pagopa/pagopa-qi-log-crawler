<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\pspInviaCarrelloRPTCarte;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\pspInviaCarrelloRPTCarteTest::class')]
class pspInviaCarrelloRPTCarteTest extends TestCase
{

    protected pspInviaCarrelloRPTCarte $instance_OK;

    protected pspInviaCarrelloRPTCarte $instance_KO;

    protected function setUp(): void
    {
        $this->instance_OK = new pspInviaCarrelloRPTCarte([
            "inserted_timestamp" =>  "2024-03-13 10:12:00.210",
            "tipoevento" =>  "pspInviaCarrelloRPTCarte",
            "sottotipoevento" =>  "RESP",
            "idDominio" =>  "",
            "iuv" =>  "",
            "ccp" =>  "",
            "noticeNumber" =>  "",
            "creditorReferenceId" =>  "",
            "paymentToken" =>  "",
            "psp" =>  "AGID_01",
            "stazione" =>  "77777777777_01",
            "canale" =>  "88888888888_01",
            "sessionid" =>  "SESSID_01",
            "sessionidoriginal" =>  "SESSORIGIN_01",
            "uniqueid" =>  "UNIQUE_RPT_1",
            "payload" => "PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlIHhtbG5zOm5zMj0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cHNwSW52aWFDYXJyZWxsb1JQVENhcnRlUmVzcG9uc2UgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSIgeHNpOnR5cGU9Im5zMjplc2l0b1BzcEludmlhQ2FycmVsbG9SUFQiPgoJCQkJPGVzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPk9LPC9lc2l0b0NvbXBsZXNzaXZvT3BlcmF6aW9uZT4KCQkJCTxpZGVudGlmaWNhdGl2b0NhcnJlbGxvPnh4eHh4eHh4eHh4eHg8L2lkZW50aWZpY2F0aXZvQ2FycmVsbG8+CgkJCQk8cGFyYW1ldHJpUGFnYW1lbnRvSW1tZWRpYXRvPmlkQnJ1Y2lhdHVyYT14eHcyMjwvcGFyYW1ldHJpUGFnYW1lbnRvSW1tZWRpYXRvPgoJCQk8L3BzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4="
        ]);


        $this->instance_KO = new pspInviaCarrelloRPTCarte([
            "inserted_timestamp" =>  "2024-03-13 10:13:00.210",
            "tipoevento" =>  "pspInviaCarrelloRPTCarte",
            "sottotipoevento" =>  "RESP",
            "idDominio" =>  "",
            "iuv" =>  "",
            "ccp" =>  "",
            "noticeNumber" =>  "",
            "creditorReferenceId" =>  "",
            "paymentToken" =>  "",
            "psp" =>  "AGID_01",
            "stazione" =>  "77777777777_01",
            "canale" =>  "88888888888_01",
            "sessionid" =>  "SESSID_02",
            "sessionidoriginal" =>  "SESSORIGIN_02",
            "uniqueid" =>  "UNIQUE_RPT_2",
            "payload" => "PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMzOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlIHhtbG5zOm5zMj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGVSZXNwb25zZT4KCQkJCTxlc2l0b0NvbXBsZXNzaXZvT3BlcmF6aW9uZT5LTzwvZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+CgkJCQk8bGlzdGFFcnJvcmlSUFQ+CgkJCQkJPGZhdWx0PgoJCQkJCQk8ZmF1bHRDb2RlPkNBTkFMRV9TSU5UQVNTSV9YU0Q8L2ZhdWx0Q29kZT4KCQkJCQkJPGZhdWx0U3RyaW5nPkVycm9yZSBkaSBzaW50YXNzaSBYU0Q8L2ZhdWx0U3RyaW5nPgoJCQkJCQk8aWQ+QUdJRF8wMTwvaWQ+CgkJCQkJCTxzZXJpYWw+MTwvc2VyaWFsPgoJCQkJCTwvZmF1bHQ+CgkJCQk8L2xpc3RhRXJyb3JpUlBUPgoJCQk8L3BzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJCTwvbnMzOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4="
        ]);

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance_OK->getIuvs());
        $this->assertNull($this->instance_KO->getIuvs());
    }

    #[TestDox('getIuvs()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance_OK->getFaultDescription());
        $this->assertNull($this->instance_KO->getFaultDescription());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance_OK->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_KO->getCanale());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->instance_OK->transaction(0));
        $this->assertNull($this->instance_KO->transaction(0));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->instance_OK->getPaEmittenti());
        $this->assertNull($this->instance_KO->getPaEmittenti());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->instance_OK->getPaymentsCount());
        $this->assertNull($this->instance_KO->getPaymentsCount());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->instance_OK->getStazione());
        $this->assertEquals('77777777777_01', $this->instance_KO->getStazione());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance_OK->isFaultEvent());
        $this->assertTrue($this->instance_KO->isFaultEvent());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance_OK->getCcp(0));
        $this->assertNull($this->instance_KO->getCcp(0));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance_OK->getTransferCount(0));
        $this->assertNull($this->instance_KO->getTransferCount(0));
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->instance_OK->getBrokerPa());
        $this->assertEquals('77777777777', $this->instance_KO->getBrokerPa());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->instance_OK->getPsp());
        $this->assertEquals('AGID_01', $this->instance_KO->getPsp());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance_OK->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_KO->getBrokerPsp());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_OK->getNoticeNumber());
        $this->assertNull($this->instance_KO->getNoticeNumber());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance_OK->getIuv(0));
        $this->assertNull($this->instance_KO->getIuv(0));
    }

    #[TestDox('getIuvs()')]
    public function testWorkflowEvent()
    {

        $workflow = $this->instance_OK->workflowEvent(0);
        $this->assertEquals('UNIQUE_RPT_1', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('2024-03-13 10:12:00.210', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));

        $workflow = $this->instance_KO->workflowEvent(0);
        $this->assertEquals('UNIQUE_RPT_2', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('2024-03-13 10:13:00.210', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('CANALE_SINTASSI_XSD', $workflow->getReadyColumnValue('faultcode'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertNull($this->instance_OK->getPaymentToken(0));
        $this->assertNull($this->instance_KO->getPaymentToken(0));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\pspInviaCarrelloRPTCarte::class, $this->instance_OK->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\pspInviaCarrelloRPTCarte::class, $this->instance_KO->getMethodInterface());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->instance_OK->getPaEmittente(0));
        $this->assertNull($this->instance_KO->getPaEmittente(0));
    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertNull($this->instance_OK->getCreditorReferenceId(0));
        $this->assertNull($this->instance_KO->getCreditorReferenceId(0));
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_OK->getFaultString());
        $this->assertEquals('Errore di sintassi XSD', $this->instance_KO->getFaultString());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_OK->getFaultCode());
        $this->assertEquals('CANALE_SINTASSI_XSD', $this->instance_KO->getFaultCode());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->instance_OK->transactionDetails(0));
        $this->assertNull($this->instance_KO->transactionDetails(0));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance_OK->getCcps());
        $this->assertNull($this->instance_KO->getCcps());
    }
}
