<?php

namespace tests\ut\payload\resp;

use pagopa\sert\payload\methods\resp\verifyPaymentNotice;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class verifyPaymentNoticeTest extends TestCase
{

    protected array $data_payload = [
        'outcome' => 'OK',
        'pa_emittente' => '77777777777',
        'amount' => '140.00'
    ];

    protected verifyPaymentNotice $instance;

    protected function setUp(): void
    {
        $this->instance = new verifyPaymentNotice(getPayload('verifyPaymentNotice', 'resp', $this->data_payload));
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance->getBrokerPa());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->instance->getTransferMetaDataCount(0, 0));
        $this->assertNull($this->instance->getTransferMetaDataCount(1, 0));
        $this->assertNull($this->instance->getTransferMetaDataCount(0, 1));
        $this->assertNull($this->instance->getTransferMetaDataCount(1, 1));;
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance->getTransferCount(0));
        $this->assertNull($this->instance->getTransferCount(1));
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance->isFaultEvent());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance->getFaultCode());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->instance->isValidPayload());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance->getNoticeNumber(0));
        $this->assertNull($this->instance->getNoticeNumber(1));
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance->getFaultString());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance->getPaymentMetaDataValue(0,0));
        $this->assertNull($this->instance->getPaymentMetaDataValue(1,0));
        $this->assertNull($this->instance->getPaymentMetaDataValue(0,1));
        $this->assertNull($this->instance->getPaymentMetaDataValue(1,1));;
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->instance->getToken());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->instance->getAllTokens());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance->getStazione());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance->getCcp());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance->getIuv());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->instance->getTransferMetaDataKey(0, 0));
        $this->assertNull($this->instance->getTransferMetaDataKey(1, 0));
        $this->assertNull($this->instance->getTransferMetaDataKey(0, 1));
        $this->assertNull($this->instance->getTransferMetaDataKey(1, 1));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance->getTransferIban(0, 0));
        $this->assertNull($this->instance->getTransferIban(1, 0));
        $this->assertNull($this->instance->getTransferIban(0, 1));
        $this->assertNull($this->instance->getTransferIban(1, 1));
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->instance->getCanale());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance->getTransferMetaDataValue(0,0));
        $this->assertNull($this->instance->getTransferMetaDataValue(1,0));
        $this->assertNull($this->instance->getTransferMetaDataValue(0,1));
        $this->assertNull($this->instance->getTransferMetaDataValue(1,1));
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('140.00', $this->instance->getImportoTotale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->instance->getBrokerPsp());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance->getFaultDescription());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->instance->getPsp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance->getPaEmittenti());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->instance->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance->getPaymentMetaDataCount(1));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo(0, 0));
        $this->assertFalse($this->instance->isBollo(1, 0));
        $this->assertFalse($this->instance->isBollo(0, 1));
        $this->assertFalse($this->instance->isBollo(1, 1));
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->instance->outcome());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('140.00', $this->instance->getImporto(0));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente(0));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance->getCcps());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance->getTransferAmount(0, 0));
        $this->assertNull($this->instance->getTransferAmount(1, 0));
        $this->assertNull($this->instance->getTransferAmount(0, 1));
        $this->assertNull($this->instance->getTransferAmount(1, 1));
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->instance->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->instance->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance->getPaymentMetaDataKey(1, 1));
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance->getAllNoticesNumbers());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance->getTransferPa(0, 0));
        $this->assertNull($this->instance->getTransferPa(1, 0));
        $this->assertNull($this->instance->getTransferPa(0, 1));
        $this->assertNull($this->instance->getTransferPa(1, 1));
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance->getTransferId(0, 0));
        $this->assertNull($this->instance->getTransferId(1, 0));
        $this->assertNull($this->instance->getTransferId(0, 1));
        $this->assertNull($this->instance->getTransferId(1, 1));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance->getIuvs());
    }
}
