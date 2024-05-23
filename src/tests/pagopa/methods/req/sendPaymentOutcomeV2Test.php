<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\sendPaymentOutcomeV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\req\sendPaymentOutcomeV2::class')]
class sendPaymentOutcomeV2Test extends TestCase
{

    protected sendPaymentOutcomeV2 $payment;

    protected sendPaymentOutcomeV2 $multi_token;

    protected sendPaymentOutcomeV2 $details;


    protected function setUp(): void
    {
        $this->payment = new sendPaymentOutcomeV2(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgogIDxzb2FwOkJvZHk+CiAgICA8bnMzOnNlbmRQYXltZW50T3V0Y29tZVYyUmVxdWVzdCB4bWxuczpuczI9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JQc3AueHNkIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpuczU9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIj4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CiAgICAgIDxwYXltZW50VG9rZW5zPgogICAgICAgIDxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L3BheW1lbnRUb2tlbj4KICAgICAgPC9wYXltZW50VG9rZW5zPgogICAgICA8b3V0Y29tZT5PSzwvb3V0Y29tZT4KICAgIDwvbnMzOnNlbmRQYXltZW50T3V0Y29tZVYyUmVxdWVzdD4KICA8L3NvYXA6Qm9keT4KPC9zb2FwOkVudmVsb3BlPg=='));
        $this->multi_token = new sendPaymentOutcomeV2(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgogIDxzb2FwOkJvZHk+CiAgICA8bnMzOnNlbmRQYXltZW50T3V0Y29tZVYyUmVxdWVzdCB4bWxuczpuczI9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JQc3AueHNkIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpuczU9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIj4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CiAgICAgIDxwYXltZW50VG9rZW5zPgogICAgICAgIDxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L3BheW1lbnRUb2tlbj4KICAgICAgICA8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyPC9wYXltZW50VG9rZW4+CiAgICAgICAgPHBheW1lbnRUb2tlbj50MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMzwvcGF5bWVudFRva2VuPgogICAgICA8L3BheW1lbnRUb2tlbnM+CiAgICAgIDxvdXRjb21lPk9LPC9vdXRjb21lPgogICAgPC9uczM6c2VuZFBheW1lbnRPdXRjb21lVjJSZXF1ZXN0PgogIDwvc29hcDpCb2R5Pgo8L3NvYXA6RW52ZWxvcGU+'));
        $this->details = new sendPaymentOutcomeV2(base64_decode('PHNvYXA6RW52ZWxvcGUgeG1sbnM6c29hcD0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iPgogIDxzb2FwOkJvZHk+CiAgICA8bnMzOnNlbmRQYXltZW50T3V0Y29tZVYyUmVxdWVzdCB4bWxuczpuczI9Imh0dHA6Ly93d3cuZGlnaXRwYS5nb3YuaXQvc2NoZW1hcy8yMDExL1BhZ2FtZW50aS8iIHhtbG5zOm5zMz0iaHR0cDovL3BhZ29wYS1hcGkucGFnb3BhLmdvdi5pdC9ub2RlL25vZGVGb3JQc3AueHNkIiB4bWxuczpuczQ9Imh0dHA6Ly93cy5wYWdhbWVudGkudGVsZW1hdGljaS5nb3YvIiB4bWxuczpuczU9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIj4KICAgICAgPGlkUFNQPkFHSURfMDE8L2lkUFNQPgogICAgICA8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgogICAgICA8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAxPC9pZENoYW5uZWw+CiAgICAgIDxwYXNzd29yZD5QTEFDRUhPTERFUjwvcGFzc3dvcmQ+CiAgICAgIDxwYXltZW50VG9rZW5zPgogICAgICAgIDxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDE8L3BheW1lbnRUb2tlbj4KICAgICAgPC9wYXltZW50VG9rZW5zPgogICAgICA8b3V0Y29tZT5PSzwvb3V0Y29tZT4KICAgICAgPGRldGFpbHM+CiAgICAgIAk8cGF5bWVudE1ldGhvZD5NRVRPRE88L3BheW1lbnRNZXRob2Q+CiAgICAgIAk8cGF5bWVudENoYW5uZWw+Q0FOQUxFPC9wYXltZW50Q2hhbm5lbD4KICAgICAgPC9kZXRhaWxzPgogICAgPC9uczM6c2VuZFBheW1lbnRPdXRjb21lVjJSZXF1ZXN0PgogIDwvc29hcDpCb2R5Pgo8L3NvYXA6RW52ZWxvcGU+'));
    }


    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->payment->getPaymentMetaDataKey());
        $this->assertNull($this->multi_token->getPaymentMetaDataKey());
        $this->assertNull($this->details->getPaymentMetaDataKey());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->payment->getTransferMetaDataKey());
        $this->assertNull($this->multi_token->getTransferMetaDataKey());
        $this->assertNull($this->details->getTransferMetaDataKey());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->payment->getPaymentsCount());
        $this->assertEquals(3, $this->multi_token->getPaymentsCount());
        $this->assertEquals(1, $this->details->getPaymentsCount());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->payment->getToken(0));
        $this->assertNull($this->payment->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->multi_token->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->multi_token->getToken(1));
        $this->assertEquals('t0000000000000000000000000000003', $this->multi_token->getToken(2));
        $this->assertNull($this->multi_token->getToken(3));

        $this->assertEquals('t0000000000000000000000000000001', $this->details->getToken(0));
        $this->assertNull($this->details->getToken(1));

    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $values = [
            't0000000000000000000000000000001',
            't0000000000000000000000000000002',
            't0000000000000000000000000000003'
        ];
        $this->assertEquals(array($values[0]), $this->payment->getCcps());
        $this->assertEquals($values, $this->multi_token->getCcps());
        $this->assertEquals(array($values[0]), $this->details->getCcps());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->payment->getPsp());
        $this->assertEquals('AGID_01', $this->multi_token->getPsp());
        $this->assertEquals('AGID_01', $this->details->getPsp());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertNull($this->payment->getImporto());
        $this->assertNull($this->multi_token->getImporto());
        $this->assertNull($this->details->getImporto());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->payment->getPaymentMetaDataValue());
        $this->assertNull($this->multi_token->getPaymentMetaDataValue());
        $this->assertNull($this->details->getPaymentMetaDataValue());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->payment->getTransferMetaDataValue());
        $this->assertNull($this->multi_token->getTransferMetaDataValue());
        $this->assertNull($this->details->getTransferMetaDataValue());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->payment->getPaEmittente());
        $this->assertNull($this->multi_token->getPaEmittente());
        $this->assertNull($this->details->getPaEmittente());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertNull($this->payment->getTransferIban());
        $this->assertNull($this->multi_token->getTransferIban());
        $this->assertNull($this->details->getTransferIban());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->payment->getCcp(0));
        $this->assertNull($this->payment->getCcp(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->multi_token->getCcp(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->multi_token->getCcp(1));
        $this->assertEquals('t0000000000000000000000000000003', $this->multi_token->getCcp(2));
        $this->assertNull($this->multi_token->getCcp(3));

        $this->assertEquals('t0000000000000000000000000000001', $this->details->getCcp(0));
        $this->assertNull($this->details->getCcp(1));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertNull($this->payment->getIuvs());
        $this->assertNull($this->multi_token->getIuvs());
        $this->assertNull($this->details->getIuvs());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertNull($this->payment->getPaEmittenti());
        $this->assertNull($this->multi_token->getPaEmittenti());
        $this->assertNull($this->details->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertNull($this->payment->getTransferCount());
        $this->assertNull($this->multi_token->getTransferCount());
        $this->assertNull($this->details->getTransferCount());
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->payment->outcome());
        $this->assertEquals('OK', $this->multi_token->outcome());
        $this->assertEquals('OK', $this->details->outcome());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertNull($this->payment->getTransferAmount());
        $this->assertNull($this->multi_token->getTransferAmount());
        $this->assertNull($this->details->getTransferAmount());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->payment->getCanale());
        $this->assertEquals('88888888888_01', $this->multi_token->getCanale());
        $this->assertEquals('88888888888_01', $this->details->getCanale());
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $values = [
            't0000000000000000000000000000001',
            't0000000000000000000000000000002',
            't0000000000000000000000000000003'
        ];
        $this->assertEquals(array($values[0]), $this->payment->getAllTokens());
        $this->assertEquals($values, $this->multi_token->getAllTokens());
        $this->assertEquals(array($values[0]), $this->details->getAllTokens());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertNull($this->payment->getTransferPa());
        $this->assertNull($this->multi_token->getTransferPa());
        $this->assertNull($this->details->getTransferPa());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertNull($this->payment->getTransferMetaDataCount());
        $this->assertNull($this->multi_token->getTransferMetaDataCount());
        $this->assertNull($this->details->getTransferMetaDataCount());
    }

    #[TestDox('getPaymentChannel()')]
    public function testGetPaymentChannel()
    {
        $this->assertNull($this->payment->getPaymentChannel());
        $this->assertNull($this->multi_token->getPaymentChannel());
        $this->assertEquals('CANALE', $this->details->getPaymentChannel());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->payment->isBollo());
        $this->assertFalse($this->multi_token->isBollo());
        $this->assertFalse($this->details->isBollo());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->payment->getAllNoticesNumbers());
        $this->assertNull($this->multi_token->getAllNoticesNumbers());
        $this->assertNull($this->details->getAllNoticesNumbers());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertNull($this->payment->getImportoTotale());
        $this->assertNull($this->multi_token->getImportoTotale());
        $this->assertNull($this->details->getImportoTotale());
    }

    #[TestDox('getPaymentMethod()')]
    public function testGetPaymentMethod()
    {
        $this->assertNull($this->payment->getPaymentMethod());
        $this->assertNull($this->multi_token->getPaymentMethod());
        $this->assertEquals('METODO', $this->details->getPaymentMethod());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertNull($this->payment->getTransferId());
        $this->assertNull($this->multi_token->getTransferId());
        $this->assertNull($this->details->getTransferId());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->payment->getStazione());
        $this->assertNull($this->multi_token->getStazione());
        $this->assertNull($this->details->getStazione());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->payment->getNoticeNumber());
        $this->assertNull($this->multi_token->getNoticeNumber());
        $this->assertNull($this->details->getNoticeNumber());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->payment->getBrokerPa());
        $this->assertNull($this->multi_token->getBrokerPa());
        $this->assertNull($this->details->getBrokerPa());
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->payment->getPaymentMetaDataCount());
        $this->assertNull($this->multi_token->getPaymentMetaDataCount());
        $this->assertNull($this->details->getPaymentMetaDataCount());
    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->payment->isValidPayload());
        $this->assertTrue($this->multi_token->isValidPayload());
        $this->assertTrue($this->details->isValidPayload());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertNull($this->payment->getIuv());
        $this->assertNull($this->multi_token->getIuv());
        $this->assertNull($this->details->getIuv());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->payment->getBrokerPsp());
        $this->assertEquals('88888888888', $this->multi_token->getBrokerPsp());
        $this->assertEquals('88888888888', $this->details->getBrokerPsp());
    }
}
