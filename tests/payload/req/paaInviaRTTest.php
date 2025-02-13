<?php

namespace payload\req;

use pagopa\sert\payload\req\paaInviaRT;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\paaInviaRT')]
#[CoversClass(paaInviaRT::class)]
class paaInviaRTTest extends TestCase
{

    protected paaInviaRT $instance;

    protected function setUp(): void
    {
        $data_1 = [
            'iuv' => '01000000000000001',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000001',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'brokerpa' => '77777777777',
            'station' => '77777777777_01',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '100.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                    'iur' => 'IUR_1'
                ]
            ]
        ];
        $rt_payload = getPayload('RT', 'object', $data_1);
        $data_1['rt_payload'] = base64_encode($rt_payload);
        $this->instance = new paaInviaRT(getPayload('paaInviaRT','req', $data_1));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->instance->getIuv());
    }

    #[TestDox('getIur()')]
    public function testGetIur()
    {
        $this->assertEquals('IUR_1', $this->instance->getIur(0));
        $this->assertNull($this->instance->getIur(1));
    }

    #[TestDox('getBrokerStation()')]
    public function testGetBrokerStation()
    {
        $this->assertEquals('77777777777_01', $this->instance->getBrokerStation());
    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('100.50', $this->instance->getAmount());
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

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {

    }
}
