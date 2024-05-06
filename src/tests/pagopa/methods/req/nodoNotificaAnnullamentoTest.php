<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\nodoNotificaAnnullamento;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\nodoNotificaAnnullamento::class')]
class nodoNotificaAnnullamentoTest extends TestCase
{

    protected nodoNotificaAnnullamento $nodoNotificaAnnullamento;

    protected function setUp(): void
    {
        $this->nodoNotificaAnnullamento = new nodoNotificaAnnullamento('');
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getAllTokens());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getPsp());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getPaymentMetaDataCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getIuv());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getTransferId());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getPaymentsCount());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getAllNoticesNumbers());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getTransferCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getCcps());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getCanale());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getPaEmittenti());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->nodoNotificaAnnullamento->isBollo());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getNoticeNumber());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getPaymentMetaDataValue());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getTransferPa());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getBrokerPa());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getIuvs());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getPaEmittente());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getTransferIban());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getToken());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getBrokerPsp());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getTransferMetaDataValue());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getImportoTotale());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getImporto());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->outcome());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getTransferMetaDataKey());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getTransferAmount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getTransferMetaDataCount());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getStazione());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->nodoNotificaAnnullamento->getCcp());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->nodoNotificaAnnullamento->isValidPayload());
    }
}
