<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\pspInviaCarrelloRPT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\pspInviaCarrelloRPTTest::class')]
class pspInviaCarrelloRPTTest extends TestCase
{

    protected pspInviaCarrelloRPT $instance_OK_RPT;

    protected pspInviaCarrelloRPT $instance_KO_RPT;


    protected function setUp(): void
    {
        $this->instance_OK_RPT = new pspInviaCarrelloRPT(base64_decode('PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGLTgnPz4KPHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXBlbnY6Qm9keT4KCQk8bnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPHBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIiB4c2k6dHlwZT0ibnMyOmVzaXRvUHNwSW52aWFDYXJyZWxsb1JQVCI+CgkJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQkJPGlkZW50aWZpY2F0aXZvQ2FycmVsbG8+eHh4eHh4eHh4eHh4eDwvaWRlbnRpZmljYXRpdm9DYXJyZWxsbz4KCQkJCTxwYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+aWRCcnVjaWF0dXJhPXh4dzIyPC9wYXJhbWV0cmlQYWdhbWVudG9JbW1lZGlhdG8+CgkJCTwvcHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCTwvbnMyOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
        $this->instance_KO_RPT = new pspInviaCarrelloRPT(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMzOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZSB4bWxuczpuczI9Imh0dHA6Ly93d3cuY25pcGEuZ292Lml0L3NjaGVtYXMvMjAxMC9QYWdhbWVudGkvQWNrXzFfMC8iIHhtbG5zOm5zMz0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8cHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCQkJPGVzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPktPPC9lc2l0b0NvbXBsZXNzaXZvT3BlcmF6aW9uZT4KCQkJCTxsaXN0YUVycm9yaVJQVD4KCQkJCQk8ZmF1bHQ+CgkJCQkJCTxmYXVsdENvZGU+Q0FOQUxFX1NJTlRBU1NJX1hTRDwvZmF1bHRDb2RlPgoJCQkJCQk8ZmF1bHRTdHJpbmc+RXJyb3JlIGRpIHNpbnRhc3NpIFhTRDwvZmF1bHRTdHJpbmc+CgkJCQkJCTxpZD5BR0lEXzAxPC9pZD4KCQkJCQkJPHNlcmlhbD4xPC9zZXJpYWw+CgkJCQkJPC9mYXVsdD4KCQkJCTwvbGlzdGFFcnJvcmlSUFQ+CgkJCTwvcHNwSW52aWFDYXJyZWxsb1JQVFJlc3BvbnNlPgoJCTwvbnMzOnBzcEludmlhQ2FycmVsbG9SUFRSZXNwb25zZT4KCTwvc29hcDpCb2R5Pgo8L3NvYXA6RW52ZWxvcGU+'));
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
        $this->assertEquals('CANALE_SINTASSI_XSD', $this->instance_KO_RPT->getFaultCode());
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
