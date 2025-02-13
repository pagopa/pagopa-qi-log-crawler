<?php

namespace payload\resp;

use pagopa\sert\payload\resp\nodoInviaCarrelloRPT;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\nodoInviaCarrelloRPT')]
#[CoversClass(nodoInviaCarrelloRPT::class)]
class nodoInviaCarrelloRPTTest extends TestCase
{

    protected nodoInviaCarrelloRPT $instance;

    protected nodoInviaCarrelloRPT $instance_fault;

    protected function setUp(): void
    {
        $this->instance = new nodoInviaCarrelloRPT(getPayload('nodoInviaCarrelloRPT','resp', []));
        $this->instance_fault = new nodoInviaCarrelloRPT(getPayload('nodoInviaCarrelloRPT','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));
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
