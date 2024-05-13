<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\pspNotifyPayment;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('methods\resp\pspNotifyPayment::class')]
class pspNotifyPaymentTest extends TestCase
{

    protected pspNotifyPayment $ok_instance;

    protected pspNotifyPayment $ko_instance;


    protected function setUp(): void
    {
        $this->ok_instance = new pspNotifyPayment(base64_decode('PFNPQVAtRU5WOkVudmVsb3BlIHhtbG5zOlNPQVAtRU5WPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyI+PFNPQVAtRU5WOkhlYWRlci8+PFNPQVAtRU5WOkJvZHk+PG5zMzpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPjxvdXRjb21lPk9LPC9vdXRjb21lPjwvbnMzOnBzcE5vdGlmeVBheW1lbnRSZXM+PC9TT0FQLUVOVjpCb2R5PjwvU09BUC1FTlY6RW52ZWxvcGU+'));
        $this->ko_instance = new pspNotifyPayment(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPFNPQVAtRU5WOkhlYWRlciB4bWxuczpTT0FQLUVOVj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iLz4KCTxzb2FwOkJvZHk+CgkJPG5zMjpwc3BOb3RpZnlQYXltZW50UmVzIHhtbG5zOm5zMj0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9wc3AvcHNwRm9yTm9kZS54c2QiPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5DQU5BTEVfQ0FSUkVMTE9fUklGSVVUQVRPPC9mYXVsdENvZGU+CgkJCQk8ZmF1bHRTdHJpbmc+Q2FycmVsbG8gcmlmaXV0YXRvPC9mYXVsdFN0cmluZz4KCQkJCTxpZD4wPC9pZD4KCQkJCTxkZXNjcmlwdGlvbj5FcnJvcmUgQWNjcmVkaXRvOkFQUDo8L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCTwvbnMyOnBzcE5vdGlmeVBheW1lbnRSZXM+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg=='));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->ok_instance->getIuvs());
        $this->assertNull($this->ko_instance->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->ok_instance->getPaEmittenti());
        $this->assertNull($this->ko_instance->getPaEmittenti());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->ok_instance->getTransferAmount());
        $this->assertNull($this->ko_instance->getTransferAmount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->ok_instance->getCcps());
        $this->assertNull($this->ko_instance->getCcps());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->ok_instance->getAllTokens());
        $this->assertNull($this->ko_instance->getAllTokens());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->ok_instance->outcome());
        $this->assertEquals('KO', $this->ko_instance->outcome());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('Carrello rifiutato', $this->ko_instance->getFaultString());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataCount());
        $this->assertNull($this->ko_instance->getPaymentMetaDataCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->ok_instance->isBollo());
        $this->assertFalse($this->ko_instance->isBollo());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->ok_instance->getPsp());
        $this->assertNull($this->ko_instance->getPsp());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->ok_instance->getTransferId());
        $this->assertNull($this->ko_instance->getTransferId());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->ok_instance->getStazione());
        $this->assertNull($this->ko_instance->getStazione());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->ok_instance->getImporto());
        $this->assertNull($this->ko_instance->getImporto());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('CANALE_CARRELLO_RIFIUTATO', $this->ko_instance->getFaultCode());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok_instance->getPaymentsCount());
        $this->assertNull($this->ko_instance->getPaymentsCount());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('Errore Accredito:APP:', $this->ko_instance->getFaultDescription());

    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->ok_instance->getCanale());
        $this->assertNull($this->ko_instance->getCanale());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->ok_instance->getBrokerPa());
        $this->assertNull($this->ko_instance->getBrokerPa());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount());
        $this->assertNull($this->ko_instance->getTransferCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataCount());
        $this->assertNull($this->ko_instance->getTransferMetaDataCount());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->ok_instance->getBrokerPsp());
        $this->assertNull($this->ko_instance->getBrokerPsp());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->ok_instance->getNoticeNumber());
        $this->assertNull($this->ko_instance->getNoticeNumber());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataKey());
        $this->assertNull($this->ko_instance->getTransferMetaDataKey());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->ok_instance->getCcp());
        $this->assertNull($this->ko_instance->getCcp());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataValue());
        $this->assertNull($this->ko_instance->getTransferMetaDataValue());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->ok_instance->getIuv());
        $this->assertNull($this->ko_instance->getIuv());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->ok_instance->getPaEmittente());
        $this->assertNull($this->ko_instance->getPaEmittente());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->ok_instance->getImportoTotale());
        $this->assertNull($this->ko_instance->getImportoTotale());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataKey());
        $this->assertNull($this->ko_instance->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->ok_instance->getTransferPa());
        $this->assertNull($this->ko_instance->getTransferPa());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_instance->isFaultEvent());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue());
        $this->assertNull($this->ko_instance->getPaymentMetaDataValue());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->ok_instance->getTransferIban());
        $this->assertNull($this->ko_instance->getTransferIban());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->ok_instance->getToken());
        $this->assertNull($this->ko_instance->getToken());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->ok_instance->getAllNoticesNumbers());
        $this->assertNull($this->ko_instance->getAllNoticesNumbers());
    }
}
