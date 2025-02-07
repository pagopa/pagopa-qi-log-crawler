<?php

namespace payload\resp;

use pagopa\sert\payload\resp\pspNotifyPaymentV2;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\pspNotifyPaymentV2')]
#[CoversClass(pspNotifyPaymentV2::class)]
class pspNotifyPaymentV2Test extends TestCase
{

    protected pspNotifyPaymentV2 $instance;

    protected pspNotifyPaymentV2 $instance_fault;

    protected pspNotifyPaymentV2 $instance_inValid;

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
        $this->instance = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','resp', $data_1));
        $this->instance_fault = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
        $this->instance_inValid = new pspNotifyPaymentV2('mtls failed');
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

    #[TestDox('isValid()')]
    public function testIsValid()
    {
        $this->assertTrue($this->instance->isValid());
        $this->assertTrue($this->instance_fault->isValid());
        $this->assertFalse($this->instance_inValid->isValid());
    }
}
