<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoInoltraEsitoPagamentoPayPal;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;


#[TestDox('methods\req\nodoInoltraEsitoPagamentoPayPal::class')]
class nodoInoltraEsitoPagamentoPayPalTest extends TestCase
{

    protected nodoInoltraEsitoPagamentoPayPal $paypal;

    protected nodoInoltraEsitoPagamentoPayPal $error_json;

    protected function setUp(): void
    {
        $this->paypal = new nodoInoltraEsitoPagamentoPayPal(base64_decode('ewogICAgImlkUGFnYW1lbnRvIjogIjEwMjkyMzAxMDIzOTIyMDM5MjAwMTI5MzkzMDIwMTIyIiwKICAgICJpZFRyYW5zYXppb25lIjogIjExMTExMTExMyIsCiAgICAiaWRUcmFuc2F6aW9uZVBzcCI6ICI5OTk5OTk5OTk5OTk5OSIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAiaW1wb3J0b1RvdGFsZVBhZ2F0byI6IDcwLjAwLAogICAgInRpbWVzdGFtcE9wZXJhemlvbmUiOiAiMjAyNC0wNS0wMlQyMjoxMDoyMC45MjIrMDI6MDAiCn0='));
        $this->error_json = new nodoInoltraEsitoPagamentoPayPal('non_sono_un_json');
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('70.00', $this->paypal->getImporto());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->paypal->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->paypal->getTransferCount());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('70.00', $this->paypal->getImportoTotale());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->paypal->getTransferPa());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->paypal->getAllNoticesNumbers());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->paypal->outcome());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->paypal->getTransferMetaDataKey());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->paypal->getPaEmittente());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->paypal->getCanale());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->paypal->getPaymentsCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->paypal->getCcps());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->paypal->getNoticeNumber());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->paypal->getCcp());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->paypal->getToken());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->paypal->getBrokerPsp());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->paypal->getTransferAmount());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->paypal->getTransferId());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->paypal->getIuvs());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->paypal->isValidPayload());
        $this->assertFalse($this->error_json->isValidPayload());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->paypal->getBrokerPa());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->paypal->getPaymentMetaDataCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->paypal->getIuv());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->paypal->isBollo());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->paypal->getTransferMetaDataCount());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->paypal->getTransferIban());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->paypal->getAllTokens());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->paypal->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->paypal->getTransferMetaDataValue());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->paypal->getStazione());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->paypal->getPsp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->paypal->getPaymentMetaDataValue());
    }
}
