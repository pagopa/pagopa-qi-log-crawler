<?php

namespace tests\ut\payload\req;

use pagopa\sert\payload\methods\req\verifyPaymentNotice;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\methods\req\verifyPaymentNotice::class')]
class verifyPaymentNoticeTest extends TestCase
{

    protected array $data_payload = [
        'nav' => '300000000000000002',
        'pa_emittente' => '77777777777',
        'psp' => 'PSP_01',
        'broker_psp' => 'PSP_BROKER_01',
        'broker_channel' => '88888888888_01'
    ];

    protected verifyPaymentNotice $instance;

    protected function setUp(): void
    {
        $this->instance = new verifyPaymentNotice(getPayload('verifyPaymentNotice', 'req', $this->data_payload));
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

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->instance->isValidPayload());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('300000000000000002', $this->instance->getNoticeNumber(0));
        $this->assertNull($this->instance->getNoticeNumber(1));

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

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->instance->getImporto(0));
        $this->assertNull($this->instance->getImporto(1));
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->instance->getImportoTotale());
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
        $this->assertEquals('88888888888_01', $this->instance->getCanale());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance->getTransferMetaDataValue(0,0));
        $this->assertNull($this->instance->getTransferMetaDataValue(1,0));
        $this->assertNull($this->instance->getTransferMetaDataValue(0,1));
        $this->assertNull($this->instance->getTransferMetaDataValue(1,1));
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('PSP_BROKER_01', $this->instance->getBrokerPsp());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('PSP_01', $this->instance->getPsp());
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
        $this->assertNull($this->instance->outcome());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente(0));
        $this->assertNull($this->instance->getPaEmittente(1));
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
        $this->assertEquals(['300000000000000002'], $this->instance->getAllNoticesNumbers());
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
