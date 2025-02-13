<?php

namespace payload\resp;

use pagopa\sert\payload\resp\paaAttivaRPT;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\paaAttivaRPT')]
#[CoversClass(paaAttivaRPT::class)]
class paaAttivaRPTTest extends TestCase
{

    protected paaAttivaRPT $instance;

    protected paaAttivaRPT $instance_fault;

    protected function setUp(): void
    {
        $data_1 = [
            'iuv' => '01000000000000001',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000001',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '100.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777'
                ]
            ]
        ];
        $this->instance = new paaAttivaRPT(getPayload('paaAttivaRPT','resp', $data_1));
        $this->instance_fault = new paaAttivaRPT(getPayload('paaAttivaRPT','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('100.50', $this->instance->getTotalAmount());
        $this->assertNull($this->instance_fault->getTotalAmount());
    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('100.50', $this->instance->getAmount());
        $this->assertNull($this->instance_fault->getAmount());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->instance_fault->getFaultCode());
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->instance->getOutcome());
        $this->assertEquals('KO', $this->instance_fault->getOutcome());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance->getFaultString());
        $this->assertEquals('Token scaduto', $this->instance_fault->getFaultString());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());
    }
}
