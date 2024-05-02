<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\cdInfoWisp;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\cdInfoWisp::class')]
class cdInfoWispTest extends TestCase
{

    protected cdinfoWisp $cdinfoWisp;

    protected function setUp(): void
    {
        $this->cdinfoWisp = new cdinfoWisp(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6dG5zPSJodHRwOi8vUHVudG9BY2Nlc3NvQ0Quc3Bjb29wLmdvdi5pdCIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6Y2RJbmZvV2lzcD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJPGlkUGFnYW1lbnRvPjEyMjJkZGU4LTUxM2QtNGFlNC04NjI3LWE3MjVlNTE3NzRmZTwvaWRQYWdhbWVudG8+CgkJPC9wcHQ6Y2RJbmZvV2lzcD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->cdinfoWisp->getPaymentsCount());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->cdinfoWisp->getPaEmittente());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->cdinfoWisp->getImportoTotale());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->cdinfoWisp->getAllTokens());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->cdinfoWisp->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->cdinfoWisp->getTransferMetaDataValue());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->cdinfoWisp->getNoticeNumber());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->cdinfoWisp->getImporto());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->cdinfoWisp->outcome());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000010', $this->cdinfoWisp->getToken());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->cdinfoWisp->isValidPayload());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->cdinfoWisp->getPaEmittenti());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->cdinfoWisp->getCanale());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->cdinfoWisp->getBrokerPa());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->cdinfoWisp->getBrokerPsp());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->cdinfoWisp->getTransferPa());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->cdinfoWisp->getTransferMetaDataKey());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->cdinfoWisp->getPsp());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->cdinfoWisp->getTransferMetaDataCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000010', $this->cdinfoWisp->getIuv());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->cdinfoWisp->getPaymentMetaDataValue());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->cdinfoWisp->getTransferCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->cdinfoWisp->isBollo());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->cdinfoWisp->getCcps());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->cdinfoWisp->getStazione());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->cdinfoWisp->getAllNoticesNumbers());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->cdinfoWisp->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->cdinfoWisp->getTransferAmount());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000010', $this->cdinfoWisp->getCcp());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->cdinfoWisp->getTransferIban());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->cdinfoWisp->getTransferId());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->cdinfoWisp->getIuvs());
    }
}
