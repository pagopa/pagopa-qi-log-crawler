<?php

namespace tests\ut\events\req;

use pagopa\sert\events\req\activatePaymentNotice;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\events\req\activatePaymentNotice::class')]
class activatePaymentNoticeTest extends TestCase
{

    protected activatePaymentNotice $instance;

    protected function setUp(): void
    {
        $data = [
            'nav' => '300000000000000001',
            'iuv' => '00000000000000001',
            'creditor_reference_id' => '00000000000000001',
            'pa_emittente' => '77777777777',
            'broker_pa' => '77777777777',
            'broker_station' => '77777777777_01',
            'psp' => 'PSP_01',
            'broker_psp' => 'PSP_BROKER_01',
            'broker_channel' => '88888888888_01',
            'token' => 't0000000000000000000000000000001',
            'ccp' => 't0000000000000000000000000000001',
            'amount' => '90.45',
            'outcome' => '',
            'transfers' => array(),
            'fault' => array(),
            'date_event' => '2024-09-01 14:00:00.000',
            'session_id' => 'sess_id_event',
            'session_id_original' => 'sess_id_original',
            'unique_id' => 'UNIQUE_ID_1',
        ];
        $this->instance = new activatePaymentNotice(getEvents('activatePaymentNotice', 'req', $data));

    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance->getToken());

    }

    #[TestDox('getPaymentCount()')]
    public function testGetPaymentCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentCount());
    }

    #[TestDox('getSessionIdOriginal()')]
    public function testGetSessionIdOriginal()
    {
        $this->assertEquals('sess_id_original', $this->instance->getSessionIdOriginal());
    }

    #[TestDox('getTokens()')]
    public function testGetTokens()
    {
        $this->assertEquals(['t0000000000000000000000000000001'], $this->instance->getTokens());
    }

    #[TestDox('isValidEvent()')]
    public function testIsValidEvent()
    {
        $this->assertTrue($this->instance->isValidEvent());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente());
    }

    #[TestDox('getCreditReferenceId()')]
    public function testGetCreditReferenceId()
    {
        $this->assertEquals('00000000000000001', $this->instance->getCreditReferenceId());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance->getPaEmittenti());
    }

    #[TestDox('getDateEvent()')]
    public function testGetDateEvent()
    {
        $this->assertEquals('2024-09-01', $this->instance->getDateEvent());
    }

    #[TestDox('getAllNoticeNumber()')]
    public function testGetAllNoticeNumber()
    {
        $this->assertEquals(['300000000000000001'], $this->instance->getAllNoticeNumber());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance->getCcp());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance->getCanale());
    }

    #[TestDox('getUniqueId()')]
    public function testGetUniqueId()
    {
        $this->assertEquals('UNIQUE_ID_1', $this->instance->getUniqueId());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('PSP_01', $this->instance->getPsp());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('00000000000000001', $this->instance->getIuv());
    }

    #[TestDox('getSessionId()')]
    public function testGetSessionId()
    {
        $this->assertEquals('sess_id_event', $this->instance->getSessionId());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->instance->getStazione());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['00000000000000001'], $this->instance->getIuvs());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('300000000000000001', $this->instance->getNoticeNumber());
    }

    #[TestDox('isBornEvent()')]
    public function testIsBornEvent()
    {
        $this->assertTrue($this->instance->isBornEvent());
    }

    #[TestDox('getInsertedTimestamp()')]
    public function testGetInsertedTimestamp()
    {
        $this->assertEquals('2024-09-01 14:00:00.000000', $this->instance->getInsertedTimestamp()->format('Y-m-d H:i:s.u'));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000001'], $this->instance->getCcps());
    }

    #[TestDox('getPayload()')]
    public function testGetPayload()
    {
        $this->assertInstanceOf(\pagopa\sert\payload\methods\req\activatePaymentNotice::class, $this->instance->getPayload());
    }
}
