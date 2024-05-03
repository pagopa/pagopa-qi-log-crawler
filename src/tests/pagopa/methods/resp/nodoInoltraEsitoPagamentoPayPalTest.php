<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\nodoInoltraEsitoPagamentoPayPal;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\nodoInoltraEsitoPagamentoPayPal::class')]
class nodoInoltraEsitoPagamentoPayPalTest extends TestCase
{

    protected nodoInoltraEsitoPagamentoPayPal $ok_paypal;

    protected nodoInoltraEsitoPagamentoPayPal $fail_paypal;


    protected function setUp(): void
    {
        $this->ok_paypal = new nodoInoltraEsitoPagamentoPayPal(base64_decode('eyJlc2l0byI6Ik9LIn0='));
        $this->fail_paypal = new nodoInoltraEsitoPagamentoPayPal(base64_decode('ewogICAgImRlc2NyaXppb25lIjogIlJpc3Bvc3RhIG5lZ2F0aXZhIGRlbCBDYW5hbGUiLAogICAgImVycm9yQ29kZSI6ICJSSUZQU1AiLAogICAgImVzaXRvIjogIktPIgp9'));
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->ok_paypal->getImporto());
        $this->assertNull($this->fail_paypal->getImporto());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->ok_paypal->getPaEmittenti());
        $this->assertNull($this->fail_paypal->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_paypal->getTransferCount());
        $this->assertNull($this->fail_paypal->getTransferCount());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->ok_paypal->getImportoTotale());
        $this->assertNull($this->fail_paypal->getImportoTotale());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->ok_paypal->getTransferPa());
        $this->assertNull($this->fail_paypal->getTransferPa());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->ok_paypal->getAllNoticesNumbers());
        $this->assertNull($this->fail_paypal->getAllNoticesNumbers());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->ok_paypal->outcome());
        $this->assertEquals('KO', $this->fail_paypal->outcome());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->ok_paypal->getTransferMetaDataKey());
        $this->assertNull($this->fail_paypal->getTransferMetaDataKey());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok_paypal->getPaymentsCount());
        $this->assertNull($this->fail_paypal->getPaymentsCount());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_paypal->getFaultCode());
        $this->assertEquals('RIFPSP', $this->fail_paypal->getFaultCode());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->ok_paypal->getPaEmittente());
        $this->assertNull($this->fail_paypal->getPaEmittente());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->ok_paypal->getCanale());
        $this->assertNull($this->fail_paypal->getCanale());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_paypal->getFaultString());
        $this->assertNull($this->fail_paypal->getFaultString());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->ok_paypal->getCcps());
        $this->assertNull($this->fail_paypal->getCcps());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->ok_paypal->getNoticeNumber());
        $this->assertNull($this->fail_paypal->getNoticeNumber());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->ok_paypal->getCcp());
        $this->assertNull($this->fail_paypal->getCcp());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->ok_paypal->getToken());
        $this->assertNull($this->fail_paypal->getToken());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_paypal->isFaultEvent());
        $this->assertTrue($this->fail_paypal->isFaultEvent());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->ok_paypal->getBrokerPsp());
        $this->assertNull($this->fail_paypal->getBrokerPsp());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->ok_paypal->getTransferAmount());
        $this->assertNull($this->fail_paypal->getTransferAmount());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->ok_paypal->getTransferId());
        $this->assertNull($this->fail_paypal->getTransferId());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->ok_paypal->getIuvs());
        $this->assertNull($this->fail_paypal->getIuvs());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->ok_paypal->isValidPayload());
        $this->assertTrue($this->fail_paypal->isValidPayload());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->ok_paypal->getBrokerPa());
        $this->assertNull($this->fail_paypal->getBrokerPa());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->ok_paypal->getPaymentMetaDataCount());
        $this->assertNull($this->fail_paypal->getPaymentMetaDataCount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->ok_paypal->getIuv());
        $this->assertNull($this->fail_paypal->getIuv());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->ok_paypal->isBollo());
        $this->assertFalse($this->fail_paypal->isBollo());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_paypal->getFaultDescription());
        $this->assertNull($this->fail_paypal->getFaultDescription());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->ok_paypal->getTransferMetaDataCount());
        $this->assertNull($this->fail_paypal->getTransferMetaDataCount());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->ok_paypal->getTransferIban());
        $this->assertNull($this->fail_paypal->getTransferIban());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->ok_paypal->getAllTokens());
        $this->assertNull($this->fail_paypal->getAllTokens());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->ok_paypal->getPaymentMetaDataKey());
        $this->assertNull($this->fail_paypal->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->ok_paypal->getTransferMetaDataValue());
        $this->assertNull($this->fail_paypal->getTransferMetaDataValue());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->ok_paypal->getStazione());
        $this->assertNull($this->fail_paypal->getStazione());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->ok_paypal->getPsp());
        $this->assertNull($this->fail_paypal->getPsp());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->ok_paypal->getPaymentMetaDataValue());
        $this->assertNull($this->fail_paypal->getPaymentMetaDataValue());
    }
}
