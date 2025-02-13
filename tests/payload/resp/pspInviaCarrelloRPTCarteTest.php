<?php

namespace payload\resp;

use pagopa\sert\payload\resp\pspInviaCarrelloRPTCarte;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\pspInviaCarrelloRPTCarte')]
#[CoversClass(pspInviaCarrelloRPTCarte::class)]
class pspInviaCarrelloRPTCarteTest extends TestCase
{

    protected pspInviaCarrelloRPTCarte $instance;

    protected pspInviaCarrelloRPTCarte $instance_fault;

    protected function setUp(): void
    {
        $this->instance = new pspInviaCarrelloRPTCarte(getPayload('pspInviaCarrelloRPTCarte','resp', []));
        $this->instance_fault = new pspInviaCarrelloRPTCarte(getPayload('pspInviaCarrelloRPTCarte','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());
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
}
