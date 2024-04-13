<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\sendPaymentOutcome;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\req\sendPaymentOutcome::class')]
class sendPaymentOutcomeTest extends TestCase
{

    protected sendPaymentOutcome $instance_1_SPO_OK;

    protected sendPaymentOutcome $instance_1_SPO_KO;


    protected sendPaymentOutcome $instance_no_token;


    public function setUp(): void
    {
        $this->instance_1_SPO_OK = new sendPaymentOutcome([
            'id' => 62,
            'date_event' => '2024-03-10',
            'inserted_timestamp' => '2024-03-10 08:07:00.201',
            'tipoevento' => 'sendPaymentOutcome',
            'sottotipoevento' => 'REQ',
            'iddominio' => '77777777777',
            'iuv' => '01000000000000034',
            'ccp' => 't0000000000000000000000000000034',
            'noticenumber' => '301000000000000034',
            'creditorreferenceid' => '01000000000000034',
            'paymenttoken' => 't0000000000000000000000000000034',
            'psp' => 'AGID_01',
            'stazione' => '77777777777_01',
            'canale' => '88888888888_01',
            'sessionid' => 'sessid_000039',
            'sessionidoriginal' => '',
            'uniqueid' => 'T000062',
            'payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDM0PC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPk9LPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
        ]);

        $this->instance_1_SPO_KO = new sendPaymentOutcome(
          [
              'id' => 63,
              'date_event' => '2024-03-11',
              'inserted_timestamp' => '2024-03-11 08:08:00.201',
              'tipoevento' => 'sendPaymentOutcome',
              'sottotipoevento' => 'REQ',
              'iddominio' => '77777777777',
              'iuv' => '01000000000000035',
              'ccp' => 't0000000000000000000000000000035',
              'noticenumber' => '301000000000000035',
              'creditorreferenceid' => '01000000000000035',
              'paymenttoken' => 't0000000000000000000000000000035',
              'psp' => 'AGID_01',
              'stazione' => '77777777777_01',
              'canale' => '88888888888_01',
              'sessionid' => 'sessid_000040',
              'sessionidoriginal' => '',
              'uniqueid' => 'T000063',
              'payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDM1PC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPktPPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
          ]
        );

        $this->instance_no_token = new sendPaymentOutcome(
            [
                'id' => 63,
                'date_event' => '2024-03-11',
                'inserted_timestamp' => '2024-03-11 08:09:00.201',
                'tipoevento' => 'sendPaymentOutcome',
                'sottotipoevento' => 'REQ',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000036',
                'ccp' => '',
                'noticenumber' => '301000000000000036',
                'creditorreferenceid' => '01000000000000036',
                'paymenttoken' => '',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_000041',
                'sessionidoriginal' => '',
                'uniqueid' => 'T000063',
                'payload' => 'PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgoJPHNvYXA6Qm9keT4KCQk8bnMyOnNlbmRQYXltZW50T3V0Y29tZVJlcSB4bWxuczpuczI9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6bnMzPSJodHRwOi8vd3MucGFnYW1lbnRpLnRlbGVtYXRpY2kuZ292LyI+CgkJCTxpZFBTUD5BR0lEXzAxPC9pZFBTUD4KCQkJPGlkQnJva2VyUFNQPjg4ODg4ODg4ODg4PC9pZEJyb2tlclBTUD4KCQkJPGlkQ2hhbm5lbD44ODg4ODg4ODg4OF8wMTwvaWRDaGFubmVsPgoJCQk8cGFzc3dvcmQ+eHh4eHh4eHg8L3Bhc3N3b3JkPgoJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDM2PC9wYXltZW50VG9rZW4+CgkJCTxvdXRjb21lPktPPC9vdXRjb21lPgoJCQk8ZGV0YWlscz4KCQkJCTxwYXltZW50TWV0aG9kPm90aGVyPC9wYXltZW50TWV0aG9kPgoJCQkJPGZlZT4xLjAwPC9mZWU+CgkJCQk8YXBwbGljYXRpb25EYXRlPjIwMjQtMDQtMDI8L2FwcGxpY2F0aW9uRGF0ZT4KCQkJCTx0cmFuc2ZlckRhdGU+MjAyNC0wNC0wMzwvdHJhbnNmZXJEYXRlPgoJCQk8L2RldGFpbHM+CgkJPC9uczI6c2VuZFBheW1lbnRPdXRjb21lUmVxPgoJPC9zb2FwOkJvZHk+Cjwvc29hcDpFbnZlbG9wZT4=',
            ]
        );

    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertEquals('01000000000000034', $this->instance_1_SPO_OK->getIuv());
        $this->assertEquals('01000000000000035', $this->instance_1_SPO_KO->getIuv());
        $this->assertEquals('01000000000000036', $this->instance_no_token->getIuv());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\sendPaymentOutcome::class, $this->instance_1_SPO_OK->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\sendPaymentOutcome::class, $this->instance_1_SPO_KO->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\sendPaymentOutcome::class, $this->instance_no_token->getMethodInterface());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals('1', $this->instance_1_SPO_OK->getPaymentsCount());
        $this->assertEquals('1', $this->instance_1_SPO_KO->getPaymentsCount());
        $this->assertEquals('1', $this->instance_no_token->getPaymentsCount());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->instance_1_SPO_OK->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_1_SPO_KO->getCanale());
        $this->assertEquals('88888888888_01', $this->instance_no_token->getCanale());
    }
    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000034'], $this->instance_1_SPO_OK->getIuvs());
        $this->assertEquals(['01000000000000035'], $this->instance_1_SPO_KO->getIuvs());
        $this->assertEquals(['01000000000000036'], $this->instance_no_token->getIuvs());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_1_SPO_OK->getFaultCode());
        $this->assertNull($this->instance_1_SPO_KO->getFaultCode());
        $this->assertNull($this->instance_no_token->getFaultCode());
    }
    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertEquals('t0000000000000000000000000000034', $this->instance_1_SPO_OK->getPaymentToken());
        $this->assertEquals('t0000000000000000000000000000035', $this->instance_1_SPO_KO->getPaymentToken());
        $this->assertEquals('t0000000000000000000000000000036', $this->instance_no_token->getPaymentToken());
    }


    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000034', $this->instance_1_SPO_OK->getCcp());
        $this->assertEquals('t0000000000000000000000000000035', $this->instance_1_SPO_KO->getCcp());
        $this->assertEquals('t0000000000000000000000000000036', $this->instance_no_token->getCcp());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('77777777777', $this->instance_1_SPO_OK->getBrokerPa());
        $this->assertEquals('77777777777', $this->instance_1_SPO_KO->getBrokerPa());
        $this->assertEquals('77777777777', $this->instance_no_token->getBrokerPa());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->instance_1_SPO_OK->getTransferCount());
        $this->assertNull($this->instance_1_SPO_KO->getTransferCount());
        $this->assertNull($this->instance_no_token->getTransferCount());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance_1_SPO_OK->isFaultEvent());
        $this->assertFalse($this->instance_1_SPO_KO->isFaultEvent());
        $this->assertFalse($this->instance_no_token->isFaultEvent());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance_1_SPO_OK->getFaultDescription());
        $this->assertNull($this->instance_1_SPO_KO->getFaultDescription());
        $this->assertNull($this->instance_no_token->getFaultDescription());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance_1_SPO_OK->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_1_SPO_KO->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_no_token->getPaEmittenti());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance_1_SPO_OK->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_1_SPO_KO->getBrokerPsp());
        $this->assertEquals('88888888888', $this->instance_no_token->getBrokerPsp());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_1_SPO_OK->getFaultString());
        $this->assertNull($this->instance_1_SPO_KO->getFaultString());
        $this->assertNull($this->instance_no_token->getFaultString());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1_SPO_OK->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_1_SPO_KO->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_no_token->getPaEmittente());

    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000034', $this->instance_1_SPO_OK->getIuv());
        $this->assertEquals('01000000000000035', $this->instance_1_SPO_KO->getIuv());
        $this->assertEquals('01000000000000036', $this->instance_no_token->getIuv());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000034'], $this->instance_1_SPO_OK->getCcps());
        $this->assertEquals(['t0000000000000000000000000000035'], $this->instance_1_SPO_KO->getCcps());
        $this->assertEquals(['t0000000000000000000000000000036'], $this->instance_no_token->getCcps());
    }


    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('77777777777_01', $this->instance_1_SPO_OK->getStazione());
        $this->assertEquals('77777777777_01', $this->instance_1_SPO_KO->getStazione());
        $this->assertEquals('77777777777_01', $this->instance_no_token->getStazione());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('301000000000000034', $this->instance_1_SPO_OK->getNoticeNumber());
        $this->assertEquals('301000000000000035', $this->instance_1_SPO_KO->getNoticeNumber());
        $this->assertEquals('301000000000000036', $this->instance_no_token->getNoticeNumber());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->instance_1_SPO_OK->getPsp());
        $this->assertEquals('AGID_01', $this->instance_1_SPO_KO->getPsp());
        $this->assertEquals('AGID_01', $this->instance_no_token->getPsp());
    }

}
