<?php

namespace payload\resp;

use pagopa\sert\payload\resp\paVerifyPaymentNotice;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\paVerifyPaymentNotice')]
#[CoversClass(paVerifyPaymentNotice::class)]
class paVerifyPaymentNoticeTest extends TestCase
{

    protected paVerifyPaymentNotice $instance;

    protected paVerifyPaymentNotice $instance_fault;

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
        $this->instance = new paVerifyPaymentNotice(getPayload('paVerifyPaymentNotice','resp', $data));
        $this->instance_fault = new paVerifyPaymentNotice(getPayload('paVerifyPaymentNotice','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('80.25', $this->instance->getTotalAmount());
        $this->assertNull($this->instance_fault->getTotalAmount());
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

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente());
        $this->assertNull($this->instance_fault->getPaEmittente());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());
    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('80.25', $this->instance->getAmount());
        $this->assertNull($this->instance_fault->getAmount());
    }
}
