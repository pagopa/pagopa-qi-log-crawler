<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\closePaymentV1;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\closePaymentV1::class')]
class closePaymentV1Test extends TestCase
{

    protected closePaymentV1 $payment;


    protected function setUp(): void
    {
        $this->payment = new closePaymentV1(base64_decode('ewogICAgImFkZGl0aW9uYWxQYXltZW50SW5mb3JtYXRpb25zIjogewogICAgICAgICJhdXRob3JpemF0aW9uQ29kZSI6ICIwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIsCiAgICAgICAgIm91dGNvbWVQYXltZW50R2F0ZXdheSI6ICIwIiwKICAgICAgICAidHJhbnNhY3Rpb25JZCI6ICIxMTExMTExMTIiCiAgICB9LAogICAgImZlZSI6IDAuNSwKICAgICJpZGVudGlmaWNhdGl2b0NhbmFsZSI6ICI4ODg4ODg4ODg4OF8wMSIsCiAgICAiaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvIjogIjg4ODg4ODg4ODg4IiwKICAgICJpZGVudGlmaWNhdGl2b1BzcCI6ICJBR0lEXzAxIiwKICAgICJvdXRjb21lIjogIk9LIiwKICAgICJwYXltZW50VG9rZW5zIjogWwogICAgICAgICJ0MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIKICAgIF0sCiAgICAicHNwVHJhbnNhY3Rpb25JZCI6ICIxMTExMTExMTIiLAogICAgInRpbWVzdGFtcE9wZXJhdGlvbiI6ICIyMDI0LTA0LTMwVDIxOjE4OjAwLjM3OVoiLAogICAgInRpcG9WZXJzYW1lbnRvIjogIkJQQVkiLAogICAgInRvdGFsQW1vdW50IjogNzUuNQp9'));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->payment->isBollo(0, 0));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->payment->getPaEmittente());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('75.00', $this->payment->getImporto());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->payment->getTransferId(0, 0));
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->payment->getPaymentMetaDataCount(0));
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->payment->getTransferMetaDataValue(0, 0, 0));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount(0));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000010'], $this->payment->getCcps());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->payment->getPsp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->payment->getPaymentMetaDataValue(0, 0));
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->payment->getTransferMetaDataKey(0, 0, 0));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['t0000000000000000000000000000010'], $this->payment->getAllTokens());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->payment->getStazione());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->payment->getNoticeNumber());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->payment->getPaymentMetaDataKey(0, 0));
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->payment->getCanale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->payment->getBrokerPsp());
    }

    #[TestDox('getAuthCode()')]
    public function testGetAuthCode()
    {
        $this->assertEquals('00000000000000000000010', $this->payment->getAuthCode());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->payment->getTransferIban(0, 0));
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->payment->getAllNoticesNumbers());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->payment->getTransferPa(0, 0));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->payment->getTransferAmount(0, 0));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->payment->getIuv());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000010', $this->payment->getCcp());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->payment->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->payment->getPaEmittenti());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000010', $this->payment->getToken());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->payment->getBrokerPa());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('75.00', $this->payment->getImportoTotale());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->payment->getTransferMetaDataCount());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->payment->outcome());
    }
}
