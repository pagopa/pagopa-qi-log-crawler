<?php

namespace payload\resp;

use pagopa\sert\payload\resp\nodoInviaRT;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\nodoInviaRT')]
#[CoversClass(nodoInviaRT::class)]
class nodoInviaRTTest extends TestCase
{

    protected nodoInviaRT $instance;

    protected nodoInviaRT $instance_fault;

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
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '100.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777'
                ]
            ]
        ];
        $rt_payload = getPayload('RT', 'object', $data_1);
        $data_1['rt_payload'] = base64_encode($rt_payload);
        $this->instance = new nodoInviaRT(getPayload('nodoInviaRT','resp', $data_1));
        $this->instance_fault = new nodoInviaRT(getPayload('nodoInviaRT','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->instance_fault->getFaultCode());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());
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
}
