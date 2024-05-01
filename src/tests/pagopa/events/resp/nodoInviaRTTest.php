<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\nodoInviaRT;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\req\nodoInviaRT::class')]
class nodoInviaRTTest extends TestCase
{

    protected nodoInviaRT $ok_instance;

    protected nodoInviaRT $ko_instance;


    protected function setUp(): void
    {
        $this->ok_instance = new nodoInviaRT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoInviaRT',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_01',
                'sessionidoriginal' => 'sessoriginal_01',
                'uniqueid' => 'unique_id_nodoInviaRT_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c00000000000000010',
                'noticeNumber' => '',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c00000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCQkJPG5vZG9JbnZpYVJUUmlzcG9zdGE+CgkJCQk8ZXNpdG8+T0s8L2VzaXRvPgoJCQk8L25vZG9JbnZpYVJUUmlzcG9zdGE+CgkJPC9wcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'
            ]
        );

        $this->ko_instance = new nodoInviaRT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoInviaRT',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_01',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_nodoInviaRT_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c00000000000000010',
                'noticeNumber' => '',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c00000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpiYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L0JhckNvZGVfR1MxXzEyOF9Nb2RpZmllZCIgeG1sbnM6cGF5X2k9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iIHhtbG5zOnFyYz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L1FyQ29kZSIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb1BTUC5zcGNvb3AuZ292Lml0L3NlcnZpemkvUGFnYW1lbnRpVGVsZW1hdGljaVBzcE5vZG8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6bm9kb0ludmlhUlRSaXNwb3N0YT4KCQkJPG5vZG9JbnZpYVJUUmlzcG9zdGE+CgkJCQk8ZmF1bHQ+CgkJCQkJPGZhdWx0Q29kZT5QUFRfUlRfRFVQTElDQVRBPC9mYXVsdENvZGU+CgkJCQkJPGZhdWx0U3RyaW5nPkxhIFJUIMOoIGdpw6Agc3RhdGEgZ2VuZXJhdGEgZGFsIE5vZG88L2ZhdWx0U3RyaW5nPgoJCQkJCTxpZD5Ob2RvRGVpUGFnYW1lbnRpU1BDPC9pZD4KCQkJCQk8ZGVzY3JpcHRpb24+TGEgUlQgw6ggZ2nDoCBzdGF0YSBnZW5lcmF0YSBkYWwgTm9kbzwvZGVzY3JpcHRpb24+CgkJCQk8L2ZhdWx0PgoJCQkJPGVzaXRvPktPPC9lc2l0bz4KCQkJPC9ub2RvSW52aWFSVFJpc3Bvc3RhPgoJCTwvcHB0Om5vZG9JbnZpYVJUUmlzcG9zdGE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoInviaRT::class, $this->ok_instance->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\nodoInviaRT::class, $this->ko_instance->getMethodInterface());

    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->ok_instance->getPaymentsCount());
        $this->assertNull($this->ko_instance->getPaymentsCount());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->ok_instance->getFaultString());
        $this->assertEquals('La RT è già stata generata dal Nodo', $this->ko_instance->getFaultString());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->ok_instance->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->ko_instance->getPaEmittenti());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->ok_instance->workflowEvent();
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_nodoInviaRT_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->ko_instance->workflowEvent();
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_nodoInviaRT_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PPT_RT_DUPLICATA', $workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->ok_instance->getFaultDescription());
        $this->assertEquals('La RT è già stata generata dal Nodo', $this->ko_instance->getFaultDescription());

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->ok_instance->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->ko_instance->getIuvs());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->ok_instance->getFaultCode());
        $this->assertEquals('PPT_RT_DUPLICATA', $this->ko_instance->getFaultCode());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->ok_instance->isFaultEvent());
        $this->assertTrue($this->ko_instance->isFaultEvent());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount());
        $this->assertNull($this->ko_instance->getTransferCount());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->ok_instance->transaction());
        $this->assertNull($this->ko_instance->transaction());
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
        $this->assertEquals(['c00000000000000010'], $this->ok_instance->getCcps());
        $this->assertEquals(['c00000000000000010'], $this->ko_instance->getCcps());
    }
}
