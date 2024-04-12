<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\nodoInviaRPT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\nodoInviaRPT::class')]
class nodoInviaRPTTest extends TestCase
{

    protected nodoInviaRPT $one_instance;

    protected nodoInviaRPT $no_data_event;


    protected function setUp(): void
    {
        //PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPHJlZGlyZWN0PjE8L3JlZGlyZWN0PgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhUlBUUmlzcG9zdGE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg==

        //PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfU0lOVEFTU0lfWFNEPC9mYXVsdENvZGU+CgkJCQk8ZmF1bHRTdHJpbmc+RXJyb3JlIGRpIHNpbnRhc3NpIFhTRC48L2ZhdWx0U3RyaW5nPgoJCQkJPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgoJCQkJPGRlc2NyaXB0aW9uPkVycm9yZSB2YWxpZGF6aW9uZSBYTUwgW1JQVC9kYXRpVmVyc2FtZW50by9pbXBvcnRvVG90YWxlRGFWZXJzYXJlXSAtIGN2Yy1taW5JbmNsdXNpdmUtdmFsaWQ6IGlsIHZhbG9yZSAmcXVvdDswLjAwJnF1b3Q7IG5vbiDDqCB2YWxpZG8gY29tZSBmYWNldCByaXNwZXR0byBhIG1pbkV4Y2x1c2l2ZSAmcXVvdDswLjAxJnF1b3Q7IHBlciBpbCB0aXBvICdzdEltcG9ydG9EaXZlcnNvRGFaZXJvJy48L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCQk8ZXNpdG8+S088L2VzaXRvPgoJCTwvcHB0Om5vZG9JbnZpYVJQVFJpc3Bvc3RhPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4=

        $this->one_instance = new nodoInviaRPT([
            "inserted_timestamp" =>  "2024-03-13 09:10:00.210",
            "tipoevento" =>  "nodoInviaRPT",
            "sottotipoevento" =>  "RESP",
            "iddominio" =>  "77777777777",
            "iuv" =>  "01000000000000001",
            "ccp" =>  "0d70d69d3275491b94fd3ab8fae67337",
            "noticenumber" =>  "",
            "creditorreferenceid" =>  "01000000000000001",
            "paymenttoken" =>  "0d70d69d3275491b94fd3ab8fae67337",
            "psp" =>  "AGID_01",
            "stazione" =>  "77777777777_01",
            "canale" =>  "88888888888_01",
            "sessionid" =>  "SESSID_01",
            "sessionidoriginal" =>  "SESSORIGIN_01",
            "uniqueid" =>  "UNIQUE_RPT_1",
            "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPHJlZGlyZWN0PjE8L3JlZGlyZWN0PgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhUlBUUmlzcG9zdGE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=="
        ]);

        $this->no_data_event = new nodoInviaRPT([
            "inserted_timestamp" =>  "2024-03-13 09:10:00.210",
            "tipoevento" =>  "nodoInviaRPT",
            "sottotipoevento" =>  "RESP",
            "iddominio" =>  "",
            "iuv" =>  "",
            "ccp" =>  "",
            "noticeNumber" =>  "",
            "creditorreferenceid" =>  "",
            "paymenttoken" =>  "",
            "psp" =>  "",
            "stazione" =>  "",
            "canale" =>  "",
            "sessionid" =>  "SESSID_01",
            "sessionidoriginal" =>  "SESSORIGIN_01",
            "uniqueid" =>  "UNIQUE_RPT_1",
            "payload" => "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFSUFRSaXNwb3N0YT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfU0lOVEFTU0lfWFNEPC9mYXVsdENvZGU+CgkJCQk8ZmF1bHRTdHJpbmc+RXJyb3JlIGRpIHNpbnRhc3NpIFhTRC48L2ZhdWx0U3RyaW5nPgoJCQkJPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgoJCQkJPGRlc2NyaXB0aW9uPkVycm9yZSB2YWxpZGF6aW9uZSBYTUwgW1JQVC9kYXRpVmVyc2FtZW50by9pbXBvcnRvVG90YWxlRGFWZXJzYXJlXSAtIGN2Yy1taW5JbmNsdXNpdmUtdmFsaWQ6IGlsIHZhbG9yZSAmcXVvdDswLjAwJnF1b3Q7IG5vbiDDqCB2YWxpZG8gY29tZSBmYWNldCByaXNwZXR0byBhIG1pbkV4Y2x1c2l2ZSAmcXVvdDswLjAxJnF1b3Q7IHBlciBpbCB0aXBvICdzdEltcG9ydG9EaXZlcnNvRGFaZXJvJy48L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCQk8ZXNpdG8+S088L2VzaXRvPgoJCTwvcHB0Om5vZG9JbnZpYVJQVFJpc3Bvc3RhPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4="
        ]);
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->one_instance->getFaultCode());
        $this->assertEquals('PPT_SINTASSI_XSD', $this->no_data_event->getFaultCode());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoInviaRPT::class, $this->one_instance->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoInviaRPT::class, $this->no_data_event->getMethodInterface());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->one_instance->getBrokerPa());
        $this->assertNull($this->no_data_event->getBrokerPa());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->one_instance->getPaEmittente());
        $this->assertNull($this->no_data_event->getPaEmittente());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->one_instance->transaction());
        $this->assertNull($this->no_data_event->transaction());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->one_instance->getNoticeNumber());
        $this->assertNull($this->no_data_event->getNoticeNumber());
    }

    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertEquals('0d70d69d3275491b94fd3ab8fae67337', $this->one_instance->getPaymentToken());
        $this->assertNull($this->no_data_event->getPaymentToken());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->one_instance->getBrokerPsp());
        $this->assertNull($this->no_data_event->getBrokerPsp());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->one_instance->getFaultDescription());
        $this->assertStringContainsString('Errore validazione XML', $this->no_data_event->getFaultDescription());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $transaction = $this->one_instance->workflowEvent();
        $this->assertEquals('2024-03-13', $transaction->getReadyColumnValue('date_event'));
        $this->assertEquals('2024-03-13 09:10:00.210', $transaction->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('AGID_01', $transaction->getReadyColumnValue('id_psp'));
        $this->assertEquals('UNIQUE_RPT_1', $transaction->getReadyColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getReadyColumnValue('canale'));
        $this->assertNull($transaction->getReadyColumnValue('faultcode'));

        $transaction = $this->no_data_event->workflowEvent();
        $this->assertEquals('2024-03-13', $transaction->getReadyColumnValue('date_event'));
        $this->assertEquals('2024-03-13 09:10:00.210', $transaction->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('UNIQUE_RPT_1', $transaction->getReadyColumnValue('event_id'));
        $this->assertNull($transaction->getReadyColumnValue('id_psp'));
        $this->assertNull($transaction->getReadyColumnValue('stazione'));
        $this->assertNull($transaction->getReadyColumnValue('canale'));
        $this->assertEquals('PPT_SINTASSI_XSD', $transaction->getReadyColumnValue('faultcode'));

    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->one_instance->getPaymentsCount());
        $this->assertNull($this->no_data_event->getPaymentsCount());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->one_instance->getTransferCount());
        $this->assertNull($this->no_data_event->getTransferCount());
    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertEquals('01000000000000001', $this->one_instance->getCreditorReferenceId());
        $this->assertNull($this->no_data_event->getCreditorReferenceId());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->one_instance->getFaultString());
        $this->assertEquals('Errore di sintassi XSD.', $this->no_data_event->getFaultString());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->one_instance->getCanale());
        $this->assertNull($this->no_data_event->getCanale());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->one_instance->getStazione());
        $this->assertNull($this->no_data_event->getStazione());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('0d70d69d3275491b94fd3ab8fae67337', $this->one_instance->getCcp());
        $this->assertNull($this->no_data_event->getCcp());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->one_instance->getPsp());
        $this->assertNull($this->no_data_event->getPsp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->one_instance->getPaEmittenti());
        $this->assertNull($this->no_data_event->getPaEmittenti());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->one_instance->isFaultEvent());
        $this->assertTrue($this->no_data_event->isFaultEvent());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000001'], $this->one_instance->getIuvs());
        $this->assertNull($this->no_data_event->getIuvs());

    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->one_instance->transactionDetails(0));
        $this->assertNull($this->no_data_event->transactionDetails(0));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->one_instance->getIuv());
        $this->assertNull($this->no_data_event->getIuv());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['0d70d69d3275491b94fd3ab8fae67337'], $this->one_instance->getCcps());
        $this->assertNull($this->no_data_event->getCcps());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->one_instance->getMethodInterface()->outcome());
        $this->assertEquals('KO', $this->no_data_event->getMethodInterface()->outcome());
    }
}
