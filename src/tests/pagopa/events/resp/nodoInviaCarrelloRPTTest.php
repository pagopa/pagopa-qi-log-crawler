<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\nodoInviaCarrelloRPT;
use pagopa\crawler\FaultInterface;
use PHPUnit\Framework\TestCase;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\resp\nodoInviaCarrelloRPT::class')]
class nodoInviaCarrelloRPTTest extends TestCase
{
    protected nodoInviaCarrelloRPT $instance_1;

    protected nodoInviaCarrelloRPT $instance_fault;


    protected function setUp(): void
    {
        $this->instance_1 = new nodoInviaCarrelloRPT([
            "inserted_timestamp" =>  "2024-03-13 09:15:00.210",
            "tipoEvento" =>  "nodoInviaCarrelloRPT",
            "sottoTipoEvento" =>  "RESP",
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
            "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+"
        ]);

        $this->instance_fault = new nodoInviaCarrelloRPT([
            "inserted_timestamp" =>  "2024-03-13 09:18:00.210",
            "tipoEvento" =>  "nodoInviaCarrelloRPT",
            "sottoTipoEvento" =>  "RESP",
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
            "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+S088L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8bGlzdGFFcnJvcmlSUFQ+CgkJCQk8ZmF1bHQ+CgkJCQkJPGZhdWx0Q29kZT5QUFRfSUJBTl9OT05fQ0VOU0lUTzwvZmF1bHRDb2RlPgoJCQkJCTxmYXVsdFN0cmluZz5JbCBjb2RpY2UgSUJBTiBpbmRpY2F0byBkYWwgRUMgbm9uIMOoIHByZXNlbnRlIG5lbGxhIGxpc3RhIGRlZ2xpIElCQU4gY29tdW5pY2F0aSBhbCBzaXN0ZW1hIHBhZ29QQS48L2ZhdWx0U3RyaW5nPgoJCQkJCTxpZD5Ob2RvRGVpUGFnYW1lbnRpU1BDPC9pZD4KCQkJCQk8ZGVzY3JpcHRpb24+SSB2YWxvcmkgZGkgSUJBTiBpbmRpY2F0aSBuZWkgdmVyc2FtZW50aSBbSVQxNlgwMjAwODEyMDExMDAwMTA3MDQyMzc0XSBub24gZmFubm8gcGFydGUgZGVnbGkgSUJBTiB2YWxpZGkgcGVyIGxhIFBBPC9kZXNjcmlwdGlvbj4KCQkJCQk8c2VyaWFsPjE8L3NlcmlhbD4KCQkJCTwvZmF1bHQ+CgkJCTwvbGlzdGFFcnJvcmlSUFQ+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+"
        ]);
    }


    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance_1->getTransferCount(0));
        $this->assertNull($this->instance_fault->getTransferCount(0));

        $this->assertNull($this->instance_1->getTransferCount(1));
        $this->assertNull($this->instance_fault->getTransferCount(1));

    }

    #[TestDox('isValid()')]
    public function testIsValid()
    {
        $this->assertTrue($this->instance_1->isValid(0));
        $this->assertTrue($this->instance_fault->isValid(0));
    }

    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertNull($this->instance_1->getPaymentToken(0));
        $this->assertNull($this->instance_fault->getPaymentToken(0));
        $this->assertNull($this->instance_1->getPaymentToken(1));
        $this->assertNull($this->instance_fault->getPaymentToken(1));
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance_1->getCcp(0));
        $this->assertNull($this->instance_fault->getCcp(0));
        $this->assertNull($this->instance_1->getCcp(1));
        $this->assertNull($this->instance_fault->getCcp(1));
    }

    #[TestDox('getKey()')]
    public function testGetKey()
    {
        $this->assertNull($this->instance_1->getKey(0));
        $this->assertNull($this->instance_fault->getKey(0));
        $this->assertNull($this->instance_1->getKey(1));
        $this->assertNull($this->instance_fault->getKey(1));
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_1->getNoticeNumber(0));
        $this->assertNull($this->instance_fault->getNoticeNumber(0));
        $this->assertNull($this->instance_1->getNoticeNumber(1));
        $this->assertNull($this->instance_fault->getNoticeNumber(1));
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance_1->getCcps());
        $this->assertNull($this->instance_fault->getCcps());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance_1->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_fault->getBrokerPsp());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->instance_1->getPsp());
        $this->assertEquals('AGID_01', $this->instance_fault->getPsp());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance_1->getIuv(0));
        $this->assertNull($this->instance_fault->getIuv(0));
        $this->assertNull($this->instance_1->getIuv(1));
        $this->assertNull($this->instance_fault->getIuv(1));
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->instance_1->getStazione());
        $this->assertEquals('77777777777_01', $this->instance_fault->getStazione());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance_1->getIuvs());
        $this->assertNull($this->instance_fault->getIuvs());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance_1->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_fault->getCanale());
    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertNull($this->instance_1->getCreditorReferenceId(0));
        $this->assertNull($this->instance_fault->getCreditorReferenceId(0));
        $this->assertNull($this->instance_1->getCreditorReferenceId(1));
        $this->assertNull($this->instance_fault->getCreditorReferenceId(1));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoInviaCarrelloRPT::class, $this->instance_1->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoInviaCarrelloRPT::class, $this->instance_fault->getMethodInterface());
        $this->assertInstanceOf(FaultInterface::class, $this->instance_fault->getMethodInterface());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->instance_1->getPaEmittente(0));
        $this->assertNull($this->instance_fault->getPaEmittente(1));
        $this->assertNull($this->instance_1->getPaEmittente(0));
        $this->assertNull($this->instance_fault->getPaEmittente(1));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->instance_1->getPaEmittenti());
        $this->assertNull($this->instance_fault->getPaEmittenti());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->instance_1->getPaymentsCount());
        $this->assertNull($this->instance_fault->getPaymentsCount());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->instance_1->getBrokerPa());
        $this->assertEquals('77777777777', $this->instance_fault->getBrokerPa());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->instance_1->transaction(0));
        $this->assertNull($this->instance_fault->transaction(1));
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->instance_1->transactionDetails(0));
        $this->assertNull($this->instance_fault->transactionDetails(1));
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflow()
    {
        $workflow_1 = $this->instance_1->workflowEvent(0);
        $this->assertEquals('2024-03-13', $workflow_1->getReadyColumnValue('date_event'));
        $this->assertEquals('4', $workflow_1->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-13 09:15:00.210', $workflow_1->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('UNIQUE_RPT_1', $workflow_1->getReadyColumnValue('event_id'));
        $this->assertNull($workflow_1->getReadyColumnValue('faultcode'));


        $workflow_2 = $this->instance_fault->workflowEvent(0);
        $this->assertEquals('2024-03-13', $workflow_2->getReadyColumnValue('date_event'));
        $this->assertEquals('4', $workflow_2->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-13 09:18:00.210', $workflow_2->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('UNIQUE_RPT_1', $workflow_2->getReadyColumnValue('event_id'));
        $this->assertEquals('PPT_IBAN_NON_CENSITO', $workflow_2->getReadyColumnValue('faultcode'));

    }
}
