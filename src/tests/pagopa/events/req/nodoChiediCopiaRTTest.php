<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\nodoChiediCopiaRT;
use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\nodoChiediCopiaRTTest::class')]
class nodoChiediCopiaRTTest extends TestCase
{

    protected nodoChiediCopiaRT $nodoChiediCopiaRT;

    protected function setUp(): void
    {
        $this->nodoChiediCopiaRT = new nodoChiediCopiaRT(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'nodoChiediCopiaRT',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_0010',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activateIO_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c000000000000000010',
                'noticeNumber' => '',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c000000000000000010',
                'payload' => 'PHNvYXBlbnY6RW52ZWxvcGUgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzZD0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPgoJPHNvYXBlbnY6Qm9keT4KCQk8bm9kb0NoaWVkaUNvcGlhUlQgeG1sbnM9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIj4KCQkJPGlkZW50aWZpY2F0aXZvSW50ZXJtZWRpYXJpb1BBIHhtbG5zPSIiPjc3Nzc3Nzc3Nzc3PC9pZGVudGlmaWNhdGl2b0ludGVybWVkaWFyaW9QQT4KCQkJPGlkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEEgeG1sbnM9IiI+Nzc3Nzc3Nzc3NzdfMDE8L2lkZW50aWZpY2F0aXZvU3RhemlvbmVJbnRlcm1lZGlhcmlvUEE+CgkJCTxwYXNzd29yZCB4bWxucz0iIj5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CgkJCTxpZGVudGlmaWNhdGl2b0RvbWluaW8geG1sbnM9IiI+Nzc3Nzc3Nzc3Nzc8L2lkZW50aWZpY2F0aXZvRG9taW5pbz4KCQkJPGlkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8geG1sbnM9IiI+MDEwMDAwMDAwMDAwMDAwMTA8L2lkZW50aWZpY2F0aXZvVW5pdm9jb1ZlcnNhbWVudG8+CgkJCTxjb2RpY2VDb250ZXN0b1BhZ2FtZW50byB4bWxucz0iIj5jMDAwMDAwMDAwMDAwMDAwMDEwPC9jb2RpY2VDb250ZXN0b1BhZ2FtZW50bz4KCQk8L25vZG9DaGllZGlDb3BpYVJUPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->nodoChiediCopiaRT->getTransferCount());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->nodoChiediCopiaRT->transaction());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['c000000000000000010'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getCcps());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\nodoChiediCopiaRT::class, $this->nodoChiediCopiaRT->getMethodInterface());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->nodoChiediCopiaRT->workflowEvent();
        $this->assertEquals(MapEvents::getMethodId('nodoChiediCopiaRT', 'REQ'), $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activateIO_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));

        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getPaEmittenti());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->nodoChiediCopiaRT->getIuvs());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->nodoChiediCopiaRT->transactionDetails(0));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->nodoChiediCopiaRT->getPaymentsCount());
    }
}
