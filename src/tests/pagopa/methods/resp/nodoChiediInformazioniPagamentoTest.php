<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\nodoChiediInformazioniPagamento;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\nodoChiediInformazioniPagamento::class')]
class nodoChiediInformazioniPagamentoTest extends TestCase
{

    protected nodoChiediInformazioniPagamento $info;

    protected function setUp(): void
    {
        $this->info = new nodoChiediInformazioniPagamento(base64_decode('ewogICAgIklCQU4iOiAiSVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxIiwKICAgICJib2xsb0RpZ2l0YWxlIjogZmFsc2UsCiAgICAiY29kaWNlRmlzY2FsZSI6ICJYWFhYWFhYWFhYWFhYWFgiLAogICAgImRldHRhZ2xpIjogWwogICAgICAgIHsKICAgICAgICAgICAgIkNDUCI6ICJjMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIsCiAgICAgICAgICAgICJJVVYiOiAiMDEwMDAwMDAwMDAwMDAwMTAiLAogICAgICAgICAgICAiY29kaWNlUGFnYXRvcmUiOiAiWFhYWFhYWFhYWFhYWFhYIiwKICAgICAgICAgICAgImVudGVCZW5lZmljaWFyaW8iOiAieHh4eHgiLAogICAgICAgICAgICAiaWREb21pbmlvIjogIjc3Nzc3Nzc3Nzc3IiwKICAgICAgICAgICAgImltcG9ydG8iOiA3NS41MCwKICAgICAgICAgICAgIm5vbWVQYWdhdG9yZSI6ICJ4eHh4eCIsCiAgICAgICAgICAgICJ0aXBvUGFnYXRvcmUiOiAiRiIKICAgICAgICB9CiAgICBdLAogICAgImltcG9ydG9Ub3RhbGUiOiA3NS41MCwKICAgICJvZ2dldHRvUGFnYW1lbnRvIjogIlBBR0FNRU5UTyBUQVJJIFJBVEEgMSIsCiAgICAicmFnaW9uZVNvY2lhbGUiOiAieHh4eHgiLAogICAgInVybFJlZGlyZWN0RUMiOiAiaHR0cDovL2V4YW1wbGUuY29tIgp9'));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->info->isBollo(0,0));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->info->getPaEmittente());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('75.50', $this->info->getImporto());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->info->getTransferId(0,0 ));
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->info->getPaymentMetaDataCount());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->info->getTransferMetaDataValue(0,0 ));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->info->getTransferCount());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('75.50', $this->info->getImportoTotale());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->info->getCcps());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->info->getPsp());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->info->getFaultCode());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->info->getPaymentMetaDataValue(0,0 ));
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->info->getTransferMetaDataKey(0,0 ));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->info->getAllTokens());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->info->getStazione());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->info->getNoticeNumber());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->info->getPaymentMetaDataKey(0,0 ));
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->info->getCanale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->info->getBrokerPsp());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->info->isFaultEvent());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->info->getTransferIban());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->info->getAllNoticesNumbers());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->info->getTransferPa());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->info->getTransferAmount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->info->getIuv());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->info->getCcp());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->info->getFaultDescription());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->info->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->info->getPaEmittenti());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->info->getToken());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->info->getBrokerPa());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->info->isValidPayload());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->info->getFaultString());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->info->getTransferMetaDataCount());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->info->outcome());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->info->getPaymentsCount());
    }
}
