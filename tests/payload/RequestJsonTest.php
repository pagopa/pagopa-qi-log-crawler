<?php

namespace payload;

use pagopa\sert\payload\RequestJson;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\RequestJson::class')]
#[CoversClass(RequestJson::class)]
class RequestJsonTest extends TestCase
{

    protected RequestJson $instance;

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
        $this->instance = new RequestJson(getPayloadJson('closePaymentV2', 'req', $data));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(0, $this->instance->getTransferCount());
    }

    #[TestDox('getBrokerStation()')]
    public function testGetBrokerStation()
    {
        $this->assertNull($this->instance->getBrokerStation());

    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertNull($this->instance->getAmount());

    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->instance->getPaEmittente());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->instance->getToken());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance->getTransferPa());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance->getBrokerPa());
    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertNull($this->instance->getPspId());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance->getTransferAmount());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertEquals(0, $this->instance->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance->getTransferIban());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance->getPaymentMetaDataValue());
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertNull($this->instance->getOutcome());
    }

    #[TestDox('getPaymentMetaDataName()')]
    public function testGetPaymentMetaDataName()
    {
        $this->assertNull($this->instance->getPaymentMetaDataName());
    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertNull($this->instance->getTotalAmount());
    }

    #[TestDox('getTransferMetaDataName()')]
    public function testGetTransferMetaDataName()
    {
        $this->assertNull($this->instance->getTransferMetaDataName());
    }

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertNull($this->instance->getPspChannel());
    }

    #[TestDox('getNav()')]
    public function testGetNav()
    {
        $this->assertNull($this->instance->getNav());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(0, $this->instance->getTransferMetaDataCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance->getIuv());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance->getTransferId());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance->getTransferMetaDataValue());
    }

    #[TestDox('getCreditorReference()')]
    public function testGetCreditorReference()
    {
        $this->assertNull($this->instance->getCreditorReference());
    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertNull($this->instance->getPspBroker());
    }
}
