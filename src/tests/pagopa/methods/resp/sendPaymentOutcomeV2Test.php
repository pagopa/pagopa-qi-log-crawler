<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\sendPaymentOutcomeV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\sendPaymentOutcomeV2::class')]
class sendPaymentOutcomeV2Test extends TestCase
{

    protected sendPaymentOutcomeV2 $payment;

    protected sendPaymentOutcomeV2 $fault;

    protected function setUp(): void
    {
        $this->payment = new sendPaymentOutcomeV2(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJPC9uZnA6c2VuZFBheW1lbnRPdXRjb21lVjJSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
        $this->fault = new sendPaymentOutcomeV2(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6c2VuZFBheW1lbnRPdXRjb21lVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UFBUX1RPS0VOX1NDQURVVE88L2ZhdWx0Q29kZT4KCQkJCTxmYXVsdFN0cmluZz5wYXltZW50VG9rZW4gaXMgZXhwaXJlZDwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+Tm9kb0RlaVBhZ2FtZW50aVNQQzwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+cGF5bWVudFRva2VuIGlzIGV4cGlyZWQ8L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCTwvbmZwOnNlbmRQYXltZW50T3V0Y29tZVYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->payment->getPaymentMetaDataKey());
        $this->assertNull($this->fault->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->payment->getTransferMetaDataKey());
        $this->assertNull($this->fault->getTransferMetaDataKey());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->payment->getFaultString());
        $this->assertEquals('paymentToken is expired', $this->fault->getFaultString());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->payment->getToken());
        $this->assertNull($this->fault->getToken());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->payment->getCcps());
        $this->assertNull($this->fault->getCcps());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->payment->getPsp());
        $this->assertNull($this->fault->getPsp());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->payment->getImporto());
        $this->assertNull($this->fault->getImporto());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->payment->getPaymentMetaDataValue());
        $this->assertNull($this->fault->getPaymentMetaDataValue());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->payment->getTransferMetaDataValue());
        $this->assertNull($this->fault->getTransferMetaDataValue());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->payment->getPaEmittente());
        $this->assertNull($this->fault->getPaEmittente());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->payment->getTransferIban());
        $this->assertNull($this->fault->getTransferIban());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->payment->getCcp());
        $this->assertNull($this->fault->getCcp());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->payment->getIuvs());
        $this->assertNull($this->fault->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->payment->getPaEmittenti());
        $this->assertNull($this->fault->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
        $this->assertNull($this->fault->getTransferCount());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->payment->outcome());
        $this->assertEquals('KO', $this->fault->outcome());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->payment->getTransferAmount());
        $this->assertNull($this->fault->getTransferAmount());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->payment->getCanale());
        $this->assertNull($this->fault->getCanale());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->payment->getAllTokens());
        $this->assertNull($this->fault->getAllTokens());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->payment->getTransferPa());
        $this->assertNull($this->fault->getTransferPa());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->payment->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->fault->getFaultCode());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->payment->getTransferMetaDataCount());
        $this->assertNull($this->fault->getTransferMetaDataCount());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->payment->getFaultDescription());
        $this->assertEquals('paymentToken is expired', $this->fault->getFaultDescription());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->payment->isBollo());
        $this->assertFalse($this->fault->isBollo());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->payment->getAllNoticesNumbers());
        $this->assertNull($this->fault->getAllNoticesNumbers());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->payment->getImportoTotale());
        $this->assertNull($this->fault->getImportoTotale());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->payment->getPaymentsCount());
        $this->assertNull($this->fault->getPaymentsCount());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->payment->getTransferId());
        $this->assertNull($this->fault->getTransferId());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->payment->getStazione());
        $this->assertNull($this->fault->getStazione());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->payment->getNoticeNumber());
        $this->assertNull($this->fault->getNoticeNumber());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->payment->isFaultEvent());
        $this->assertTrue($this->fault->isFaultEvent());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->payment->getBrokerPa());
        $this->assertNull($this->fault->getBrokerPa());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->payment->getPaymentMetaDataCount());
        $this->assertNull($this->fault->getPaymentMetaDataCount());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->payment->isValidPayload());
        $this->assertTrue($this->fault->isValidPayload());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->payment->getIuv());
        $this->assertNull($this->fault->getIuv());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->payment->getBrokerPsp());
        $this->assertNull($this->fault->getBrokerPsp());
    }
}
