<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\activatePaymentNoticeV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\activatePaymentNoticeV2::class')]
class activatePaymentNoticeV2Test extends TestCase
{

    protected activatePaymentNoticeV2 $instance;

    protected function setUp(): void
    {
        $this->instance = new activatePaymentNoticeV2(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNoticeV2',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_v2',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activate_v2_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXF1ZXN0PgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBhc3N3b3JkPnh4eHh4PC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pnh4eHh4eHh4eDwvaWRlbXBvdGVuY3lLZXk+CgkJCTxxckNvZGU+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMDEwPC9ub3RpY2VOdW1iZXI+CgkJCTwvcXJDb2RlPgoJCQk8ZXhwaXJhdGlvblRpbWU+OTAwMDAwPC9leHBpcmF0aW9uVGltZT4KCQkJPGFtb3VudD4zNjAuMDA8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VWMlJlcXVlc3Q+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->instance->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance->getTransferCount());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance->getFaultDescription());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance->isFaultEvent());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $transaction = $this->instance->transaction();

        $this->assertEquals('2023-09-01 07:37:50.000', $transaction->getReadyColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000010', $transaction->getReadyColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getReadyColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000010', $transaction->getReadyColumnValue('notice_id'));
        $this->assertEquals('AGID_01', $transaction->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getReadyColumnValue('canale'));
        $this->assertEquals('360.00', $transaction->getReadyColumnValue('importo'));
        $this->assertEquals('CHECKOUT', $transaction->getReadyColumnValue('touchpoint'));

        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));
        $this->assertNull($transaction->getReadyColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('token_ccp'));

    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\activatePaymentNoticeV2::class, $this->instance->getMethodInterface());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $transaction = $this->instance->workflowEvent();

        $this->assertEquals('2023-09-01 07:37:50.000', $transaction->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('AGID_01', $transaction->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getReadyColumnValue('canale'));
        $this->assertEquals('unique_id_activate_v2_OK', $transaction->getReadyColumnValue('event_id'));
        $this->assertEquals('23', $transaction->getReadyColumnValue('fk_tipoevento'));

        $this->assertNull($transaction->getReadyColumnValue('faultcode'));
        $this->assertNull($transaction->getReadyColumnValue('outcome'));

    }


    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance->getFaultCode());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance->getFaultString());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->instance->transactionDetails(0));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->instance->getCcps());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->instance->getIuvs());
    }
}
