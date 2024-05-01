<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\closePaymentV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\closePayment-v2::class')]
class closePaymentV2Test extends TestCase
{

    protected closePaymentV2 $payment;


    protected function setUp(): void
    {
        $this->payment = new closePaymentV2([
            'id' => 179,
            'date_event' => '2024-03-10',
            'inserted_timestamp' => '2024-03-10 10:27:01.197',
            'tipoevento' => 'closePayment-v2',
            'sottotipoevento' => 'RESP',
            'iddominio' => '77777777777',
            'iuv' => '01000000000000175',
            'ccp' => 't0000000000000000000000000000175',
            'noticenumber' => '301000000000000175',
            'creditorreferenceid' => '01000000000000175',
            'paymenttoken' => 't0000000000000000000000000000175',
            'psp' => 'PSP_V2',
            'stazione' => '77777777777_01',
            'canale' => '88888888888_01',
            'sessionid' => 'sessid_100176',
            'sessionidoriginal' => 'sessidoriginal_closepayment_v2',
            'uniqueid' => 'T000179',
            'payload' => 'ewogICAgIm91dGNvbWUiOiAiT0siCn0='
        ]);

    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->payment->isFaultEvent());
    }
    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->payment->workflowEvent();

        $this->assertEquals('28', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:01.197', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000179', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PSP_V2', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertNull($this->payment->getPaymentsCount());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->payment->getFaultCode());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->payment->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->payment->getFaultString());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->payment->getFaultDescription());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->payment->transaction());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\closePaymentV2::class, $this->payment->getMethodInterface());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000175'];
        $this->assertEquals($value, $this->payment->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000175'];
        $this->assertEquals($value, $this->payment->getCcps());
    }
}
