<?php

namespace payload\resp;

use pagopa\sert\payload\resp\sendPaymentOutcomeV2;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\sendPaymentOutcomeV2')]
#[CoversClass(sendPaymentOutcomeV2::class)]
class sendPaymentOutcomeV2Test extends TestCase
{

    protected sendPaymentOutcomeV2 $instance;

    protected sendPaymentOutcomeV2 $instance_fault;

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
        $this->instance = new sendPaymentOutcomeV2(getPayload('sendPaymentOutcomeV2','resp', $data));
        $this->instance_fault = new sendPaymentOutcomeV2(getPayload('sendPaymentOutcomeV2','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
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
