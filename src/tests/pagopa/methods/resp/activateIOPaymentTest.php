<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\activateIOPayment;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\activateIOPayment::class')]
class activateIOPaymentTest extends TestCase
{

    protected activateIOPayment $ok_instance;

    protected activateIOPayment $ko_instance;

    protected function setUp(): void
    {
        $this->ok_instance = new activateIOPayment(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpuZnBzcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JJTy54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6Qm9keT4KCQk8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXM+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8dG90YWxBbW91bnQ+MTYuNjI8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAxMDwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcHNwOmFjdGl2YXRlSU9QYXltZW50UmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
        $this->ko_instance = new activateIOPayment(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpuZnBzcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JJTy54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgogICAgPHNvYXBlbnY6Qm9keT4KICAgICAgICA8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXM+CiAgICAgICAgICAgIDxvdXRjb21lPktPPC9vdXRjb21lPgogICAgICAgICAgICA8ZmF1bHQ+CiAgICAgICAgICAgICAgICA8ZmF1bHRDb2RlPlBQVF9QQUdBTUVOVE9fSU5fQ09SU088L2ZhdWx0Q29kZT4KICAgICAgICAgICAgICAgIDxmYXVsdFN0cmluZz5QYWdhbWVudG8gaW4gYXR0ZXNhIHJpc3VsdGEgaW4gY29yc28gYWwgc2lzdGVtYSBwYWdvUEE8L2ZhdWx0U3RyaW5nPgogICAgICAgICAgICAgICAgPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgogICAgICAgICAgICAgICAgPGRlc2NyaXB0aW9uPkPigJnDqCBnacOgIHVuIHBhZ2FtZW50byBpbiBjb3Jzbywgcmlwcm92YSB0cmEgcXVhbGNoZSBtaW51dG88L2Rlc2NyaXB0aW9uPgogICAgICAgICAgICA8L2ZhdWx0PgogICAgICAgIDwvbmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXM+CiAgICA8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->ok_instance->getBrokerPsp());
        $this->assertNull($this->ko_instance->getBrokerPsp());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount());
        $this->assertNull($this->ko_instance->getTransferCount());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->ok_instance->getTransferIban());
        $this->assertNull($this->ko_instance->getTransferIban());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataCount());
        $this->assertNull($this->ko_instance->getTransferMetaDataCount());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000010', $this->ok_instance->getCcp());
        $this->assertNull($this->ko_instance->getCcp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataValue());
        $this->assertNull($this->ko_instance->getPaymentMetaDataValue());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000010'], $this->ok_instance->getCcps());
        $this->assertNull($this->ko_instance->getCcps());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('16.62', $this->ok_instance->getImportoTotale());
        $this->assertNull($this->ko_instance->getImportoTotale());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('Pagamento in attesa risulta in corso al sistema pagoPA', $this->ko_instance->getFaultString());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('16.62', $this->ok_instance->getImporto());
        $this->assertNull($this->ko_instance->getImporto());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->ok_instance->getTransferId());
        $this->assertNull($this->ko_instance->getTransferId());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->ok_instance->getPaymentsCount());
        $this->assertEquals(1, $this->ko_instance->getPaymentsCount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->ok_instance->getIuvs());
        $this->assertNull($this->ko_instance->getIuvs());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('C’è già un pagamento in corso, riprova tra qualche minuto', $this->ko_instance->getFaultDescription());

    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000010', $this->ok_instance->getIuv());
        $this->assertNull($this->ko_instance->getIuv());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataKey());
        $this->assertNull($this->ko_instance->getTransferMetaDataKey());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000010', $this->ok_instance->getToken());
        $this->assertNull($this->ko_instance->getToken());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_instance->isFaultEvent());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->ok_instance->getNoticeNumber());
        $this->assertNull($this->ko_instance->getNoticeNumber());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->ok_instance->getPsp());
        $this->assertNull($this->ko_instance->getPsp());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->ok_instance->outcome());
        $this->assertEquals('KO', $this->ko_instance->outcome());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->ok_instance->getTransferAmount());
        $this->assertNull($this->ko_instance->getTransferAmount());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->ok_instance->getTransferPa());
        $this->assertNull($this->ko_instance->getTransferPa());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->ok_instance->getStazione());
        $this->assertNull($this->ko_instance->getStazione());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('PPT_PAGAMENTO_IN_CORSO', $this->ko_instance->getFaultCode());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->ok_instance->isBollo());
        $this->assertFalse($this->ko_instance->isBollo());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['t0000000000000000000000000000010'], $this->ok_instance->getAllTokens());
        $this->assertNull($this->ko_instance->getAllTokens());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->ok_instance->getPaEmittenti());
        $this->assertNull($this->ko_instance->getPaEmittenti());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->ok_instance->getPaEmittente());
        $this->assertNull($this->ko_instance->getPaEmittente());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->ok_instance->getBrokerPa());
        $this->assertNull($this->ko_instance->getBrokerPa());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->ok_instance->getAllNoticesNumbers());
        $this->assertNull($this->ko_instance->getAllNoticesNumbers());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->ok_instance->getCanale());
        $this->assertNull($this->ko_instance->getCanale());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataKey());
        $this->assertNull($this->ko_instance->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->ok_instance->getTransferMetaDataValue());
        $this->assertNull($this->ko_instance->getTransferMetaDataValue());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->ok_instance->getPaymentMetaDataCount());
        $this->assertNull($this->ko_instance->getPaymentMetaDataCount());
    }
}
