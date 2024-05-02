<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\closePaymentV1;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertNull;

#[TestDox('events\req\closePayment-v1::class')]
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
                'sottotipoevento' => 'REQ',
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
                'sessionidoriginal' => 'sessidoriginal_closepayment_v2',
                'uniqueid' => 'T000178',
                'payload' => 'ewogICAgImFkZGl0aW9uYWxQYXltZW50SW5mb3JtYXRpb25zIjogewogICAgICAgICJhdXRob3JpemF0aW9uQ29kZSI6ICJQMDAwMDAwMDAwMDAwMDAwMDAwMDAwMSIsCiAgICAgICAgIm91dGNvbWVQYXltZW50R2F0ZXdheSI6ICIwIiwKICAgICAgICAidHJhbnNhY3Rpb25JZCI6ICIxMDAwMDAwMDEiCiAgICB9LAogICAgImZlZSI6IDAuNSwKICAgICJpZGVudGlmaWNhdGl2b0NhbmFsZSI6ICI4ODg4ODg4ODg4OF8wMSIsCiAgICAiaWRlbnRpZmljYXRpdm9JbnRlcm1lZGlhcmlvIjogIjg4ODg4ODg4ODg4IiwKICAgICJpZGVudGlmaWNhdGl2b1BzcCI6ICJBR0lEXzAxIiwKICAgICJvdXRjb21lIjogIk9LIiwKICAgICJwYXltZW50VG9rZW5zIjogWwogICAgICAgICJ0MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE3NiIKICAgIF0sCiAgICAicHNwVHJhbnNhY3Rpb25JZCI6ICIyMjIyMjIyMjIiLAogICAgInRpbWVzdGFtcE9wZXJhdGlvbiI6ICIyMDI0LTA1LTAyVDE1OjIxOjIwLjQ5OVoiLAogICAgInRpcG9WZXJzYW1lbnRvIjogIkJQQVkiLAogICAgInRvdGFsQW1vdW50IjogMjA4LjAwCn0=',
            ]
        );
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->event->getPaymentsCount());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->event->getFaultString());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->event->getPaEmittenti());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000176'];
        $this->assertEquals($value, $this->event->getCcps());
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->event->transaction());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->event->getTransferCount());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->event->isFaultEvent());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->event->getFaultCode());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000176'];
        $this->assertEquals($value, $this->event->getIuvs());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->event->transactionDetails(0));
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\closePaymentV1::class, $this->event->getMethodInterface());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->event->workflowEvent();
        $this->assertEquals('29', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PSP_V1', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));


    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->event->getFaultDescription());
    }
}
