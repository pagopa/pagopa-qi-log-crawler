<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\cdInfoWisp;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\cdInfoWisp::class')]
class cdInfoWispTest extends TestCase
{

    protected cdInfoWisp $cdInfoWisp;

    protected function setUp(): void
    {
        $this->cdInfoWisp = new cdInfoWisp(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'cdInfoWisp',
                'sottotipoevento' => 'RESP',
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
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHNvYXA6RW52ZWxvcGUgeG1sbnM6cHB0PSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyIgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnRucz0iaHR0cDovL1B1bnRvQWNjZXNzb0NELnNwY29vcC5nb3YuaXQiIHhtbG5zOndzdT0iaHR0cDovL2RvY3Mub2FzaXMtb3Blbi5vcmcvd3NzLzIwMDQvMDEvb2FzaXMtMjAwNDAxLXdzcy13c3NlY3VyaXR5LXV0aWxpdHktMS4wLnhzZCI+Cgk8c29hcDpCb2R5PgoJCTxwcHQ6Y2RJbmZvV2lzcFJlc3BvbnNlIHhtbG5zOnBwdD0iaHR0cDovL3dzLnBhZ2FtZW50aS50ZWxlbWF0aWNpLmdvdi8iPgoJCQk8ZXNpdG8+T0s8L2VzaXRvPgoJCTwvcHB0OmNkSW5mb1dpc3BSZXNwb25zZT4KCTwvc29hcDpCb2R5Pgo8L3NvYXA6RW52ZWxvcGU+'
            ]
        );
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->cdInfoWisp->getCcps());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->cdInfoWisp->getIuvs());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->cdInfoWisp->getPaymentsCount());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->cdInfoWisp->getTransferCount());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->cdInfoWisp->getPaEmittenti());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->cdInfoWisp->transactionDetails(0));
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->cdInfoWisp->transaction());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->cdInfoWisp->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('cdInfoWisp', 'RESP'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_cdInfoWisp', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\cdInfoWisp::class, $this->cdInfoWisp->getMethodInterface());
    }
}
