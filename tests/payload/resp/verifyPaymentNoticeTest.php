<?php

namespace payload\resp;

use pagopa\sert\payload\resp\verifyPaymentNotice;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('pagopa\sert\payload\resp\verifyPaymentNotice')]
#[CoversClass(verifyPaymentNotice::class)]
class verifyPaymentNoticeTest extends TestCase
{

    protected verifyPaymentNotice $verifyPaymentNotice;

    protected verifyPaymentNotice $verifyPaymentNotice_fault;

    protected function setUp(): void
    {
        $data = [
            'nav' => '301000000000000001',
            'pa_emittente' => '77777777777',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'amount' => '90.50',
            'outcome' => 'OK'
        ];

        $this->verifyPaymentNotice = new verifyPaymentNotice(getPayload('verifyPaymentNotice','resp', $data));

        $this->verifyPaymentNotice_fault = new verifyPaymentNotice(getPayload('verifyPaymentNotice','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));


    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->verifyPaymentNotice->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->verifyPaymentNotice_fault->getFaultCode());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->verifyPaymentNotice->getFaultString());
        $this->assertEquals('Token scaduto', $this->verifyPaymentNotice_fault->getFaultString());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->verifyPaymentNotice->getPaEmittente());
        $this->assertNull($this->verifyPaymentNotice_fault->getPaEmittente());
    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('90.50', $this->verifyPaymentNotice->getTotalAmount());
        $this->assertNull($this->verifyPaymentNotice_fault->getTotalAmount());
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->verifyPaymentNotice->getOutcome());
        $this->assertEquals('KO', $this->verifyPaymentNotice_fault->getOutcome());
    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('90.50', $this->verifyPaymentNotice->getAmount());
        $this->assertNull($this->verifyPaymentNotice_fault->getAmount());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->verifyPaymentNotice->getPaymentsCount());
        $this->assertEquals(0, $this->verifyPaymentNotice_fault->getPaymentsCount());
    }
}
