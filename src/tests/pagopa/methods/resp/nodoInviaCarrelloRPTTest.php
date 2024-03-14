<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\nodoInviaCarrelloRPT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('methods\resp\nodoInviaCarrelloRPT::class')]
class nodoInviaCarrelloRPTTest extends TestCase
{


    protected nodoInviaCarrelloRPT $instance_1;

    protected nodoInviaCarrelloRPT $instance_fault;


    protected function setUp(): void
    {
        $this->instance_1 = new nodoInviaCarrelloRPT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+T0s8L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8dXJsPmh0dHBzOi8vd2lzcDIucGFnb3BhLmdvdi5pdC93YWxsZXQvd2VsY29tZT9pZFNlc3Npb249eHh4eHh4eHh4PC91cmw+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
        $this->instance_fault = new nodoInviaCarrelloRPT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpwcHRoZWFkPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292L3BwdGhlYWQiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9Ob2RvUGFnYW1lbnRpU1BDLnNwY29vcC5nb3YuaXQvc2Vydml6aS9QYWdhbWVudGlUZWxlbWF0aWNpUlBUIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBwdDpub2RvSW52aWFDYXJyZWxsb1JQVFJpc3Bvc3RhPgoJCQk8ZXNpdG9Db21wbGVzc2l2b09wZXJhemlvbmU+S088L2VzaXRvQ29tcGxlc3Npdm9PcGVyYXppb25lPgoJCQk8bGlzdGFFcnJvcmlSUFQ+CgkJCQk8ZmF1bHQ+CgkJCQkJPGZhdWx0Q29kZT5QUFRfSUJBTl9OT05fQ0VOU0lUTzwvZmF1bHRDb2RlPgoJCQkJCTxmYXVsdFN0cmluZz5JbCBjb2RpY2UgSUJBTiBpbmRpY2F0byBkYWwgRUMgbm9uIMOoIHByZXNlbnRlIG5lbGxhIGxpc3RhIGRlZ2xpIElCQU4gY29tdW5pY2F0aSBhbCBzaXN0ZW1hIHBhZ29QQS48L2ZhdWx0U3RyaW5nPgoJCQkJCTxpZD5Ob2RvRGVpUGFnYW1lbnRpU1BDPC9pZD4KCQkJCQk8ZGVzY3JpcHRpb24+SSB2YWxvcmkgZGkgSUJBTiBpbmRpY2F0aSBuZWkgdmVyc2FtZW50aSBbSVQxNlgwMjAwODEyMDExMDAwMTA3MDQyMzc0XSBub24gZmFubm8gcGFydGUgZGVnbGkgSUJBTiB2YWxpZGkgcGVyIGxhIFBBPC9kZXNjcmlwdGlvbj4KCQkJCQk8c2VyaWFsPjE8L3NlcmlhbD4KCQkJCTwvZmF1bHQ+CgkJCTwvbGlzdGFFcnJvcmlSUFQ+CgkJPC9wcHQ6bm9kb0ludmlhQ2FycmVsbG9SUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
    }


    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->instance_1->getPaEmittente(0));
        $this->assertNull($this->instance_1->getPaEmittente(0));
        $this->assertNull($this->instance_fault->getPaEmittente(1));
        $this->assertNull($this->instance_fault->getPaEmittente(1));
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->instance_1->getPsp());
        $this->assertNull($this->instance_1->getPsp());
        $this->assertNull($this->instance_fault->getPsp());
        $this->assertNull($this->instance_fault->getPsp());
    }


    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertTrue($this->instance_fault->isFaultEvent());
        $this->assertFalse($this->instance_1->isFaultEvent());
    }


    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance_1->getBrokerPa());
        $this->assertNull($this->instance_fault->getBrokerPa());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_1->getFaultCode());
        $this->assertEquals('PPT_IBAN_NON_CENSITO', $this->instance_fault->getFaultCode());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance_1->getTransferCount(0));
        $this->assertNull($this->instance_fault->getTransferCount(0));
        $this->assertNull($this->instance_1->getTransferCount(1));
        $this->assertNull($this->instance_fault->getTransferCount(1));
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_1->getFaultString());
        $this->assertEquals('Il codice IBAN indicato dal EC non è presente nella lista degli IBAN comunicati al sistema pagoPA.', $this->instance_fault->getFaultString());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance_1->getIuvs());
        $this->assertNull($this->instance_fault->getIuvs());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance_1->getIuv(0));
        $this->assertNull($this->instance_fault->getIuv(0));
        $this->assertNull($this->instance_1->getIuv(1));
        $this->assertNull($this->instance_fault->getIuv(1));
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->instance_1->getTransferId(0, 0));
        $this->assertNull($this->instance_fault->getTransferId(0, 0));
        $this->assertNull($this->instance_1->getTransferId(1, 0));
        $this->assertNull($this->instance_fault->getTransferId(1, 0));
        $this->assertNull($this->instance_1->getTransferId(0, 1));
        $this->assertNull($this->instance_fault->getTransferId(0, 1));
    }


    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance_1->getAllNoticesNumbers());
        $this->assertNull($this->instance_fault->getAllNoticesNumbers());
    }
    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->instance_1->getCanale());
        $this->assertNull($this->instance_fault->getCanale());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->instance_1->getPaymentsCount());
        $this->assertNull($this->instance_fault->getPaymentsCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance_1->getCcps());
        $this->assertNull($this->instance_fault->getCcps());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_1->isBollo(0, 0));
        $this->assertFalse($this->instance_1->isBollo(0, 1));
        $this->assertFalse($this->instance_1->isBollo(1, 0));
        $this->assertFalse($this->instance_1->isBollo(1, 1));
        $this->assertFalse($this->instance_fault->isBollo(0, 0));
        $this->assertFalse($this->instance_fault->isBollo(0, 1));
        $this->assertFalse($this->instance_fault->isBollo(1, 0));
        $this->assertFalse($this->instance_fault->isBollo(1, 1));
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance_1->getStazione());
        $this->assertNull($this->instance_fault->getStazione());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_1->getNoticeNumber(0));
        $this->assertNull($this->instance_1->getNoticeNumber(1));
        $this->assertNull($this->instance_fault->getNoticeNumber(0));
        $this->assertNull($this->instance_fault->getNoticeNumber(1));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance_1->getTransferPa(0, 0));
        $this->assertNull($this->instance_1->getTransferPa(0, 1));
        $this->assertNull($this->instance_1->getTransferPa(1, 0));
        $this->assertNull($this->instance_1->getTransferPa(1, 1));
        $this->assertNull($this->instance_fault->getTransferPa(0, 0));
        $this->assertNull($this->instance_fault->getTransferPa(0, 1));
        $this->assertNull($this->instance_fault->getTransferPa(1, 0));
        $this->assertNull($this->instance_fault->getTransferPa(1, 1));
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->instance_1->getImportoTotale());
        $this->assertNull($this->instance_fault->getImportoTotale());

    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->instance_1->getAllTokens());
        $this->assertNull($this->instance_fault->getAllTokens());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->instance_1->getBrokerPsp());
        $this->assertNull($this->instance_fault->getBrokerPsp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->instance_1->getPaEmittenti());
        $this->assertNull($this->instance_fault->getPaEmittenti());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance_1->getCcp(0));
        $this->assertNull($this->instance_1->getCcp(0));
        $this->assertNull($this->instance_fault->getCcp(1));
        $this->assertNull($this->instance_fault->getCcp(1));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance_1->getTransferAmount(0, 0 ));
        $this->assertNull($this->instance_1->getTransferAmount(1, 0 ));
        $this->assertNull($this->instance_1->getTransferAmount(0, 1 ));
        $this->assertNull($this->instance_1->getTransferAmount(1, 1 ));
        $this->assertNull($this->instance_fault->getTransferAmount(0, 0 ));
        $this->assertNull($this->instance_fault->getTransferAmount(1, 0 ));
        $this->assertNull($this->instance_fault->getTransferAmount(0, 1 ));
        $this->assertNull($this->instance_fault->getTransferAmount(1, 1 ));
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->instance_1->getToken(0));
        $this->assertNull($this->instance_1->getToken(0));
        $this->assertNull($this->instance_fault->getToken(1));
        $this->assertNull($this->instance_fault->getToken(1));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance_1->getTransferIban(0, 0 ));
        $this->assertNull($this->instance_1->getTransferIban(1, 0 ));
        $this->assertNull($this->instance_1->getTransferIban(0, 1 ));
        $this->assertNull($this->instance_1->getTransferIban(1, 1 ));
        $this->assertNull($this->instance_fault->getTransferIban(0, 0 ));
        $this->assertNull($this->instance_fault->getTransferIban(1, 0 ));
        $this->assertNull($this->instance_fault->getTransferIban(0, 1 ));
        $this->assertNull($this->instance_fault->getTransferIban(1, 1 ));
    }

    #[TestDox('getTransferIban()')]
    public function testGetImporto()
    {
        $this->assertNull($this->instance_1->getImporto(0));
        $this->assertNull($this->instance_1->getImporto(1));
        $this->assertNull($this->instance_fault->getImporto(0));
        $this->assertNull($this->instance_fault->getImporto(1));
    }
}
