<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\nodoAttivaRPT;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\nodoAttivaRPT::class')]
class nodoAttivaRPTTest extends TestCase
{
    protected nodoAttivaRPT $data_instance;

    protected nodoAttivaRPT $no_data_instance;

    protected function setUp(): void
    {
        $this->data_instance = new nodoAttivaRPT([
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoAttivaRPT',
                'sottotipoevento' => 'REQ',
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
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8cHB0Om5vZG9BdHRpdmFSUFQgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQUGFnYW1lbnRvPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1BQYWdhbWVudG8+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZVBhZ2FtZW50bz44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGVQYWdhbWVudG8+CgkJCTxjb2RpZmljYUluZnJhc3RydXR0dXJhUFNQPlFSLUNPREU8L2NvZGlmaWNhSW5mcmFzdHJ1dHR1cmFQU1A+CgkJCTxjb2RpY2VJZFJQVD4KCQkJCTxxcmM6UXJDb2RlPgoJCQkJCTxxcmM6Q0Y+Nzc3Nzc3Nzc3Nzc8L3FyYzpDRj4KCQkJCQk8cXJjOkF1eERpZ2l0PjM8L3FyYzpBdXhEaWdpdD4KCQkJCQk8cXJjOkNvZElVVj4wMTAwMDAwMDAwMDAwMDAxMDwvcXJjOkNvZElVVj4KCQkJCTwvcXJjOlFyQ29kZT4KCQkJPC9jb2RpY2VJZFJQVD4KCQkJPGRhdGlQYWdhbWVudG9QU1A+CgkJCQk8aW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPjI4LjAwPC9pbXBvcnRvU2luZ29sb1ZlcnNhbWVudG8+CgkJCTwvZGF0aVBhZ2FtZW50b1BTUD4KCQk8L3BwdDpub2RvQXR0aXZhUlBUPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4='
        ]);

        $this->no_data_instance = new nodoAttivaRPT([
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoAttivaRPT',
                'sottotipoevento' => 'REQ',
                'psp' => '',
                'stazione' => '',
                'canale' => '',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_no_data',
                'iddominio' => '',
                'iuv' => '',
                'ccp' => '',
                'noticeNumber' => '',
                'creditorreferenceid' => '',
                'paymenttoken' => '',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXA6Qm9keT4KCQk8cHB0Om5vZG9BdHRpdmFSUFQgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZGVudGlmaWNhdGl2b1BTUD5BR0lEXzAxPC9pZGVudGlmaWNhdGl2b1BTUD4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BTUD44ODg4ODg4ODg4ODwvaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQPgoJCQk8aWRlbnRpZmljYXRpdm9DYW5hbGU+ODg4ODg4ODg4ODhfMDE8L2lkZW50aWZpY2F0aXZvQ2FuYWxlPgoJCQk8Y29kaWNlQ29udGVzdG9QYWdhbWVudG8+YzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L2NvZGljZUNvbnRlc3RvUGFnYW1lbnRvPgoJCQk8aWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvUFNQUGFnYW1lbnRvPjg4ODg4ODg4ODg4PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QU1BQYWdhbWVudG8+CgkJCTxpZGVudGlmaWNhdGl2b0NhbmFsZVBhZ2FtZW50bz44ODg4ODg4ODg4OF8wMTwvaWRlbnRpZmljYXRpdm9DYW5hbGVQYWdhbWVudG8+CgkJCTxjb2RpZmljYUluZnJhc3RydXR0dXJhUFNQPlFSLUNPREU8L2NvZGlmaWNhSW5mcmFzdHJ1dHR1cmFQU1A+CgkJCTxjb2RpY2VJZFJQVD4KCQkJCTxxcmM6UXJDb2RlPgoJCQkJCTxxcmM6Q0Y+Nzc3Nzc3Nzc3Nzc8L3FyYzpDRj4KCQkJCQk8cXJjOkF1eERpZ2l0PjM8L3FyYzpBdXhEaWdpdD4KCQkJCQk8cXJjOkNvZElVVj4wMTAwMDAwMDAwMDAwMDAxMDwvcXJjOkNvZElVVj4KCQkJCTwvcXJjOlFyQ29kZT4KCQkJPC9jb2RpY2VJZFJQVD4KCQkJPGRhdGlQYWdhbWVudG9QU1A+CgkJCQk8aW1wb3J0b1NpbmdvbG9WZXJzYW1lbnRvPjI4LjAwPC9pbXBvcnRvU2luZ29sb1ZlcnNhbWVudG8+CgkJCTwvZGF0aVBhZ2FtZW50b1BTUD4KCQk8L3BwdDpub2RvQXR0aXZhUlBUPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4='
        ]);
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->data_instance->getFaultCode());
        $this->assertNull($this->no_data_instance->getFaultCode());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->data_instance->workflowEvent();
        $this->assertEquals(13, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_ok', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));


        $workflow = $this->no_data_instance->workflowEvent();
        $this->assertEquals(13, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_no_data', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertNull($workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoAttivaRPT::class, $this->data_instance->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoAttivaRPT::class, $this->no_data_instance->getMethodInterface());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->data_instance->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->no_data_instance->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->data_instance->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->no_data_instance->getPaEmittenti());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->data_instance->transactionDetails(0));
        $this->assertNull($this->no_data_instance->transactionDetails(0));
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->data_instance->isFaultEvent());
        $this->assertFalse($this->no_data_instance->isFaultEvent());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->data_instance->getCcps());
        $this->assertEquals(['c0000000000000000000000000000010'], $this->no_data_instance->getCcps());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->data_instance->getFaultString());
        $this->assertNull($this->no_data_instance->getFaultString());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->data_instance->getFaultDescription());
        $this->assertNull($this->no_data_instance->getFaultDescription());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->data_instance->getPaymentsCount());
        $this->assertEquals(1, $this->no_data_instance->getPaymentsCount());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->data_instance->getTransferCount());
        $this->assertNull($this->no_data_instance->getTransferCount());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $transaction = $this->data_instance->transaction();
        $this->assertEquals('01000000000000010', $transaction->getReadyColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getReadyColumnValue('pa_emittente'));
        $this->assertEquals('c0000000000000000000000000000010', $transaction->getReadyColumnValue('token_ccp'));
        $this->assertEquals('301000000000000010', $transaction->getReadyColumnValue('notice_id'));
        $this->assertEquals('77777777777_01', $transaction->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $transaction->getReadyColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getReadyColumnValue('touchpoint'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));
        $this->assertNull($transaction->getReadyColumnValue('importo'));
        $this->assertNull($transaction->getReadyColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('date_wf'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));


        $transaction = $this->no_data_instance->transaction();
        $this->assertEquals('01000000000000010', $transaction->getReadyColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getReadyColumnValue('pa_emittente'));
        $this->assertEquals('c0000000000000000000000000000010', $transaction->getReadyColumnValue('token_ccp'));
        $this->assertEquals('301000000000000010', $transaction->getReadyColumnValue('notice_id'));
        $this->assertEquals('88888888888_01', $transaction->getReadyColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getReadyColumnValue('touchpoint'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));
        $this->assertNull($transaction->getReadyColumnValue('stazione'));
        $this->assertNull($transaction->getReadyColumnValue('importo'));
        $this->assertNull($transaction->getReadyColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('date_wf'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));
    }
}
