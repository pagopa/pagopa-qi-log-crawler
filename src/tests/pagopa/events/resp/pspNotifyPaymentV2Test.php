<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\pspNotifyPaymentV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\pspNotifyPaymentV2::class')]
class pspNotifyPaymentV2Test extends TestCase
{

    protected pspNotifyPaymentV2 $ok_instance;


    protected pspNotifyPaymentV2 $ko_instance;

    protected function setUp(): void
    {
        $this->ok_instance = new pspNotifyPaymentV2([
            'date_event' => '2024-03-10',
            'inserted_timestamp' => '2024-03-10 10:27:00.197',
            'tipoevento' => 'pspNotifyPaymentV2',
            'sottotipoevento' => 'RESP',
            'iddominio' => '77777777777',
            'iuv' => '01000000000000001',
            'ccp' => 't0000000000000000000000000000001',
            'noticenumber' => '301000000000000001',
            'creditorreferenceid' => '01000000000000001',
            'paymenttoken' => 't0000000000000000000000000000001',
            'psp' => 'PSP_V2',
            'stazione' => '77777777777_01',
            'canale' => '88888888888_01',
            'sessionid' => 'sessid_100176',
            'sessionidoriginal' => 'sessidoriginal_closepayment_v2',
            'uniqueid' => 'T000178',
            'payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cHNwTm90aWZ5UGF5bWVudFYyUmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQk8L25zMzpwc3BOb3RpZnlQYXltZW50VjJSZXM+Cgk8L1NPQVAtRU5WOkJvZHk+CjwvU09BUC1FTlY6RW52ZWxvcGU+'
        ]);

        $this->ko_instance = new pspNotifyPaymentV2([
            'date_event' => '2024-03-10',
            'inserted_timestamp' => '2024-03-10 10:27:00.197',
            'tipoevento' => 'pspNotifyPaymentV2',
            'sottotipoevento' => 'RESP',
            'iddominio' => '77777777777',
            'iuv' => '01000000000000001',
            'ccp' => 't0000000000000000000000000000001',
            'noticenumber' => '301000000000000001',
            'creditorreferenceid' => '01000000000000001',
            'paymenttoken' => 't0000000000000000000000000000001',
            'psp' => 'PSP_V2',
            'stazione' => '77777777777_01',
            'canale' => '88888888888_01',
            'sessionid' => 'sessid_100176',
            'sessionidoriginal' => 'sessidoriginal_closepayment_v2',
            'uniqueid' => 'T000178',
            'payload' => 'PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+Cgk8U09BUC1FTlY6SGVhZGVyLz4KCTxTT0FQLUVOVjpCb2R5PgoJCTxuczM6cHNwTm90aWZ5UGF5bWVudFYyUmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QU1BfRVJST1JFX0VNRVNTTzwvZmF1bHRDb2RlPgoJCQkJPGZhdWx0U3RyaW5nPkVycm9yZSBlbWVzc28gZGFsIFBTUDwvZmF1bHRTdHJpbmc+CgkJCQk8ZGVzY3JpcHRpb24+RXJyb3JlIGVtZXNzbyBkYWwgUHJlc3RhdG9yZSBkaSBTZXJ2aXppIGRpIFBhZ2FtZW50bzwvZGVzY3JpcHRpb24+CgkJCTwvZmF1bHQ+CgkJPC9uczM6cHNwTm90aWZ5UGF5bWVudFYyUmVzPgoJPC9TT0FQLUVOVjpCb2R5Pgo8L1NPQVAtRU5WOkVudmVsb3BlPg=='
        ]);
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->ok_instance->workflowEvent(0);

        $this->assertEquals('26', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PSP_V2', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));


        $workflow = $this->ko_instance->workflowEvent(0);

        $this->assertEquals('26', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PSP_V2', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('PSP_ERRORE_EMESSO', $workflow->getReadyColumnValue('faultcode'));

    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('Errore emesso dal Prestatore di Servizi di Pagamento', $this->ko_instance->getFaultDescription());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->ok_instance->transaction(0));
        $this->assertNull($this->ko_instance->transaction(0));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->ok_instance->getIuvs());
        $this->assertNull($this->ko_instance->getIuvs());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('PSP_ERRORE_EMESSO', $this->ko_instance->getFaultCode());
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

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\pspNotifyPaymentV2::class, $this->ok_instance->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\pspNotifyPaymentV2::class, $this->ko_instance->getMethodInterface());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->ok_instance->getPaEmittenti());
        $this->assertNull($this->ko_instance->getPaEmittenti());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->ok_instance->getCcps());
        $this->assertNull($this->ko_instance->getCcps());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok_instance->getPaymentsCount());
        $this->assertNull($this->ko_instance->getPaymentsCount());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_instance->isFaultEvent());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('Errore emesso dal PSP', $this->ko_instance->getFaultString());
    }
}
