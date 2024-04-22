<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\activateIOPayment;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\activateIOPayment::class')]
class activateIOPaymentTest extends TestCase
{

    protected activateIOPayment $ok_instance;

    protected activateIOPayment $ko_instance;

    protected function setUp(): void
    {
        $this->ok_instance = new activateIOPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activateIOPayment',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpuZnBzcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JJTy54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6Qm9keT4KCQk8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXM+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8dG90YWxBbW91bnQ+MTYuNjI8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnh4eHh4eDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4PC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAxMDwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcHNwOmFjdGl2YXRlSU9QYXltZW50UmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]);

        $this->ko_instance = new activateIOPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:38:50',
                'tipoevento' => 'activateIOPayment',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpuZnBzcD0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JJTy54c2QiIHhtbG5zOnNvYXBlbnY9Imh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3NvYXAvZW52ZWxvcGUvIiB4bWxuczp4cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgogICAgPHNvYXBlbnY6Qm9keT4KICAgICAgICA8bmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXM+CiAgICAgICAgICAgIDxvdXRjb21lPktPPC9vdXRjb21lPgogICAgICAgICAgICA8ZmF1bHQ+CiAgICAgICAgICAgICAgICA8ZmF1bHRDb2RlPlBQVF9QQUdBTUVOVE9fSU5fQ09SU088L2ZhdWx0Q29kZT4KICAgICAgICAgICAgICAgIDxmYXVsdFN0cmluZz5QYWdhbWVudG8gaW4gYXR0ZXNhIHJpc3VsdGEgaW4gY29yc28gYWwgc2lzdGVtYSBwYWdvUEE8L2ZhdWx0U3RyaW5nPgogICAgICAgICAgICAgICAgPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgogICAgICAgICAgICAgICAgPGRlc2NyaXB0aW9uPkPigJnDqCBnacOgIHVuIHBhZ2FtZW50byBpbiBjb3Jzbywgcmlwcm92YSB0cmEgcXVhbGNoZSBtaW51dG88L2Rlc2NyaXB0aW9uPgogICAgICAgICAgICA8L2ZhdWx0PgogICAgICAgIDwvbmZwc3A6YWN0aXZhdGVJT1BheW1lbnRSZXM+CiAgICA8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]);
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->ok_instance->getPaymentsCount());
        $this->assertEquals(1, $this->ko_instance->getPaymentsCount());

    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('PPT_PAGAMENTO_IN_CORSO', $this->ko_instance->getFaultCode());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('C’è già un pagamento in corso, riprova tra qualche minuto', $this->ko_instance->getFaultDescription());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->ok_instance->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->ko_instance->getIuvs());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activateIOPayment::class, $this->ok_instance->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activateIOPayment::class, $this->ko_instance->getMethodInterface());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount());
        $this->assertNull($this->ko_instance->getTransferCount());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflowEvent = $this->ok_instance->workflowEvent();
        $this->assertEquals('22', $workflowEvent->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflowEvent->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflowEvent->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflowEvent->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflowEvent->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflowEvent->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflowEvent->getReadyColumnValue('outcome'));
        $this->assertNull($workflowEvent->getReadyColumnValue('faultcode'));

        $workflowEvent = $this->ko_instance->workflowEvent();
        $this->assertEquals('22', $workflowEvent->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:38:50.000', $workflowEvent->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflowEvent->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflowEvent->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflowEvent->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflowEvent->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflowEvent->getReadyColumnValue('outcome'));
        $this->assertEquals('PPT_PAGAMENTO_IN_CORSO', $workflowEvent->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->ok_instance->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->ko_instance->getPaEmittenti());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->ok_instance->transactionDetails(0));
        $this->assertNull($this->ko_instance->transactionDetails(0));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000010'], $this->ok_instance->getCcps());
        $this->assertEquals(['t0000000000000000000000000000010'], $this->ko_instance->getCcps());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_instance->isFaultEvent());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->ok_instance->transaction());
        $this->assertNull($this->ko_instance->transaction());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('Pagamento in attesa risulta in corso al sistema pagoPA', $this->ko_instance->getFaultString());
    }
}
