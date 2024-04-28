<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\closePaymentV2;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('methods\req\closePaymentV2()')]
class closePaymentV2Test extends TestCase
{

    protected closePaymentV2 $payment;


    protected function setUp(): void
    {
        $this->payment = new closePaymentV2(base64_decode('ewogICAgImFkZGl0aW9uYWxQYXltZW50SW5mb3JtYXRpb25zIjogewogICAgICAgICJhdXRob3JpemF0aW9uQ29kZSI6ICI1MTY3MzIiLAogICAgICAgICJmZWUiOiAiMi4wMCIsCiAgICAgICAgIm91dGNvbWVQYXltZW50R2F0ZXdheSI6ICJPSyIsCiAgICAgICAgInJybiI6ICI0MTE1MDExNzQ5ODMiLAogICAgICAgICJ0aW1lc3RhbXBPcGVyYXRpb24iOiAiMjAyNC0wNC0yNFQwOTo0ODo1NyIsCiAgICAgICAgInRvdGFsQW1vdW50IjogIjI0Mi4wMCIKICAgIH0sCiAgICAiZmVlIjogMi4wLAogICAgImlkQnJva2VyUFNQIjogIjEzMjEyODgwMTUwIiwKICAgICJpZENoYW5uZWwiOiAiMTMyMTI4ODAxNTBfMDIiLAogICAgImlkUFNQIjogIkNJUEJJVE1NIiwKICAgICJvdXRjb21lIjogIk9LIiwKICAgICJwYXltZW50TWV0aG9kIjogIkNQIiwKICAgICJwYXltZW50VG9rZW5zIjogWwogICAgICAgICI5ODk5N2YxODUwZjE0Y2M2YjdiOGM1MGQ5M2M5ZmZhMSIsCiAgICAgICAgImFkMjEyMzU1MjQxNTQ5NTRiNmFiNTM4ZTA5YjRjZTIzIgogICAgXSwKICAgICJ0aW1lc3RhbXBPcGVyYXRpb24iOiAiMjAyNC0wNC0yNFQwNzo0ODo1Ny40NzJaIiwKICAgICJ0b3RhbEFtb3VudCI6IDI0Mi4wLAogICAgInRyYW5zYWN0aW9uRGV0YWlscyI6IHsKICAgICAgICAiaW5mbyI6IHsKICAgICAgICAgICAgImJyYW5kIjogIk1DIiwKICAgICAgICAgICAgImJyYW5kTG9nbyI6ICJodHRwczovL2Fzc2V0cy5jZG4ucGxhdGZvcm0ucGFnb3BhLml0L2NyZWRpdGNhcmQvbWFzdGVyY2FyZC5wbmciLAogICAgICAgICAgICAiY2xpZW50SWQiOiAiQ0hFQ0tPVVQiLAogICAgICAgICAgICAicGF5bWVudE1ldGhvZE5hbWUiOiAiQ0FSRFMiLAogICAgICAgICAgICAidHlwZSI6ICJDUCIKICAgICAgICB9LAogICAgICAgICJ0cmFuc2FjdGlvbiI6IHsKICAgICAgICAgICAgImFtb3VudCI6IDI0MDAwLAogICAgICAgICAgICAiYXV0aG9yaXphdGlvbkNvZGUiOiAiNTE2NzMyIiwKICAgICAgICAgICAgImNyZWF0aW9uRGF0ZSI6ICIyMDI0LTA0LTI0VDA3OjQ4OjE0LjkyMDIwNjUxNVoiLAogICAgICAgICAgICAiZmVlIjogMjAwLAogICAgICAgICAgICAiZ3JhbmRUb3RhbCI6IDI0MjAwLAogICAgICAgICAgICAicGF5bWVudEdhdGV3YXkiOiAiTlBHIiwKICAgICAgICAgICAgInBzcCI6IHsKICAgICAgICAgICAgICAgICJicm9rZXJOYW1lIjogIjEzMjEyODgwMTUwIiwKICAgICAgICAgICAgICAgICJidXNpbmVzc05hbWUiOiAiTmV4aSIsCiAgICAgICAgICAgICAgICAiaWRDaGFubmVsIjogIjEzMjEyODgwMTUwXzAyIiwKICAgICAgICAgICAgICAgICJpZFBzcCI6ICJDSVBCSVRNTSIsCiAgICAgICAgICAgICAgICAicHNwT25VcyI6IGZhbHNlCiAgICAgICAgICAgIH0sCiAgICAgICAgICAgICJycm4iOiAiNDExNTAxMTc0OTgzIiwKICAgICAgICAgICAgInRpbWVzdGFtcE9wZXJhdGlvbiI6ICIyMDI0LTA0LTI0VDA3OjQ4OjU3LjQ3MloiLAogICAgICAgICAgICAidHJhbnNhY3Rpb25JZCI6ICIwOGY2MTY2ZjNmOTM0ZTZiOGFlNTQ3MjZkNDVlMTJhOCIsCiAgICAgICAgICAgICJ0cmFuc2FjdGlvblN0YXR1cyI6ICJDb25mZXJtYXRvIgogICAgICAgIH0sCiAgICAgICAgInVzZXIiOiB7CiAgICAgICAgICAgICJ0eXBlIjogIkdVRVNUIgogICAgICAgIH0KICAgIH0sCiAgICAidHJhbnNhY3Rpb25JZCI6ICIwOGY2MTY2ZjNmOTM0ZTZiOGFlNTQ3MjZkNDVlMTJhOCIKfQ=='));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(2, $this->payment->getPaymentsCount());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->payment->getTransferId(0,0));
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals(240.00, $this->payment->getImportoTotale());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->payment->getNoticeNumber());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->payment->getPaymentMetaDataValue());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->payment->getTransferMetaDataValue());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->payment->getTransferMetaDataKey());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('98997f1850f14cc6b7b8c50d93c9ffa1', $this->payment->getCcp(0));
        $this->assertEquals('ad21235524154954b6ab538e09b4ce23', $this->payment->getCcp(1));
        $this->assertNull($this->payment->getCcp(2));
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->payment->isValidPayload());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->payment->getPaEmittenti());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->payment->getIuvs());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->payment->getAllNoticesNumbers());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->payment->getIuv(0));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->payment->getTransferPa(0));
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->payment->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->payment->getTransferMetaDataCount());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->payment->getTransferIban(0));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->payment->outcome());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->payment->isBollo(0, 0));
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->payment->getStazione());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['98997f1850f14cc6b7b8c50d93c9ffa1', 'ad21235524154954b6ab538e09b4ce23'], $this->payment->getCcps());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->payment->getPaymentMetaDataKey());
    }

    #[TestDox('getRRN()')]
    public function testGetRRN()
    {
        $this->assertEquals('411501174983', $this->payment->getRRN());

    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->payment->getImporto());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('13212880150', $this->payment->getBrokerPsp());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->payment->getBrokerPa());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['98997f1850f14cc6b7b8c50d93c9ffa1', 'ad21235524154954b6ab538e09b4ce23'], $this->payment->getAllTokens());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->payment->getPaEmittente());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->payment->getTransferAmount());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('CIPBITMM', $this->payment->getPsp());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('98997f1850f14cc6b7b8c50d93c9ffa1', $this->payment->getToken(0));
        $this->assertEquals('ad21235524154954b6ab538e09b4ce23', $this->payment->getToken(1));
        $this->assertNull($this->payment->getToken(2));
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('13212880150_02', $this->payment->getCanale());
    }

    #[TestDox('getAuthCode()')]
    public function testGetAuthCode()
    {
        $this->assertEquals('516732', $this->payment->getAuthCode());
    }
}
