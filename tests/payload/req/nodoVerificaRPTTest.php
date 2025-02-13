<?php

namespace payload\req;

use pagopa\sert\payload\req\nodoVerificaRPT;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\nodoVerificaRPT')]
#[CoversClass(nodoVerificaRPT::class)]
class nodoVerificaRPTTest extends TestCase
{

    protected nodoVerificaRPT $instance;


    protected function setUp(): void
    {
        $data = [
            'nav' => '301000000000000001',
            'iuv' => '01000000000000001',
            'pa_emittente' => '77777777777',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'amount' => '100.50',
            'token' => 't0000000000000000000000000000001'
        ];
        $this->instance = new nodoVerificaRPT(getPayload('nodoVerificaRPT','req', $data));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->instance->getIuv());
    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertEquals('AGID_01', $this->instance->getPspId());
    }

    #[TestDox('getCreditorReference()')]
    public function testGetCreditorReference()
    {
        $this->assertEquals('01000000000000001', $this->instance->getCreditorReference());
    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertEquals('88888888888', $this->instance->getPspBroker());
    }

    #[TestDox('getNav()')]
    public function testGetNav()
    {
        $this->assertEquals('301000000000000001', $this->instance->getNav());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente());
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

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertEquals('88888888888_01', $this->instance->getPspChannel());
    }
}
