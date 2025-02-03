<?php

namespace payload\req;

use pagopa\sert\payload\req\paGetPayment;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\paGetPayment')]
#[CoversClass(paGetPayment::class)]
class paGetPaymentTest extends TestCase
{

    protected paGetPayment $instance;

    protected function setUp(): void
    {
        $data = [
            'nav' => '301000000000000001',
            'pa_emittente' => '77777777777',
            'psp' => 'AGID_01',
            'station' => '77777777777_01',
            'brokerpa' => '77777777777',
            'amount' => '80.25'
        ];
        $this->instance = new paGetPayment(getPayload('paGetPayment','req', $data));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());

    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('80.25', $this->instance->getTotalAmount());
    }

    #[TestDox('getBrokerStation()')]
    public function testGetBrokerStation()
    {
        $this->assertEquals('77777777777_01', $this->instance->getBrokerStation());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->instance->getBrokerPa());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente());
    }

    #[TestDox('getNav()')]
    public function testGetNav()
    {
        $this->assertEquals('301000000000000001', $this->instance->getNav());
    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('80.25', $this->instance->getAmount());
    }
}
