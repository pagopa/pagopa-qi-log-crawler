<?php

namespace payload\req;

use pagopa\sert\payload\req\paaVerificaRPT;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\paaVerificaRPT')]
#[CoversClass(paaVerificaRPT::class)]
class paaVerificaRPTTest extends TestCase
{

    protected paaVerificaRPT $instance;

    protected function setUp(): void
    {
        $data = [
            'nav' => '301000000000000001',
            'iuv' => '01000000000000001',
            'pa_emittente' => '77777777777',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'station' => '77777777777_01',
            'brokerpa' => '77777777777',
            'amount' => '100.50',
            'token' => 't0000000000000000000000000000001'
        ];
        $this->instance = new paaVerificaRPT(getPayload('paaVerificaRPT','req', $data));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->instance->getIuv());
    }

    #[TestDox('getBrokerStation()')]
    public function testGetBrokerStation()
    {
        $this->assertEquals('77777777777_01', $this->instance->getBrokerStation());
    }

    #[TestDox('getCreditorReference()')]
    public function testGetCreditorReference()
    {
        $this->assertEquals('01000000000000001', $this->instance->getCreditorReference());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->instance->getBrokerPa());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance->getToken());
    }
}
