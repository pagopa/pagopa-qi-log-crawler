<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\closePaymentV1;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\closePayment-v1::class')]
class closePaymentV1Test extends TestCase
{

    protected closePaymentV1 $event;

    protected function setUp(): void
    {
        $this->event = new closePaymentV1(
            [
                'date_event' => '2024-03-10',
                'inserted_timestamp' => '2024-03-10 10:27:00.197',
                'tipoevento' => 'closePayment-v1',
                'sottotipoevento' => 'RESP',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000176',
                'ccp' => 't0000000000000000000000000000176',
                'noticenumber' => '301000000000000176',
                'creditorreferenceid' => '01000000000000176',
                'paymenttoken' => 't0000000000000000000000000000176',
                'psp' => 'PSP_V1',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_100176',
                'sessionidoriginal' => 'sessidoriginal_closepayment_v1',
                'uniqueid' => 'T000178',
                'payload' => 'eyJlc2l0byI6Ik9LIn0=',
            ]
        );
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->event->getTransferCount());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->event->getPaEmittenti());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\closePaymentV1::class, $this->event->getMethodInterface());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->event->getFaultDescription());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->event->getPaymentsCount());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->event->getFaultCode());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->event->getFaultString());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000176'];
        $this->assertEquals($value, $this->event->getCcps());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->event->workflowEvent();
        $this->assertEquals('30', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PSP_V1', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->event->isFaultEvent());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000176'];
        $this->assertEquals($value, $this->event->getIuvs());
    }
}
