<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoChiediCopiaRT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\nodoChiediCopiaRT::class')]
class nodoChiediCopiaRTTest extends TestCase
{

    protected nodoChiediCopiaRT $nodoChiediCopiaRT;

    protected function setUp(): void
    {
        $this->nodoChiediCopiaRT = new nodoChiediCopiaRT(base64_decode('PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzZD0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6Qm9keT4KCQk8bm9kb0NoaWVkaUNvcGlhUlQgeG1sbnM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BBIHhtbG5zPSIiPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT4KCQkJPGlkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEEgeG1sbnM9IiI+Nzc3Nzc3Nzc3NzdfMDE8L2lkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+CgkJCTxwYXNzd29yZCB4bWxucz0iIj5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8geG1sbnM9IiI+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8geG1sbnM9IiI+MDEwMDAwMDAwMDAwMDAwMTA8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCTxjb2RpY2VDb250ZXN0b1BhZ2FtZW50byB4bWxucz0iIj5jMDAwMDAwMDAwMDAwMDAwMDEwPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQk8L25vZG9DaGllZGlDb3BpYVJUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferPa());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferId());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferMetaDataValue());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $value = 'c000000000000000010';
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getToken());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getNoticeNumber());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferIban());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getImportoTotale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getBrokerPsp());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getPaymentMetaDataCount());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getPsp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getPaymentMetaDataValue());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $value = ['c000000000000000010'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getAllTokens());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getIuvs());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getImporto());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $value = 'c000000000000000010';
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getCcp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getPaEmittenti());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $value = '01000000000000010';
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getIuv());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['c000000000000000010'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getCcps());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->nodoChiediCopiaRT->isBollo());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->nodoChiediCopiaRT->getBrokerPa());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getCanale());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->nodoChiediCopiaRT->outcome());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->nodoChiediCopiaRT->getPaymentsCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferMetaDataCount());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->nodoChiediCopiaRT->getStazione());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getAllNoticesNumbers());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferMetaDataKey());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $value = '77777777777';
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getPaEmittente());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->nodoChiediCopiaRT->isValidPayload());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferAmount());
    }
}
