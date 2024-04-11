<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\pspInviaCarrelloRPTCarte;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\pspInviaCarrelloRPTCarteTest::class')]
class pspInviaCarrelloRPTCarteTest extends TestCase
{

    protected pspInviaCarrelloRPTCarte $instance_OK_RPT;

    protected pspInviaCarrelloRPTCarte $instance_KO_RPT;


    protected function setUp(): void
    {
        $this->instance_OK_RPT = new pspInviaCarrelloRPTCarte(base64_decode('PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlIHhtbG5zOm5zMj0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cHNwSW52aWFDYXJyZWxsb1JQVENhcnRlUmVzcG9uc2UgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSIgeHNpOnR5cGU9Im5zMjplc2l0b1BzcEludmlhQ2FycmVsbG9SUFQiPgoJCQkJPGVzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPk9LPC9lc2l0b0NvbXBsZXNzaXZvT3BlcmF6aW9uZT4KCQkJCTxpZGVudGlmaWNhdGl2b0NhcnJlbGxvPnh4eHh4eHh4eHh4eHg8L2lkZW50aWZpY2F0aXZvQ2FycmVsbG8+CgkJCQk8cGFyYW1ldHJpUGFnYW1lbnRvSW1tZWRpYXRvPmlkQnJ1Y2lhdHVyYT14eHcyMjwvcGFyYW1ldHJpUGFnYW1lbnRvSW1tZWRpYXRvPgoJCQk8L3BzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
        $this->instance_KO_RPT = new pspInviaCarrelloRPTCarte(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMzOnBzcEludmlhQ2FycmVsbG9SUFRDYXJ0ZVJlc3BvbnNlIHhtbG5zOm5zMj0iaHR0cDovL3d3dy5jbmlwYS5nb3YuaXQvc2NoZW1hcy8yMDEwL1BhZ2FtZW50aS9BY2tfMV8wLyIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGVSZXNwb25zZT4KCQkJCTxlc2l0b0NvbXBsZXNzaXZvT3BlcmF6aW9uZT5LTzwvZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+CgkJCQk8bGlzdGFFcnJvcmlSUFQ+CgkJCQkJPGZhdWx0PgoJCQkJCQk8ZmF1bHRDb2RlPlBQVF9SUFRfRFVQTElDQVRBPC9mYXVsdENvZGU+CgkJCQkJCTxmYXVsdFN0cmluZz5FcnJvcmUgZGkgc2ludGFzc2kgWFNEPC9mYXVsdFN0cmluZz4KCQkJCQkJPGlkPkFHSURfMDE8L2lkPgoJCQkJCQk8c2VyaWFsPjE8L3NlcmlhbD4KCQkJCQk8L2ZhdWx0PgoJCQkJPC9saXN0YUVycm9yaVJQVD4KCQkJPC9wc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGVSZXNwb25zZT4KCQk8L25zMzpwc3BJbnZpYUNhcnJlbGxvUlBUQ2FydGVSZXNwb25zZT4KCTwvc29hcDpCb2R5Pgo8L3NvYXA6RW52ZWxvcGU+'));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance_OK_RPT->getTransferAmount(0, 0));
        $this->assertNull($this->instance_KO_RPT->getTransferAmount(0, 0));
    }
    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance_OK_RPT->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_OK_RPT->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_OK_RPT->getTransferMetaDataValue(0, 0, 2));

        $this->assertNull($this->instance_KO_RPT->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_KO_RPT->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_KO_RPT->getTransferMetaDataValue(0, 0, 2));
    }
    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance_OK_RPT->getFaultDescription());
        $this->assertNull($this->instance_KO_RPT->getFaultDescription());
    }
    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->instance_OK_RPT->getPaymentsCount());
        $this->assertNull($this->instance_KO_RPT->getPaymentsCount());
    }
    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance_OK_RPT->getCcps());
        $this->assertNull($this->instance_KO_RPT->getCcps());
    }
    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance_OK_RPT->isFaultEvent());
        $this->assertTrue($this->instance_KO_RPT->isFaultEvent());
    }
    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->instance_OK_RPT->getPaEmittenti());
        $this->assertNull($this->instance_KO_RPT->getPaEmittenti());
    }
    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_OK_RPT->getNoticeNumber());
        $this->assertNull($this->instance_KO_RPT->getNoticeNumber());
    }
    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance_OK_RPT->getTransferId(0, 0));
        $this->assertNull($this->instance_OK_RPT->getTransferId(1, 0));

        $this->assertNull($this->instance_KO_RPT->getTransferId(0, 0));
        $this->assertNull($this->instance_KO_RPT->getTransferId(1, 0));
    }
    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->instance_OK_RPT->getPsp());
        $this->assertNull($this->instance_KO_RPT->getPsp());
    }
    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance_OK_RPT->getTransferIban(0, 0));
        $this->assertNull($this->instance_OK_RPT->getTransferIban(1, 0));

        $this->assertNull($this->instance_KO_RPT->getTransferIban(0, 0));
        $this->assertNull($this->instance_KO_RPT->getTransferIban(1, 0));
    }
    #[TestDox('getTransferAmount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->instance_OK_RPT->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_KO_RPT->getPaymentMetaDataCount(0));
    }
    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance_OK_RPT->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_KO_RPT->getPaymentMetaDataValue(0, 0));
    }
    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance_OK_RPT->getTransferPa(0, 0));
        $this->assertNull($this->instance_KO_RPT->getTransferPa(0, 0));
    }
    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance_OK_RPT->getStazione());
        $this->assertNull($this->instance_KO_RPT->getStazione());
    }
    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_OK_RPT->getFaultCode(0, 0));
        $this->assertEquals('PPT_RPT_DUPLICATA', $this->instance_KO_RPT->getFaultCode());
    }
    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->instance_OK_RPT->getBrokerPsp());
        $this->assertNull($this->instance_KO_RPT->getBrokerPsp());
    }
    #[TestDox('getTransferAmount()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->instance_OK_RPT->outcome());
        $this->assertEquals('KO', $this->instance_KO_RPT->outcome());
    }
    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->instance_OK_RPT->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->instance_KO_RPT->getTransferMetaDataKey(0, 0, 0));
    }
    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->instance_OK_RPT->getImporto());
        $this->assertNull($this->instance_KO_RPT->getImporto());
    }
    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance_OK_RPT->getTransferCount());
        $this->assertNull($this->instance_KO_RPT->getTransferCount());
    }
    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance_OK_RPT->getAllNoticesNumbers());
        $this->assertNull($this->instance_KO_RPT->getAllNoticesNumbers());
    }
    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->instance_OK_RPT->getToken(0));
        $this->assertNull($this->instance_KO_RPT->getToken(0));
    }
    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance_OK_RPT->getIuv(0));
        $this->assertNull($this->instance_KO_RPT->getIuv(0));
    }
    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance_OK_RPT->getBrokerPa());
        $this->assertNull($this->instance_KO_RPT->getBrokerPa());
    }
    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->instance_OK_RPT->getTransferMetaDataCount());
        $this->assertNull($this->instance_KO_RPT->getTransferMetaDataCount());
    }
    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance_OK_RPT->getIuvs());
        $this->assertNull($this->instance_KO_RPT->getIuvs());
    }
    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->instance_OK_RPT->getCanale());
        $this->assertNull($this->instance_KO_RPT->getCanale());
    }
    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->instance_OK_RPT->getImportoTotale());
        $this->assertNull($this->instance_KO_RPT->getImportoTotale());
    }
    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->instance_OK_RPT->getAllTokens());
        $this->assertNull($this->instance_KO_RPT->getAllTokens());
    }
    #[TestDox('getTransferAmount()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->instance_OK_RPT->getPaEmittente());
        $this->assertNull($this->instance_KO_RPT->getPaEmittente());
    }
    #[TestDox('getTransferAmount()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_OK_RPT->getFaultString());
        $this->assertEquals('Errore di sintassi XSD', $this->instance_KO_RPT->getFaultString());
    }
    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->instance_OK_RPT->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_KO_RPT->getPaymentMetaDataKey(0, 0));
    }
    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_OK_RPT->isBollo(0, 0));
        $this->assertFalse($this->instance_KO_RPT->isBollo(0, 0));
    }
    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance_OK_RPT->getCcp(0));
        $this->assertNull($this->instance_KO_RPT->getCcp(0));
    }
}
