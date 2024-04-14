<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\nodoAttivaRPT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\nodoAttivaRPT::class')]
class nodoAttivaRPTTest extends TestCase
{

    protected nodoAttivaRPT $ok_instance;
    protected nodoAttivaRPT $ko_instance;

    protected function setUp(): void
    {
        $this->ok_instance = new nodoAttivaRPT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoAttivaRPT',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_ok',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQk8bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQkJPGVzaXRvPk9LPC9lc2l0bz4KCQkJCTxkYXRpUGFnYW1lbnRvUEE+CgkJCQkJPGltcG9ydG9TaW5nb2xvVmVyc2FtZW50bz4yNy4wMDwvaW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPgoJCQkJCTxpYmFuQWNjcmVkaXRvPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTwvaWJhbkFjY3JlZGl0bz4KCQkJCQk8ZW50ZUJlbmVmaWNpYXJpbz4KCQkJCQkJPHBheV9pOmlkZW50aWZpY2F0aXZvVW5pdm9jb0JlbmVmaWNpYXJpbz4KCQkJCQkJCTxwYXlfaTp0aXBvSWRlbnRpZmljYXRpdm9Vbml2b2NvPkc8L3BheV9pOnRpcG9JZGVudGlmaWNhdGl2b1VuaXZvY28+CgkJCQkJCQk8cGF5X2k6Y29kaWNlSWRlbnRpZmljYXRpdm9Vbml2b2NvPjc3Nzc3Nzc3Nzc3PC9wYXlfaTpjb2RpY2VJZGVudGlmaWNhdGl2b1VuaXZvY28+CgkJCQkJCTwvcGF5X2k6aWRlbnRpZmljYXRpdm9Vbml2b2NvQmVuZWZpY2lhcmlvPgoJCQkJCQk8cGF5X2k6ZGVub21pbmF6aW9uZUJlbmVmaWNpYXJpbz54eHh4eHg8L3BheV9pOmRlbm9taW5hemlvbmVCZW5lZmljaWFyaW8+CgkJCQkJPC9lbnRlQmVuZWZpY2lhcmlvPgoJCQkJCTxjYXVzYWxlVmVyc2FtZW50bz54eHh4eHg8L2NhdXNhbGVWZXJzYW1lbnRvPgoJCQkJPC9kYXRpUGFnYW1lbnRvUEE+CgkJCTwvbm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCTwvcHB0Om5vZG9BdHRpdmFSUFRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'
            ]
        );

        $this->ko_instance = new nodoAttivaRPT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoAttivaRPT',
                'sottotipoevento' => 'RESP',
                'psp' => '',
                'stazione' => '',
                'canale' => '',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_ko',
                'iddominio' => '',
                'iuv' => '',
                'ccp' => '',
                'noticeNumber' => '',
                'creditorreferenceid' => '',
                'paymenttoken' => '',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQk8bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJCQkJPGZhdWx0PgoJCQkJCTxmYXVsdENvZGU+UFBUX01VTFRJX0JFTkVGSUNJQVJJTzwvZmF1bHRDb2RlPgoJCQkJCTxmYXVsdFN0cmluZz5MYSBjaGlhbWF0YSBub24gw6ggY29tcGF0aWJpbGUgY29uIGlsIG51b3ZvIG1vZGVsbG8gUFNQLjwvZmF1bHRTdHJpbmc+CgkJCQkJPGlkPk5vZG9EZWlQYWdhbWVudGlTUEM8L2lkPgoJCQkJCTxkZXNjcmlwdGlvbj5MYSBjaGlhbWF0YSBub24gw6ggY29tcGF0aWJpbGUgY29uIGlsIG51b3ZvIG1vZGVsbG8gUFNQLjwvZGVzY3JpcHRpb24+CgkJCQk8L2ZhdWx0PgoJCQkJPGVzaXRvPktPPC9lc2l0bz4KCQkJPC9ub2RvQXR0aXZhUlBUUmlzcG9zdGE+CgkJPC9wcHQ6bm9kb0F0dGl2YVJQVFJpc3Bvc3RhPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $transaction = $this->ok_instance->transaction();
        $this->assertNull($transaction);

        $transaction = $this->ko_instance->transaction();
        $this->assertNull($transaction);
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->ok_instance->getIuvs());
        $this->assertNull($this->ko_instance->getIuvs());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->ok_instance->getTransferCount());
        $this->assertEquals(1, $this->ko_instance->getTransferCount());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('La chiamata non è compatibile con il nuovo modello PSP.', $this->ko_instance->getFaultString());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('PPT_MULTI_BENEFICIARIO', $this->ko_instance->getFaultCode());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->ok_instance->getPaEmittenti());
        $this->assertNull($this->ko_instance->getPaEmittenti());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('La chiamata non è compatibile con il nuovo modello PSP.', $this->ko_instance->getFaultDescription());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->ok_instance->getCcps());
        $this->assertNull($this->ko_instance->getCcps());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->ok_instance->transactionDetails(0));
        $this->assertNull($this->ko_instance->transactionDetails(0));
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->ok_instance->workflowEvent();
        $this->assertEquals(14, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_ok', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->ko_instance->workflowEvent();
        $this->assertEquals(14, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_ko', $workflow->getReadyColumnValue('event_id'));
        $this->assertNull($workflow->getReadyColumnValue('id_psp'));
        $this->assertNull($workflow->getReadyColumnValue('stazione'));
        $this->assertNull($workflow->getReadyColumnValue('canale'));
        $this->assertEquals('PPT_MULTI_BENEFICIARIO', $workflow->getReadyColumnValue('faultcode'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {

    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {

    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {

    }
}
