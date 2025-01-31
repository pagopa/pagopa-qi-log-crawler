<?php

namespace payload;

use pagopa\sert\payload\ResponseXML;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\ResponseXML')]
#[CoversClass(ResponseXML::class)]
class ResponseXMLTest extends TestCase
{

    protected ResponseXML $instance_1_transfer;
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

        $this->instance_1_transfer = new ResponseXML(getPayload('activatePaymentNotice','resp', $data_1));
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_1_transfer->getFaultCode());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_1_transfer->getFaultString());
    }
}
