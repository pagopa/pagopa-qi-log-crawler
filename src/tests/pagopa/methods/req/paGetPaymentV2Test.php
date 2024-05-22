<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\paGetPaymentV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\paGetPaymentV2::class')]
class paGetPaymentV2Test extends TestCase
{

    protected paGetPaymentV2 $payment;

    protected function setUp(): void
    {
        $this->payment = new paGetPaymentV2(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwYWZuPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L3BhL3BhRm9yTm9kZS54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcGFGb3JOb2RlIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBhZm46cGFHZXRQYXltZW50VjJSZXF1ZXN0PgoJCQk8aWRQQT43Nzc3Nzc3Nzc3NzwvaWRQQT4KCQkJPGlkQnJva2VyUEE+Nzc3Nzc3Nzc3Nzc8L2lkQnJva2VyUEE+CgkJCTxpZFN0YXRpb24+Nzc3Nzc3Nzc3NzdfMDE8L2lkU3RhdGlvbj4KCQkJPHFyQ29kZT4KCQkJCTxmaXNjYWxDb2RlPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlPgoJCQkJPG5vdGljZU51bWJlcj4zMDEwMDAwMDAwMDAwMDAwMTA8L25vdGljZU51bWJlcj4KCQkJPC9xckNvZGU+CgkJCTxhbW91bnQ+MjAwLjAwPC9hbW91bnQ+CgkJCTx0cmFuc2ZlclR5cGU+UEFHT1BBPC90cmFuc2ZlclR5cGU+CgkJPC9wYWZuOnBhR2V0UGF5bWVudFYyUmVxdWVzdD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->payment->getTransferPa());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $value = ['301000000000000010'];
        $this->assertEquals($value, $this->payment->getAllNoticesNumbers());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->payment->getTransferMetaDataKey());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $value = '77777777777';
        $this->assertEquals($value, $this->payment->getPaEmittente());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->payment->getToken());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->payment->getTransferAmount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->payment->getIuvs());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->payment->getBrokerPa());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('301000000000000010', $this->payment->getNoticeNumber());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->payment->getPaymentMetaDataKey());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->payment->getPaymentMetaDataValue());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('200.00', $this->payment->getImporto());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->payment->getStazione());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->payment->getTransferMetaDataValue());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->payment->getCcps());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->payment->getIuv());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->payment->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->payment->getTransferMetaDataCount());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->payment->outcome());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->payment->getAllTokens());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->payment->getCanale());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->payment->getPaEmittenti());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->payment->getTransferIban());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->payment->isBollo());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->payment->getPsp());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->payment->getTransferId());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->payment->getBrokerPsp());
    }
    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('200.00', $this->payment->getImportoTotale());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->payment->isValidPayload());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->payment->getCcp());
    }
}
