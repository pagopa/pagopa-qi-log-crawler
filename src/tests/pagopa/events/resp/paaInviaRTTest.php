<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\paaInviaRT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\resp\paaInviaRT::class')]
class paaInviaRTTest extends TestCase
{

    protected paaInviaRT $ok_instance;

    protected paaInviaRT $ko_instance;

    protected function setUp(): void
    {
        $this->ok_instance = new paaInviaRT([
            'date_event' => '2023-09-01',
            'inserted_timestamp' => '2023-09-01 07:37:50',
            'tipoevento' => 'paaInviaRT',
            'sottotipoevento' => 'RESP',
            'psp' => 'AGID_01',
            'stazione' => '77777777777_01',
            'canale' => '88888888888_01',
            'sessionid' => 'sessid_01',
            'sessionidoriginal' => 'sessoriginal_01',
            'uniqueid' => 'unique_id_nodoInviaRT_OK',
            'state' => 'TO_LOAD',
            'iddominio' => '77777777777',
            'iuv' => '01000000000000010',
            'ccp' => 'c0000000000000000000000000000010',
            'noticeNumber' => '',
            'creditorreferenceid' => '01000000000000010',
            'paymenttoken' => 'c0000000000000000000000000000010',
            'payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cGFhSW52aWFSVFJpc3Bvc3RhIHhtbG5zPSIiIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFhSW52aWFSVFJpc3Bvc3RhPgoJCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJPC9wYWFJbnZpYVJUUmlzcG9zdGE+CgkJPC9uczM6cGFhSW52aWFSVFJpc3Bvc3RhPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg=='
        ]);

        $this->ko_instance = new paaInviaRT([
            'date_event' => '2023-09-01',
            'inserted_timestamp' => '2023-09-01 07:37:50',
            'tipoevento' => 'paaInviaRT',
            'sottotipoevento' => 'RESP',
            'psp' => 'AGID_01',
            'stazione' => '77777777777_01',
            'canale' => '88888888888_01',
            'sessionid' => 'sessid_01',
            'sessionidoriginal' => 'sessoriginal_01',
            'uniqueid' => 'unique_id_nodoInviaRT_OK',
            'state' => 'TO_LOAD',
            'iddominio' => '77777777777',
            'iuv' => '01000000000000010',
            'ccp' => 'c0000000000000000000000000000010',
            'noticeNumber' => '',
            'creditorreferenceid' => '01000000000000010',
            'paymenttoken' => 'c0000000000000000000000000000010',
            'payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cGFhSW52aWFSVFJpc3Bvc3RhIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cGFhSW52aWFSVFJpc3Bvc3RhPgoJCQkJPGZhdWx0PgoJCQkJCTxmYXVsdENvZGU+UEFBX1BBR0FNRU5UT19TQ0FEVVRPPC9mYXVsdENvZGU+CgkJCQkJPGZhdWx0U3RyaW5nPlBhZ2FtZW50byBpbiBhdHRlc2EgcmlzdWx0YSBzY2FkdXRvIGFsbOKAmUVudGUgQ3JlZGl0b3JlPC9mYXVsdFN0cmluZz4KCQkJCQk8aWQ+ZGFzZHM8L2lkPgoJCQkJCTxkZXNjcmlwdGlvbj5UcmFuc2F6aW9uZSBkaSBQYWdhbWVudG8gc2NhZHV0YTwvZGVzY3JpcHRpb24+CgkJCQk8L2ZhdWx0PgoJCQkJPGVzaXRvPktPPC9lc2l0bz4KCQkJPC9wYWFJbnZpYVJUUmlzcG9zdGE+CgkJPC9uczM6cGFhSW52aWFSVFJpc3Bvc3RhPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg=='
        ]);
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->ok_instance->workflowEvent();
        $this->assertEquals(20, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_nodoInviaRT_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));


        $workflow = $this->ko_instance->workflowEvent();
        $this->assertEquals(20, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_nodoInviaRT_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('PAA_PAGAMENTO_SCADUTO', $workflow->getReadyColumnValue('faultcode'));

    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('PAA_PAGAMENTO_SCADUTO', $this->ko_instance->getFaultCode());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->ok_instance->transactionDetails(0));
        $this->assertNull($this->ko_instance->transactionDetails(0));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount());
        $this->assertNull($this->ko_instance->getTransferCount());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_instance->isFaultEvent());
    }

    #[TestDox('getCacheKeyPayment()')]
    public function testGetCacheKeyPayment()
    {
        $value = base64_encode(sprintf('sessionOriginal_%s', $this->ok_instance->getSessionIdOriginal()));
        $this->assertEquals($value, $this->ok_instance->getCacheKeyPayment());

        $value = base64_encode(sprintf('sessionOriginal_%s', $this->ko_instance->getSessionIdOriginal()));
        $this->assertEquals($value, $this->ko_instance->getCacheKeyPayment());
    }

    #[TestDox('getCacheKeyAttempt()')]
    public function testGetCacheKeyAttempt()
    {
        $value = base64_encode(sprintf('sessionOriginal_%s', $this->ok_instance->getSessionIdOriginal()));
        $this->assertEquals($value, $this->ok_instance->getCacheKeyAttempt());

        $value = base64_encode(sprintf('sessionOriginal_%s', $this->ko_instance->getSessionIdOriginal()));
        $this->assertEquals($value, $this->ko_instance->getCacheKeyAttempt());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('Pagamento in attesa risulta scaduto all’Ente Creditore', $this->ko_instance->getFaultString());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->ok_instance->transaction());
        $this->assertNull($this->ko_instance->transaction());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\paaInviaRT::class, $this->ok_instance->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\paaInviaRT::class, $this->ko_instance->getMethodInterface());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->ok_instance->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->ko_instance->getPaEmittenti());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok_instance->getPaymentsCount());
        $this->assertNull($this->ko_instance->getPaymentsCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ok_instance->getCcps());
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ko_instance->getCcps());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('Transazione di Pagamento scaduta', $this->ko_instance->getFaultDescription());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->ok_instance->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->ko_instance->getIuvs());
    }
}
