<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\cdInfoWisp;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
#[TestDox('events\req\cdInfoWisp::class')]
class cdInfoWispTest extends TestCase
{

    protected cdinfoWisp $cdinfoWisp;

    protected function setUp(): void
    {
        $this->cdinfoWisp = new cdInfoWisp(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'cdInfoWisp',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_v2',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_cdInfoWisp',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpwcHQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6dG5zPSJodHRwOi8vUHVudG9BY2Nlc3NvQ0Quc3Bjb29wLmdvdi5pdCIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxwcHQ6Y2RJbmZvV2lzcD4KCQkJPGlkZW50aWZpY2F0aXZvRG9taW5pbz43Nzc3Nzc3Nzc3NzwvaWRlbnRpZmljYXRpdm9Eb21pbmlvPgoJCQk8aWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4wMTAwMDAwMDAwMDAwMDAxMDwvaWRlbnRpZmljYXRpdm9Vbml2b2NvVmVyc2FtZW50bz4KCQkJPGNvZGljZUNvbnRlc3RvUGFnYW1lbnRvPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDEwPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQkJPGlkUGFnYW1lbnRvPjEyMjJkZGU4LTUxM2QtNGFlNC04NjI3LWE3MjVlNTE3NzRmZTwvaWRQYWdhbWVudG8+CgkJPC9wcHQ6Y2RJbmZvV2lzcD4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'
            ]
        );
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->cdinfoWisp->transactionDetails(0));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\cdInfoWisp::class, $this->cdinfoWisp->getMethodInterface());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->cdinfoWisp->getPaEmittenti());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->cdinfoWisp->transaction());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->cdinfoWisp->getPaymentsCount());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->cdinfoWisp->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->cdinfoWisp->getCcps());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->cdinfoWisp->getTransferCount());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->cdinfoWisp->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('cdInfoWisp', 'REQ'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_cdInfoWisp', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));
    }
}
