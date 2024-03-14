<?php
namespace pagopa\events\req;

use pagopa\crawler\events\req\activatePaymentNotice;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;


#[TestDox('events\req\activatePaymentNotice::class')]
class activatePaymentNoticeTest extends TestCase
{

    protected activatePaymentNotice $instance;

    protected function setUp(): void
    {
        $this->instance = new activatePaymentNotice(
          [
              'date_event' => '2023-09-01',
              'insertedtimestamp' => '2023-09-01 07:37:50',
              'tipoevento' => 'activatePaymentNotice',
              'sottotipoevento' => 'REQ',
              'psp' => 'ABI03069',
              'stazione' => '02770891204_01',
              'canale' => '97249640588_01',
              'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
              'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
              'uniqueid' => 'unique_id_activate_OK',
              'state' => 'TO_LOAD',
              'iddominio' => '13756881002',
              'iuv' => '80025500360433250',
              'ccp' => 'a9s8a7a6f8f9s8ds65237fd8d9',
              'noticeNumber' => '180025500360433250',
              'creditorreferenceid' => '80025500360433250',
              'paymenttoken' => 'a9s8a7a6f8f9s8ds65237fd8d9',
              'payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6bm9kPSJodHRwOi8vcGFnb3BhLWFwaS5wYWdvcGEuZ292Lml0L25vZGUvbm9kZUZvclBzcC54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIj4KCTxzb2FwZW52OkhlYWRlci8+Cgk8c29hcGVudjpCb2R5PgoJCTxub2Q6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVxPgoJCQk8aWRQU1A+QUJJMDMwNjk8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+OTcyNDk2NDA1ODg8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjk3MjQ5NjQwNTg4XzAxPC9pZENoYW5uZWw+CgkJCTxwYXNzd29yZD5DQkkxMUFnaWRQcm9kPC9wYXNzd29yZD4KCQkJPGlkZW1wb3RlbmN5S2V5Pjk3MjQ5NjQwNTg4XzI0MUtFM0lFODg8L2lkZW1wb3RlbmN5S2V5PgoJCQk8cXJDb2RlPgoJCQkJPGZpc2NhbENvZGU+MTM3NTY4ODEwMDI8L2Zpc2NhbENvZGU+CgkJCQk8bm90aWNlTnVtYmVyPjE4MDAyNTUwMDM2MDQzMzI1MDwvbm90aWNlTnVtYmVyPgoJCQk8L3FyQ29kZT4KCQkJPGV4cGlyYXRpb25UaW1lPjM2MDAwMDwvZXhwaXJhdGlvblRpbWU+CgkJCTxhbW91bnQ+MjIuNDY8L2Ftb3VudD4KCQk8L25vZDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
          ]
        );
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance->getPaymentsCount());
    }

    #[TestDox('getTipoEvento()')]
    public function testGetTipoEvento()
    {
        $this->assertEquals('activatePaymentNotice', $this->instance->getTipoEvento());
    }

    #[TestDox('getSottoTipoEvento()')]
    public function testGetSottoTipoEvento()
    {
        $this->assertEquals('REQ', $this->instance->getSottoTipoEvento());
    }


    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['13756881002'], $this->instance->getPaEmittenti());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['80025500360433250'], $this->instance->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['a9s8a7a6f8f9s8ds65237fd8d9'], $this->instance->getCcps());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('13756881002', $this->instance->getPaEmittente());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('80025500360433250', $this->instance->getIuv());
    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertEquals('80025500360433250', $this->instance->getCreditorReferenceId());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('a9s8a7a6f8f9s8ds65237fd8d9', $this->instance->getCcp());
    }

    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertEquals('a9s8a7a6f8f9s8ds65237fd8d9', $this->instance->getPaymentToken());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('180025500360433250', $this->instance->getNoticeNumber(0), print_r($this->instance, true));
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('ABI03069', $this->instance->getPsp());
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

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('02770891204_01', $this->instance->getStazione());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('02770891204', $this->instance->getBrokerPa());
    }

    #[TestDox('isValid()')]
    public function testIsValid()
    {
        $this->assertTrue(true);

    }

    #[TestDox('getKey()')]
    public function testGetKey()
    {
        $this->assertTrue(true);

    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertTrue(true);
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\activatePaymentNotice::class, $this->instance->getMethodInterface());
    }
}
