<?php

namespace payload\resp;

use pagopa\sert\payload\resp\pspNotifyPayment;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\pspNotifyPayment')]
#[CoversClass(pspNotifyPayment::class)]
class pspNotifyPaymentTest extends TestCase
{

    protected pspNotifyPayment $instance;

    protected pspNotifyPayment $instance_fault;

    protected function setUp(): void
    {
        $data_1 = [
            'iuv' => '01000000000000003',
            'pa_emittente' => '77777777777',
            'amount' => '50.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000003',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777'
                ],
            ],
        ];
        $this->instance = new pspNotifyPayment(getPayload('pspNotifyPayment','resp', $data_1));
        $this->instance_fault = new pspNotifyPayment(getPayload('pspNotifyPayment','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance->getFaultString());
        $this->assertEquals('Token scaduto', $this->instance_fault->getFaultString());
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

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());
    }
}
