<?php

namespace payload\req;

use pagopa\sert\payload\req\paVerifyPaymentNotice;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\paVerifyPaymentNotice')]
#[CoversClass(paVerifyPaymentNotice::class)]
class paVerifyPaymentNoticeTest extends TestCase
{

    protected paVerifyPaymentNotice $instance;

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
        $this->instance = new paVerifyPaymentNotice(getPayload('paVerifyPaymentNotice','req', $data));
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

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }
}
