<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoInoltraEsitoPagamentoCarta;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\nodoChiediInformazioniPagamento::class')]
class nodoInoltraEsitoPagamentoCartaTest extends TestCase
{

    protected nodoInoltraEsitoPagamentoCarta $event;

    protected function setUp(): void
    {
        $this->event = new nodoInoltraEsitoPagamentoCarta(base64_decode('ewogICAgIlJSTiI6IDExMTExMTExMTExMiwKICAgICJjb2RpY2VBdXRvcml6emF0aXZvIjogIjU1NTU1NSIsCiAgICAiZXNpdG9UcmFuc2F6aW9uZUNhcnRhIjogIjAwIiwKICAgICJpZFBhZ2FtZW50byI6ICJ0MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAiaW1wb3J0b1RvdGFsZVBhZ2F0byI6IDI0Mi45LAogICAgInRpbWVzdGFtcE9wZXJhemlvbmUiOiAiMjAyNC0wNC0zMFQyMzo1MTo1OC4xODMrMDI6MDAiLAogICAgInRpcG9WZXJzYW1lbnRvIjogIkNQIgp9'));
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->event->getStazione());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->event->getToken());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->event->getTransferPa());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->event->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->event->getTransferCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->event->getIuv());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->event->getPaymentMetaDataKey());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->event->getBrokerPa());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->event->getAllTokens());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->event->getBrokerPsp());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->event->getCcps());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->event->getTransferIban());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('242.90', $this->event->getImportoTotale());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->event->getIuvs());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->event->getCanale());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->event->getTransferMetaDataKey());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->event->getTransferMetaDataValue());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->event->getPaymentsCount());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->event->isValidPayload());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->event->getNoticeNumber());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->event->getTransferId());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->event->getTransferMetaDataCount());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->event->getPaymentMetaDataCount());

    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->event->getTransferAmount());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->event->getPsp());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->event->getAllNoticesNumbers());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->event->isBollo());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->event->getPaEmittente());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->event->getCcp());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->event->getImporto());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->event->getPaymentMetaDataValue());
    }

}
