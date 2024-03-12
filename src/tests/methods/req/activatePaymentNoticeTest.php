<?php
namespace pagopa\crawler\methods\req;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;


#[TestDox('methods\req\activatePaymentNotice::class')]
class activatePaymentNoticeTest extends TestCase
{

    protected activatePaymentNotice $instance;

    protected function setUp(): void
    {
        $this->instance = new activatePaymentNotice(base64_decode('PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+QUJJMDMwNjk8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+OTcyNDk2NDA1ODg8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjk3MjQ5NjQwNTg4XzAxPC9pZENoYW5uZWw+CgkJCTxwYXNzd29yZD5DQkkxMUFnaWRQcm9kPC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pjk3MjQ5NjQwNTg4XzI0MUtFM0lFODg8L2lkZW1wb3RlbmN5S2V5PgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+MTM3NTY4ODEwMDI8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjE4MDAyNTUwMDM2MDQzMzI1MDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGV4cGlyYXRpb25UaW1lPjM2MDAwMDwvZXhwaXJhdGlvblRpbWU+CgkJCTxhbW91bnQ+MjIuNDY8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
    }


    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertEquals(['180025500360433250'], $this->instance->getAllNoticesNumbers());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['13756881002'], $this->instance->getPaEmittenti());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->instance->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance->getCcps());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertNull($this->instance->getAllTokens());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('180025500360433250', $this->instance->getNoticeNumber());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('13756881002', $this->instance->getPaEmittente());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->instance->getIuv());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance->getCcp());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertNull($this->instance->getToken());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('97249640588_01', $this->instance->getCanale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('97249640588', $this->instance->getBrokerPsp());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('ABI03069', $this->instance->getPsp());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance->getStazione());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance->getBrokerPa());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('22.46', $this->instance->getImportoTotale());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('22.46', $this->instance->getImporto());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->instance->getTransferPa(0, 0));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->instance->getTransferAmount(0, 0));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->instance->getTransferIban(0, 0));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo(0, 0));
    }
}
