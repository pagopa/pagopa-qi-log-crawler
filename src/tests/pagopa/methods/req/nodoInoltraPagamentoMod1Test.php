<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoInoltraPagamentoMod1;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\nodoInoltraPagamentoMod1::class')]
class nodoInoltraPagamentoMod1Test extends TestCase
{

    protected nodoInoltraPagamentoMod1 $nodoInoltraPagamentoMod1;


    protected function setUp(): void
    {
        $this->nodoInoltraPagamentoMod1 = new nodoInoltraPagamentoMod1(base64_decode('ewogICAgImlkUGFnYW1lbnRvIjogIjIyYmRlYmYzLThjZTgtNDM4OS1iMDA0LWI4MjIyOTM4YmFmOCIsCiAgICAiaWRlbnRpZmljYXRpdm9DYW5hbGUiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpbyI6ICI4ODg4ODg4ODg4OCIsCiAgICAiaWRlbnRpZmljYXRpdm9Qc3AiOiAiQUdJRF8wMSIsCiAgICAidGlwb09wZXJhemlvbmUiOiAid2ViIiwKICAgICJ0aXBvVmVyc2FtZW50byI6ICJCQlQiCn0='));
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->nodoInoltraPagamentoMod1->getBrokerPsp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getPaymentMetaDataValue());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getBrokerPa());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getIuv());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferCount());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getPaymentMetaDataKey());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getImportoTotale());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getAllNoticesNumbers());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getStazione());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->nodoInoltraPagamentoMod1->getCanale());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getIuvs());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getAllTokens());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->nodoInoltraPagamentoMod1->isBollo());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferMetaDataValue());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getPaymentsCount());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->nodoInoltraPagamentoMod1->getPsp());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getCcps());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferPa());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getPaEmittente());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferId());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getCcp());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getImporto());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->outcome());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferMetaDataCount());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferIban());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getPaymentMetaDataCount());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->nodoInoltraPagamentoMod1->isValidPayload());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getNoticeNumber());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getToken());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferMetaDataKey());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getTransferAmount());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->nodoInoltraPagamentoMod1->getPaEmittenti());
    }
}
