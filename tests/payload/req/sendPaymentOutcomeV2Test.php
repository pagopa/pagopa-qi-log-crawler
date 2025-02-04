<?php

namespace payload\req;

use pagopa\sert\payload\req\sendPaymentOutcomeV2;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\sendPaymentOutcomeV2::class')]
#[CoversClass(sendPaymentOutcomeV2::class)]
class sendPaymentOutcomeV2Test extends TestCase
{

    protected sendPaymentOutcomeV2 $instance;

    protected function setUp(): void
    {
        $data = [
            'nav' => '301000000000000001',
            'pa_emittente' => '77777777777',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'tokens' => [
                't0000000000000000000000000000001',
                't0000000000000000000000000000002'
            ],
            'outcome' => 'OK'
        ];
        $this->instance = new sendPaymentOutcomeV2(getPayload('sendPaymentOutcomeV2','req', $data));
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance->getToken(1));
        $this->assertNull($this->instance->getToken(2));
    }

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertEquals('88888888888_01', $this->instance->getPspChannel());
    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertEquals('AGID_01', $this->instance->getPspId());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(2, $this->instance->getPaymentsCount());
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->instance->getOutcome());
    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertEquals('88888888888', $this->instance->getPspBroker());
    }
}
