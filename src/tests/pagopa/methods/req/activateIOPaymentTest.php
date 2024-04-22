<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\activateIOPayment;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\activateIOPayment::class')]
class activateIOPaymentTest extends TestCase
{

    protected activateIOPayment $payment;

    protected function setUp(): void
    {
        $this->payment = new activateIOPayment(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6bmZwc3A9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9ySU8ueHNkIiB4bWxuczpzb2FwPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6dG5zPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvcklPLndzZGwiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXEgeG1sbnM6bmZwc3A9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9ySU8ueHNkIj4KCQkJPGlkUFNQPkFHSURfMDE8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+Nzc3Nzc3Nzc3Nzc8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjc3Nzc3Nzc3Nzc3XzAxPC9pZENoYW5uZWw+CgkJCTxwYXNzd29yZD54eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjMwMTAwMDAwMDAwMDAwMDAxMDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGFtb3VudD4zMC4wMDwvYW1vdW50PgoJCTwvbmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXE+Cgk8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg=='));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->payment->getTransferIban(0));
        $this->assertNull($this->payment->getTransferIban(1));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->payment->isBollo(0));
        $this->assertFalse($this->payment->isBollo(1));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->payment->getCcps());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->payment->getTransferPa(0));
        $this->assertNull($this->payment->getTransferPa(1));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->payment->getPaEmittente());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->payment->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->payment->getPaymentMetaDataKey(0, 1));
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->payment->outcome());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->payment->getIuv());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->payment->getPsp());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->payment->getAllTokens());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('77777777777_01', $this->payment->getCanale());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount(0));
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertEquals(['301000000000000010'], $this->payment->getAllNoticesNumbers());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->payment->getCcp(0));
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('301000000000000010', $this->payment->getNoticeNumber());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('30.00', $this->payment->getImportoTotale());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->payment->getTransferAmount(0));
        $this->assertNull($this->payment->getTransferAmount(1));
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->payment->getTransferId(0));
        $this->assertNull($this->payment->getTransferId(1));
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->payment->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->payment->getPaymentMetaDataValue(0, 1));
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->payment->getToken());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->payment->getStazione());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('30.00', $this->payment->getImporto());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->payment->getIuvs());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->payment->getBrokerPa());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->payment->getTransferMetaDataValue(0, 0));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->payment->getPaEmittenti());

    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('77777777777', $this->payment->getBrokerPsp());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->payment->getPaymentMetaDataCount(0));
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->payment->getTransferMetaDataKey(0, 0));
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->payment->getTransferMetaDataCount(0));
    }
}
