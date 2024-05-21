<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\paSendRT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\paSendRT::class')]
class paSendRTTest extends TestCase
{

    protected paSendRT $receipt;

    protected function setUp(): void
    {
        $this->receipt = new paSendRT(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwYWZuPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L3BhL3BhRm9yTm9kZS54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp0bnM9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcGFGb3JOb2RlIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBhZm46cGFTZW5kUlRSZXE+CgkJCTxpZFBBPjc3Nzc3Nzc3Nzc4PC9pZFBBPgoJCQk8aWRCcm9rZXJQQT43Nzc3Nzc3Nzc3NzwvaWRCcm9rZXJQQT4KCQkJPGlkU3RhdGlvbj43Nzc3Nzc3Nzc3N18wMTwvaWRTdGF0aW9uPgoJCQk8cmVjZWlwdD4KCQkJCTxyZWNlaXB0SWQ+cjAyMDk0MzA0MzkwMzk0MDkyMDkzMTIwMTQ4NTczMDA8L3JlY2VpcHRJZD4KCQkJCTxub3RpY2VOdW1iZXI+MzAxMDAwMDAwMDAwMDAwMDEwPC9ub3RpY2VOdW1iZXI+CgkJCQk8ZmlzY2FsQ29kZT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZT4KCQkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCQk8cGF5bWVudEFtb3VudD4xMzAuMDA8L3BheW1lbnRBbW91bnQ+CgkJCQk8ZGVzY3JpcHRpb24+VEFSSTwvZGVzY3JpcHRpb24+CgkJCQk8Y29tcGFueU5hbWU+Q29tdW5lIEluZXNpc3RlbnRlPC9jb21wYW55TmFtZT4KCQkJCTxkZWJ0b3I+CgkJCQkJPHVuaXF1ZUlkZW50aWZpZXI+CgkJCQkJCTxlbnRpdHlVbmlxdWVJZGVudGlmaWVyVHlwZT5GPC9lbnRpdHlVbmlxdWVJZGVudGlmaWVyVHlwZT4KCQkJCQkJPGVudGl0eVVuaXF1ZUlkZW50aWZpZXJWYWx1ZT5YWFhYWFhYWFhYWFhYWFhYPC9lbnRpdHlVbmlxdWVJZGVudGlmaWVyVmFsdWU+CgkJCQkJPC91bmlxdWVJZGVudGlmaWVyPgoJCQkJCTxmdWxsTmFtZT5YWFggWFhYPC9mdWxsTmFtZT4KCQkJCTwvZGVidG9yPgoJCQkJPHRyYW5zZmVyTGlzdD4KCQkJCQk8dHJhbnNmZXI+CgkJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJCTx0cmFuc2ZlckFtb3VudD4xMzAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJCTxJQkFOPklUMDEwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvSUJBTj4KCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj5yZW1pdHRhbmNlPC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4PC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTwvdHJhbnNmZXI+CgkJCQk8L3RyYW5zZmVyTGlzdD4KCQkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJCTxwc3BGaXNjYWxDb2RlPjg4ODg4ODg4ODg4PC9wc3BGaXNjYWxDb2RlPgoJCQkJPFBTUENvbXBhbnlOYW1lPkJhbmNhPC9QU1BDb21wYW55TmFtZT4KCQkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJCTxjaGFubmVsRGVzY3JpcHRpb24+V0lTUDwvY2hhbm5lbERlc2NyaXB0aW9uPgoJCQkJPHBheW1lbnRNZXRob2Q+Q1A8L3BheW1lbnRNZXRob2Q+CgkJCQk8ZmVlPjAuNTA8L2ZlZT4KCQkJCTxwYXltZW50RGF0ZVRpbWU+MjAyNC0wNS0yMVQyMDoyNzozMzwvcGF5bWVudERhdGVUaW1lPgoJCQkJPGFwcGxpY2F0aW9uRGF0ZT4yMDI0LTA1LTIxPC9hcHBsaWNhdGlvbkRhdGU+CgkJCQk8dHJhbnNmZXJEYXRlPjIwMjQtMDUtMjI8L3RyYW5zZmVyRGF0ZT4KCQkJPC9yZWNlaXB0PgoJCTwvcGFmbjpwYVNlbmRSVFJlcT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $value = ['r0209430439039409209312014857300'];
        $this->assertEquals($value, $this->receipt->getAllTokens());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->receipt->getTransferId());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->receipt->getPaymentMetaDataValue());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->receipt->getBrokerPsp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->receipt->getPaEmittenti());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->receipt->getBrokerPa());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['r0209430439039409209312014857300'];
        $this->assertEquals($value, $this->receipt->getAllTokens());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->receipt->isValidPayload());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->receipt->isBollo());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->receipt->getPsp());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->receipt->getTransferMetaDataValue());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('r0209430439039409209312014857300', $this->receipt->getToken());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('r0209430439039409209312014857300', $this->receipt->getCcp());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $value = ['301000000000000010'];
        $this->assertEquals($value, $this->receipt->getAllNoticesNumbers());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->receipt->getPaymentsCount());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->receipt->getPaEmittente());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals(130.00, $this->receipt->getImporto());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->receipt->getTransferAmount());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->receipt->getTransferPa());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('301000000000000010', $this->receipt->getNoticeNumber());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->receipt->outcome());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->receipt->getTransferIban());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->receipt->getPaymentMetaDataKey());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals(130.00, $this->receipt->getImportoTotale());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->receipt->getPaymentMetaDataCount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->receipt->getIuvs());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $value = '01000000000000010';
        $this->assertEquals($value, $this->receipt->getIuv());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->receipt->getCanale());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->receipt->getStazione());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->receipt->getTransferMetaDataKey());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->receipt->getTransferCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->receipt->getTransferMetaDataCount());
    }
}
