<?php

namespace payload\req;

use pagopa\sert\payload\req\sendPaymentOutcome;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\sendPaymentOutcome::class')]
#[CoversClass(sendPaymentOutcome::class)]
class sendPaymentOutcomeTest extends TestCase
{

    protected sendPaymentOutcome $instance_ok;

    protected sendPaymentOutcome $instance_ko;


    protected function setUp(): void
    {
        $data_1 = [
            'nav' => '301000000000000001',
            'pa_emittente' => '77777777777',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'amount' => '100.50',
            'token' => 't0000000000000000000000000000004',
            'outcome' => 'OK'
        ];

        $this->instance_ok = new sendPaymentOutcome(getPayload('sendPaymentOutcome','req', $data_1));

        $data_2 = [
            'nav' => '301000000000000001',
            'pa_emittente' => '77777777777',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'amount' => '100.50',
            'token' => 't0000000000000000000000000000005',
            'outcome' => 'KO'
        ];
        $this->instance_ko = new sendPaymentOutcome(getPayload('sendPaymentOutcome','req', $data_2));
    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertEquals('88888888888', $this->instance_ok->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_ko->getPspBroker());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_ok->getPaymentsCount());
        $this->assertEquals(1, $this->instance_ko->getPaymentsCount());
    }

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertEquals('88888888888_01', $this->instance_ok->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_ko->getPspChannel());
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->instance_ok->getOutcome());
        $this->assertEquals('KO', $this->instance_ko->getOutcome());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000004', $this->instance_ok->getToken());
        $this->assertEquals('t0000000000000000000000000000005', $this->instance_ko->getToken());
    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertEquals('AGID_01', $this->instance_ok->getPspId());
        $this->assertEquals('AGID_01', $this->instance_ko->getPspId());
    }
}
