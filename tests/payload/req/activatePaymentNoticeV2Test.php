<?php

namespace payload\req;

use pagopa\sert\payload\req\activatePaymentNoticeV2;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\activatePaymentNoticeV2')]
#[CoversClass(activatePaymentNoticeV2::class)]
class activatePaymentNoticeV2Test extends TestCase
{

    protected activatePaymentNoticeV2 $instance;

    protected function setUp(): void
    {
        $data = [
            'nav' => '301000000000000001',
            'pa_emittente' => '77777777777',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'amount' => '100.50'
        ];
        $this->instance = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','req', $data));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }

    #[TestDox('getNav()')]
    public function testGetNav()
    {
        $this->assertEquals('301000000000000001', $this->instance->getNav());
    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('100.50', $this->instance->getAmount());
    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertEquals('88888888888', $this->instance->getPspBroker());
    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertEquals('AGID_01', $this->instance->getPspId());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente());
    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('100.50', $this->instance->getTotalAmount());
    }

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertEquals('88888888888_01', $this->instance->getPspChannel());
    }
}
