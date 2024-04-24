<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\nodoAttivaRPT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\nodoAttivaRPT::class')]
class nodoAttivaRPTTest extends TestCase
{

    protected nodoAttivaRPT $ok_instance;

    protected nodoAttivaRPT $ko_intance;


    protected function setUp(): void
    {
        $this->ok_instance = new nodoAttivaRPT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQk8bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJCTxkYXRpUGFnYW1lbnRvUEE+CgkJCQkJPGltcG9ydG9TaW5nb2xvVmVyc2FtZW50bz4yNy4wMDwvaW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPgoJCQkJCTxpYmFuQWNjcmVkaXRvPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvaWJhbkFjY3JlZGl0bz4KCQkJCQk8ZW50ZUJlbmVmaWNpYXJpbz4KCQkJCQkJPHBheV9pOmlkZW50aWZpY2F0aXZvVW5pdm9jb0JlbmVmaWNpYXJpbz4KCQkJCQkJCTxwYXlfaTp0aXBvSWRlbnRpZmljYXRpdm9Vbml2b2NvPkc8L3BheV9pOnRpcG9JZGVudGlmaWNhdGl2b1VuaXZvY28+CgkJCQkJCQk8cGF5X2k6Y29kaWNlSWRlbnRpZmljYXRpdm9Vbml2b2NvPjc3Nzc3Nzc3Nzc3PC9wYXlfaTpjb2RpY2VJZGVudGlmaWNhdGl2b1VuaXZvY28+CgkJCQkJCTwvcGF5X2k6aWRlbnRpZmljYXRpdm9Vbml2b2NvQmVuZWZpY2lhcmlvPgoJCQkJCQk8cGF5X2k6ZGVub21pbmF6aW9uZUJlbmVmaWNpYXJpbz54eHh4eHg8L3BheV9pOmRlbm9taW5hemlvbmVCZW5lZmljaWFyaW8+CgkJCQkJPC9lbnRlQmVuZWZpY2lhcmlvPgoJCQkJCTxjYXVzYWxlVmVyc2FtZW50bz54eHh4eHg8L2NhdXNhbGVWZXJzYW1lbnRvPgoJCQkJPC9kYXRpUGFnYW1lbnRvUEE+CgkJCTwvbm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCTwvcHB0Om5vZG9BdHRpdmFSUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
        $this->ko_intance = new nodoAttivaRPT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQk8bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQkJPGZhdWx0PgoJCQkJCTxmYXVsdENvZGU+UFBUX01VTFRJX0JFTkVGSUNJQVJJTzwvZmF1bHRDb2RlPgoJCQkJCTxmYXVsdFN0cmluZz5MYSBjaGlhbWF0YSBub24gw6ggY29tcGF0aWJpbGUgY29uIGlsIG51b3ZvIG1vZGVsbG8gUFNQLjwvZmF1bHRTdHJpbmc+CgkJCQkJPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgoJCQkJCTxkZXNjcmlwdGlvbj5MYSBjaGlhbWF0YSBub24gw6ggY29tcGF0aWJpbGUgY29uIGlsIG51b3ZvIG1vZGVsbG8gUFNQLjwvZGVzY3JpcHRpb24+CgkJCQk8L2ZhdWx0PgoJCQkJPGVzaXRvPktPPC9lc2l0bz4KCQkJPC9ub2RvQXR0aXZhUlBUUmlzcG9zdGE+CgkJPC9wcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->ok_instance->getIuvs());
        $this->assertNull($this->ko_intance->getIuvs());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('27.00', $this->ok_instance->getImportoTotale());
        $this->assertNull($this->ko_intance->getImportoTotale());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('La chiamata non è compatibile con il nuovo modello PSP.', $this->ko_intance->getFaultDescription());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->ok_instance->getCcps());
        $this->assertNull($this->ko_intance->getCcps());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->ok_instance->getStazione());
        $this->assertNull($this->ko_intance->getStazione());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataKey());
        $this->assertNull($this->ko_intance->getTransferMetaDataKey());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('La chiamata non è compatibile con il nuovo modello PSP.', $this->ko_intance->getFaultString());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('PPT_MULTI_BENEFICIARIO', $this->ko_intance->getFaultCode());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->ok_instance->isBollo());
        $this->assertFalse($this->ko_intance->isBollo());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->ok_instance->getTransferIban());
        $this->assertNull($this->ko_intance->getTransferIban());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue());
        $this->assertNull($this->ko_intance->getPaymentMetaDataValue());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->ok_instance->getCcp());
        $this->assertNull($this->ko_intance->getCcp());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->ok_instance->getAllTokens());
        $this->assertNull($this->ko_intance->getAllTokens());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->ok_instance->getAllNoticesNumbers());
        $this->assertNull($this->ko_intance->getAllNoticesNumbers());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataCount());
        $this->assertNull($this->ko_intance->getTransferMetaDataCount());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->ok_instance->getTransferPa());
        $this->assertNull($this->ko_intance->getTransferPa());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataCount());
        $this->assertNull($this->ko_intance->getPaymentMetaDataCount());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->ok_instance->getPaymentsCount());
        $this->assertEquals(1, $this->ko_intance->getPaymentsCount());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->ok_instance->getPaEmittente());
        $this->assertNull($this->ko_intance->getPaEmittente());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataKey());
        $this->assertNull($this->ko_intance->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->ok_instance->getTransferAmount());
        $this->assertNull($this->ko_intance->getTransferAmount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->ok_instance->getIuv());
        $this->assertNull($this->ko_intance->getIuv());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->ok_instance->getBrokerPsp());
        $this->assertNull($this->ko_intance->getBrokerPsp());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->ok_instance->outcome());
        $this->assertEquals('KO', $this->ko_intance->outcome());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount());
        $this->assertNull($this->ko_intance->getTransferCount());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->ok_instance->getBrokerPa());
        $this->assertNull($this->ko_intance->getBrokerPa());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->ok_instance->getTransferId());
        $this->assertNull($this->ko_intance->getTransferId());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('27.00', $this->ok_instance->getImporto());
        $this->assertNull($this->ko_intance->getImporto());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->ok_instance->getNoticeNumber());
        $this->assertNull($this->ko_intance->getNoticeNumber());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_intance->isFaultEvent());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->ok_instance->getPsp());
        $this->assertNull($this->ko_intance->getPsp());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataValue());
        $this->assertNull($this->ko_intance->getTransferMetaDataValue());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->ok_instance->getToken());
        $this->assertNull($this->ko_intance->getToken());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->ok_instance->getPaEmittenti());
        $this->assertNull($this->ko_intance->getPaEmittenti());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->ok_instance->getCanale());
        $this->assertNull($this->ko_intance->getCanale());
    }
}
