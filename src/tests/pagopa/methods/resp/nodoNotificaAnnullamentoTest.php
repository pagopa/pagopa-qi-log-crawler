<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\nodoNotificaAnnullamento;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\nodoNotificaAnnullamento::class')]
class nodoNotificaAnnullamentoTest extends TestCase
{

    protected nodoNotificaAnnullamento $notificaAnnullamento;

    protected nodoNotificaAnnullamento $error;

    protected function setUp(): void
    {
        $this->notificaAnnullamento = new nodoNotificaAnnullamento('{"esito":"OK"}');
        $this->error = new nodoNotificaAnnullamento('{"error":"Payment annullato o scaduto"}');
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->notificaAnnullamento->getAllTokens());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->notificaAnnullamento->getPsp());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->notificaAnnullamento->getFaultString());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->notificaAnnullamento->getPaymentsCount());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->notificaAnnullamento->getPaymentMetaDataCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->notificaAnnullamento->getIuv());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->notificaAnnullamento->getFaultCode());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->notificaAnnullamento->getTransferId());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->notificaAnnullamento->getAllNoticesNumbers());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->notificaAnnullamento->getTransferCount());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->notificaAnnullamento->getCcps());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->notificaAnnullamento->getCanale());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->notificaAnnullamento->getPaEmittenti());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->notificaAnnullamento->isBollo());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->notificaAnnullamento->getNoticeNumber());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->notificaAnnullamento->getPaymentMetaDataValue());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->notificaAnnullamento->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->notificaAnnullamento->getTransferPa());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->notificaAnnullamento->getBrokerPa());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->notificaAnnullamento->getIuvs());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->notificaAnnullamento->getPaEmittente());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->notificaAnnullamento->getTransferIban());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->notificaAnnullamento->getToken());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->notificaAnnullamento->getBrokerPsp());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->notificaAnnullamento->getTransferMetaDataValue());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->notificaAnnullamento->isFaultEvent());
        $this->assertTrue($this->error->isFaultEvent());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->notificaAnnullamento->getImportoTotale());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->notificaAnnullamento->getImporto());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->notificaAnnullamento->outcome());
        $this->assertEquals('KO', $this->error->outcome());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->notificaAnnullamento->getFaultDescription());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->notificaAnnullamento->getTransferMetaDataKey());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->notificaAnnullamento->getTransferAmount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->notificaAnnullamento->getTransferMetaDataCount());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->notificaAnnullamento->getStazione());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->notificaAnnullamento->getCcp());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->notificaAnnullamento->isValidPayload());
    }
}
