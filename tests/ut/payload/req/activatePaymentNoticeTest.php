<?php

namespace tests\ut\payload\req;

use pagopa\sert\payload\methods\req\activatePaymentNotice;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('pagopa\sert\payload\methods\req\activatePaymentNotice::class')]
class activatePaymentNoticeTest extends TestCase
{

    protected activatePaymentNotice $instance;

    protected function setUp(): void
    {
        $data = [
            'nav' => '300000000000000001',
            'iuv' => '',
            'pa_emittente' => '77777777777',
            'broker_pa' => '',
            'broker_station' => '',
            'psp' => 'PSP_01',
            'broker_psp' => 'PSP_BROKER_01',
            'broker_channel' => '88888888888_01',
            'token' => '',
            'ccp' => '',
            'amount' => '90.45',
            'outcome' => '',
            'transfers' => array(),
            'fault' => array(),
        ];

        $payload = new activatePaymentNotice(getPayload('activatePaymentNotice', 'req', $data));
        $this->instance = $payload;
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('PSP_BROKER_01', $this->instance->getBrokerPsp());
    }

    #[TestDox('getElement()')]
    public function testGetElement()
    {
        $this->assertEquals('PLACEHOLDER', $this->instance->getElement('/password'));
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->instance->outcome());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance->getTransferMetaDataValue(0, 0, 0));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo(0));
        $this->assertFalse($this->instance->isBollo(1));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance->getTransferIban(0));
        $this->assertNull($this->instance->getTransferIban(1));
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('PSP_01', $this->instance->getPsp());

    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->instance->isValidPayload());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance->getTransferId(0));
        $this->assertNull($this->instance->getTransferId(1));
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance->getBrokerPa());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance->getIuv());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente(0));
        $this->assertNull($this->instance->getPaEmittente(1));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance->getTransferPa(0));
        $this->assertNull($this->instance->getTransferPa(1));
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->instance->getTransferMetaDataKey(0, 0));
        $this->assertNull($this->instance->getTransferMetaDataKey(1, 0));

    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance->getStazione());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance->getPaEmittenti());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance->getCcp());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->instance->getToken());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('300000000000000001', $this->instance->getNoticeNumber(0));
        $this->assertNull($this->instance->getNoticeNumber(1));

    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->instance->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance->getPaymentMetaDataCount(1));
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertEquals(['300000000000000001'], $this->instance->getAllNoticesNumbers());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance->getTransferCount(0));
        $this->assertNull($this->instance->getTransferCount(1));
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->instance->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance->getPaymentMetaDataKey(1, 0));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->instance->getAllTokens());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('90.45', $this->instance->getImporto(0));
    }

    #[TestDox('getElementCount()')]
    public function testGetElementCount()
    {
        $this->assertEquals(1, $this->instance->getElementCount('/password'));

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance->getIuvs());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('90.45', $this->instance->getImportoTotale());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance->getCanale());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance->getPaymentMetaDataValue(0,0));
        $this->assertNull($this->instance->getPaymentMetaDataValue(1,0));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance->getTransferAmount(0));
        $this->assertNull($this->instance->getTransferAmount(1));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance->getCcps());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->instance->getTransferMetaDataCount(0));
        $this->assertNull($this->instance->getTransferMetaDataCount(1));
    }
}
