<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\closePaymentV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\req\closePayment-v2::class')]
class closePaymentV2Test extends TestCase
{

    protected closePaymentV2 $ok_instance;


    protected function setUp(): void
    {
        $this->ok_instance = new closePaymentV2([
            'date_event' => '2024-03-10',
            'inserted_timestamp' => '2024-03-10 10:27:00.197',
            'tipoevento' => 'closePayment-v2',
            'sottotipoevento' => 'REQ',
            'iddominio' => '77777777777',
            'iuv' => '01000000000000176',
            'ccp' => 't0000000000000000000000000000176',
            'noticenumber' => '301000000000000176',
            'creditorreferenceid' => '01000000000000176',
            'paymenttoken' => 't0000000000000000000000000000176',
            'psp' => 'PSP_V2',
            'stazione' => '77777777777_01',
            'canale' => '88888888888_01',
            'sessionid' => 'sessid_100176',
            'sessionidoriginal' => 'sessidoriginal_closepayment_v2',
            'uniqueid' => 'T000178',
            'payload' => 'ewogICAgImFkZGl0aW9uYWxQYXltZW50SW5mb3JtYXRpb25zIjogewogICAgICAgICJhdXRob3JpemF0aW9uQ29kZSI6ICIxMTExMTUiLAogICAgICAgICJmZWUiOiAiMi4wMCIsCiAgICAgICAgIm91dGNvbWVQYXltZW50R2F0ZXdheSI6ICJPSyIsCiAgICAgICAgInJybiI6ICIwMDAwMDAwMDAwMDkiLAogICAgICAgICJ0aW1lc3RhbXBPcGVyYXRpb24iOiAiMjAyNC0wNC0yNFQwOTo0ODo1NyIsCiAgICAgICAgInRvdGFsQW1vdW50IjogIjI0Mi4wMCIKICAgIH0sCiAgICAiZmVlIjogMi4wLAogICAgImlkQnJva2VyUFNQIjogIjg4ODg4ODg4ODg4IiwKICAgICJpZENoYW5uZWwiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgImlkUFNQIjogIlBTUF9DUCIsCiAgICAib3V0Y29tZSI6ICJPSyIsCiAgICAicGF5bWVudE1ldGhvZCI6ICJDUCIsCiAgICAicGF5bWVudFRva2VucyI6IFsKICAgICAgICAidDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxNzUiLAogICAgICAgICJ0MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE3NiIKICAgIF0sCiAgICAidGltZXN0YW1wT3BlcmF0aW9uIjogIjIwMjQtMDQtMjRUMDc6NDg6NTcuNDcyWiIsCiAgICAidG90YWxBbW91bnQiOiAyMDIuMCwKICAgICJ0cmFuc2FjdGlvbkRldGFpbHMiOiB7CiAgICAgICAgImluZm8iOiB7CiAgICAgICAgICAgICJicmFuZCI6ICJNQyIsCiAgICAgICAgICAgICJicmFuZExvZ28iOiAiaHR0cHM6Ly9hc3NldHMuY2RuLnBsYXRmb3JtLnBhZ29wYS5pdC9jcmVkaXRjYXJkL21hc3RlcmNhcmQucG5nIiwKICAgICAgICAgICAgImNsaWVudElkIjogIkNIRUNLT1VUIiwKICAgICAgICAgICAgInBheW1lbnRNZXRob2ROYW1lIjogIkNBUkRTIiwKICAgICAgICAgICAgInR5cGUiOiAiQ1AiCiAgICAgICAgfSwKICAgICAgICAidHJhbnNhY3Rpb24iOiB7CiAgICAgICAgICAgICJhbW91bnQiOiAyMDAwMCwKICAgICAgICAgICAgImF1dGhvcml6YXRpb25Db2RlIjogIjExMTExNSIsCiAgICAgICAgICAgICJjcmVhdGlvbkRhdGUiOiAiMjAyNC0wNC0yNFQwNzo0ODoxNC45MjAyMDY1MTVaIiwKICAgICAgICAgICAgImZlZSI6IDIwMCwKICAgICAgICAgICAgImdyYW5kVG90YWwiOiAyMDIwMCwKICAgICAgICAgICAgInBheW1lbnRHYXRld2F5IjogIk5QRyIsCiAgICAgICAgICAgICJwc3AiOiB7CiAgICAgICAgICAgICAgICAiYnJva2VyTmFtZSI6ICI4ODg4ODg4ODg4OCIsCiAgICAgICAgICAgICAgICAiYnVzaW5lc3NOYW1lIjogIlBzcENwIiwKICAgICAgICAgICAgICAgICJpZENoYW5uZWwiOiAiODg4ODg4ODg4ODhfMDEiLAogICAgICAgICAgICAgICAgImlkUHNwIjogIlBTUF9DUCIsCiAgICAgICAgICAgICAgICAicHNwT25VcyI6IGZhbHNlCiAgICAgICAgICAgIH0sCiAgICAgICAgICAgICJycm4iOiAiMDAwMDAwMDAwMDA5IiwKICAgICAgICAgICAgInRpbWVzdGFtcE9wZXJhdGlvbiI6ICIyMDI0LTA0LTI0VDA3OjQ4OjU3LjQ3MloiLAogICAgICAgICAgICAidHJhbnNhY3Rpb25JZCI6ICIwOGY2MTY2ZjNmOTM0ZTZiOGFlNTQ3MjZkNDVlMTJhOCIsCiAgICAgICAgICAgICJ0cmFuc2FjdGlvblN0YXR1cyI6ICJDb25mZXJtYXRvIgogICAgICAgIH0sCiAgICAgICAgInVzZXIiOiB7CiAgICAgICAgICAgICJ0eXBlIjogIkdVRVNUIgogICAgICAgIH0KICAgIH0sCiAgICAidHJhbnNhY3Rpb25JZCI6ICIwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMCIKfQ==',
        ]);
    }

    #[TestDox('getCacheKeyAttempt()')]
    public function testGetCacheKeyAttempt()
    {
        $key = base64_encode(sprintf('sessionOriginal_%s', $this->ok_instance->getSessionIdOriginal()));
        $this->assertEquals($key, $this->ok_instance->getCacheKeyAttempt());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000176'];
        $this->assertEquals($value, $this->ok_instance->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->ok_instance->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->ok_instance->getTransferCount());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->ok_instance->workflowEvent();

        $this->assertEquals('27', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('PSP_V2', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));

        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000176'];
        $this->assertEquals($value, $this->ok_instance->getCcps());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\closePaymentV2::class, $this->ok_instance->getMethodInterface());
    }

    #[TestDox('getCacheKeyPayment()')]
    public function testGetCacheKeyPayment()
    {
        $key = base64_encode(sprintf('sessionOriginal_%s', $this->ok_instance->getSessionIdOriginal()));
        $this->assertEquals($key, $this->ok_instance->getCacheKeyPayment());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(2, $this->ok_instance->getPaymentsCount());
    }
}
