<?php

namespace payload\resp;

use pagopa\sert\payload\resp\sendPaymentOutcome;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\sendPaymentOutcome::class')]
#[CoversClass(sendPaymentOutcome::class)]
class sendPaymentOutcomeTest extends TestCase
{

    protected sendPaymentOutcome $instance_ok;

    protected sendPaymentOutcome $instance_fault;

    protected function setUp(): void
    {
        $this->instance_ok = new sendPaymentOutcome(getPayload('sendPaymentOutcome','resp', ['outcome' => 'OK']));
        $this->instance_fault = new sendPaymentOutcome(getPayload('sendPaymentOutcome','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
    }
    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_ok->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_ok->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->instance_fault->getFaultCode());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_ok->getFaultString());
        $this->assertEquals('Token scaduto', $this->instance_fault->getFaultString());
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->instance_ok->getOutcome());
        $this->assertEquals('KO', $this->instance_fault->getOutcome());
    }
}
