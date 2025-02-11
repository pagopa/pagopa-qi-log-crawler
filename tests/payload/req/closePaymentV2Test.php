<?php

namespace payload\req;

use pagopa\sert\payload\req\closePaymentV2;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\closePaymentV2')]
#[CoversClass(closePaymentV2::class)]
class closePaymentV2Test extends TestCase
{

    protected closePaymentV2 $payment;

    protected function setUp(): void
    {
        $data = [
            'totalAmount' => '301.00',
            'amount' => '30000',
            'fee' => '1.00',
            'outcome' => 'OK',
            'brokerpa' => '77777777777',
            'station' => '77777777777_01',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            "tokens" => [
                't0000000000000000000000000000001',
                't0000000000000000000000000000002'
            ],
            'transaction_id' => 'TR000000000000000000000000000001',
            'authorizationCode' => 'AUTH_CODE_01'
        ];

        $this->payment = new closePaymentV2(getPayloadJson('closePaymentV2', 'req', $data));
    }

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertEquals('88888888888_01', $this->payment->getPspChannel());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(2, $this->payment->getPaymentsCount());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->payment->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->payment->getToken(1));
        $this->assertNull($this->payment->getToken(2));
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->payment->getOutcome());
    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertNull($this->payment->getTotalAmount());
    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertEquals('AGID_01', $this->payment->getPspId());
    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertEquals('88888888888', $this->payment->getPspBroker());
    }
}
