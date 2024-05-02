<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoChiediAvanzamentoPagamento;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\nodoChiediAvanzamentoPagamentoTest::class')]
class nodoChiediAvanzamentoPagamentoTest extends TestCase
{

    protected nodoChiediAvanzamentoPagamento $chiediAvanzamento;

    protected function setUp(): void
    {
        $this->chiediAvanzamento = new nodoChiediAvanzamentoPagamento('');
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->chiediAvanzamento->outcome());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->chiediAvanzamento->getStazione());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->chiediAvanzamento->getToken());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->chiediAvanzamento->getTransferPa());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->chiediAvanzamento->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->chiediAvanzamento->getTransferCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->chiediAvanzamento->getIuv());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->chiediAvanzamento->getPaymentMetaDataKey());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->chiediAvanzamento->getBrokerPa());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->chiediAvanzamento->getAllTokens());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->chiediAvanzamento->getBrokerPsp());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->chiediAvanzamento->getCcps());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->chiediAvanzamento->getTransferIban());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->chiediAvanzamento->getImportoTotale());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->chiediAvanzamento->getIuvs());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->chiediAvanzamento->getCanale());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->chiediAvanzamento->getTransferMetaDataKey());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->chiediAvanzamento->getTransferMetaDataValue());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertFalse($this->chiediAvanzamento->isValidPayload());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->chiediAvanzamento->getNoticeNumber());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->chiediAvanzamento->getTransferId());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->chiediAvanzamento->getTransferMetaDataCount());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->chiediAvanzamento->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->chiediAvanzamento->getTransferAmount());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->chiediAvanzamento->getPsp());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->chiediAvanzamento->getPaymentsCount());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->chiediAvanzamento->getAllNoticesNumbers());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->chiediAvanzamento->isBollo());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->chiediAvanzamento->getPaEmittente());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->chiediAvanzamento->getCcp());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->chiediAvanzamento->getImporto());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->chiediAvanzamento->getPaymentMetaDataValue());
    }

}
