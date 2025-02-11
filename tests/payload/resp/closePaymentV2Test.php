<?php

namespace payload\resp;

use pagopa\sert\payload\resp\closePaymentV2;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\closePaymentV2')]
#[CoversClass(closePaymentV2::class)]
class closePaymentV2Test extends TestCase
{

    protected closePaymentV2 $instance;

    protected closePaymentV2 $instance_fault;


    protected function setUp(): void
    {
        $data = [
            'totalAmount' => '301.00',
            'amount' => '30000',
            'fee' => '1.00',
            'outcome' => 'OK',
            'brokerpa' => '77777777777',
            'station' => '77777777777_01',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            "tokens" => [
                't0000000000000000000000000000001',
                't0000000000000000000000000000002'
            ],
            'transaction_id' => 'TR000000000000000000000000000001',
            'authorizationCode' => 'AUTH_CODE_01'
        ];
        $this->instance = new closePaymentV2(getPayloadJson('closePaymentV2', 'resp', $data));
        $this->instance_fault = new closePaymentV2(getPayloadJson('closePaymentV2', 'fault', ['faultCode' => 'PPT_TOKEN_SCADUTO', 'description' => 'Token scaduto']));
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->instance->getOutcome());
        $this->assertEquals('KO', $this->instance_fault->getOutcome());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->instance_fault->getFaultCode());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance->getFaultString());
        $this->assertEquals('Token scaduto', $this->instance_fault->getFaultString());
    }
}
