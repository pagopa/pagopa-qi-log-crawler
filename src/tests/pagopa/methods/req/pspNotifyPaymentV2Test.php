<?php

namespace pagopa\methods\req;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use pagopa\crawler\methods\req\pspNotifyPaymentV2;

#[TestDox('methods\req\pspNotifyPaymentV2::class')]
class pspNotifyPaymentV2Test extends TestCase
{

    protected pspNotifyPaymentV2 $instance;

    protected function setUp(): void
    {
        $this->instance = new pspNotifyPaymentV2(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50VjI+CgkJCTxpZFBTUD5QU1BfVjI8L2lkUFNQPgoJCQk8aWRCcm9rZXJQU1A+ODg4ODg4ODg4ODg8L2lkQnJva2VyUFNQPgoJCQk8aWRDaGFubmVsPjg4ODg4ODg4ODg4XzAyPC9pZENoYW5uZWw+CgkJCTx0cmFuc2FjdGlvbklkPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDAwPC90cmFuc2FjdGlvbklkPgoJCQk8dG90YWxBbW91bnQ+NzAxLjAwPC90b3RhbEFtb3VudD4KCQkJPGZlZT4xLjAwPC9mZWU+CgkJCTx0aW1lc3RhbXBPcGVyYXRpb24+MjAyNC0wNC0xOVQyMzowMTo0NDwvdGltZXN0YW1wT3BlcmF0aW9uPgoJCQk8cGF5bWVudExpc3Q+CgkJCQk8cGF5bWVudD4KCQkJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9wYXltZW50VG9rZW4+CgkJCQkJPHBheW1lbnREZXNjcmlwdGlvbj5wYWdhbWVudG8gbXVsdGliZW5lZmljaWFyaW88L3BheW1lbnREZXNjcmlwdGlvbj4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAwMTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQkJCQk8ZGVidEFtb3VudD4yNTAuMDA8L2RlYnRBbW91bnQ+CgkJCQkJPHRyYW5zZmVyTGlzdD4KCQkJCQkJPHRyYW5zZmVyPgoJCQkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQkJCTx0cmFuc2ZlckFtb3VudD4xMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMV8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzFfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMV8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzFfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJCTx0cmFuc2Zlcj4KCQkJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTUwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQkJCTxJQkFOPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMl8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzJfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMl8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzJfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJPC90cmFuc2Zlckxpc3Q+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8xXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWx1ZV8xXzI8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCTwvbWV0YWRhdGE+CgkJCQk8L3BheW1lbnQ+CgkJCQk8cGF5bWVudD4KCQkJCQk8cGF5bWVudFRva2VuPnQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAyPC9wYXltZW50VG9rZW4+CgkJCQkJPHBheW1lbnREZXNjcmlwdGlvbj5wYWdhbWVudG8gbXVsdGliZW5lZmljaWFyaW88L3BheW1lbnREZXNjcmlwdGlvbj4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzg3PC9maXNjYWxDb2RlUEE+CgkJCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wMTAwMDAwMDAwMDAwMDAwMjwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQkJCQk8ZGVidEFtb3VudD40NTAuMDA8L2RlYnRBbW91bnQ+CgkJCQkJPHRyYW5zZmVyTGlzdD4KCQkJCQkJPHRyYW5zZmVyPgoJCQkJCQkJPGlkVHJhbnNmZXI+MTwvaWRUcmFuc2Zlcj4KCQkJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc4NzwvZmlzY2FsQ29kZVBBPgoJCQkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDExPC9JQkFOPgoJCQkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMV8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzFfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMV8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzFfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJCTx0cmFuc2Zlcj4KCQkJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJCQk8dHJhbnNmZXJBbW91bnQ+MjUwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3ODg8L2Zpc2NhbENvZGVQQT4KCQkJCQkJCTxJQkFOPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMjwvSUJBTj4KCQkJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQkJCTxtZXRhZGF0YT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMl8xPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzJfMTwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQkJCTxrZXk+Y2hpYXZlXzJfMl8yPC9rZXk+CgkJCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzJfMjwvdmFsdWU+CgkJCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJCTwvbWV0YWRhdGE+CgkJCQkJCTwvdHJhbnNmZXI+CgkJCQkJPC90cmFuc2Zlckxpc3Q+CgkJCQkJPG1ldGFkYXRhPgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5PmNoaWF2ZV8yXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT52YWx1ZV8yXzI8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCTwvbWV0YWRhdGE+CgkJCQk8L3BheW1lbnQ+CgkJCTwvcGF5bWVudExpc3Q+CgkJCTxhZGRpdGlvbmFsUGF5bWVudEluZm9ybWF0aW9ucz4KCQkJCTxtZXRhZGF0YT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+dGlwb1ZlcnNhbWVudG88L2tleT4KCQkJCQkJPHZhbHVlPkNQPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJCTxtYXBFbnRyeT4KCQkJCQkJPGtleT5vdXRjb21lUGF5bWVudEdhdGV3YXk8L2tleT4KCQkJCQkJPHZhbHVlPk9LPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJCTxtYXBFbnRyeT4KCQkJCQkJPGtleT50aW1lc3RhbXBPcGVyYXRpb248L2tleT4KCQkJCQkJPHZhbHVlPjIwMjQtMDQtMTlUMjM6MDE6NDQ8L3ZhbHVlPgoJCQkJCTwvbWFwRW50cnk+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PnRvdGFsQW1vdW50PC9rZXk+CgkJCQkJCTx2YWx1ZT43MDEuMDA8L3ZhbHVlPgoJCQkJCTwvbWFwRW50cnk+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PmZlZTwva2V5PgoJCQkJCQk8dmFsdWU+MS4wMDwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+YXV0aG9yaXphdGlvbkNvZGU8L2tleT4KCQkJCQkJPHZhbHVlPjEwMDAwMTwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+cnJuPC9rZXk+CgkJCQkJCTx2YWx1ZT56enp6enp6enp6enp6enp6enp6enoxPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJPC9tZXRhZGF0YT4KCQkJPC9hZGRpdGlvbmFsUGF5bWVudEluZm9ybWF0aW9ucz4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50VjI+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000011', $this->instance->getTransferIban(0, 1));
        $this->assertEquals('IT0000000000000000000000012', $this->instance->getTransferIban(1, 1));

        $this->assertNull($this->instance->getTransferIban(0, 2));
        $this->assertNull($this->instance->getTransferIban(1, 2));

    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->instance->outcome());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(2, $this->instance->getPaymentsCount());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(2, $this->instance->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->instance->getTransferMetaDataCount(1, 0));

        $this->assertEquals(2, $this->instance->getTransferMetaDataCount(0, 1));
        $this->assertEquals(2, $this->instance->getTransferMetaDataCount(1, 1));

        $this->assertNull($this->instance->getTransferMetaDataCount(0, 2));
        $this->assertNull($this->instance->getTransferMetaDataCount(1, 2));

    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance->getTransferPa(1, 0));

        $this->assertEquals('77777777787', $this->instance->getTransferPa(0, 1));
        $this->assertEquals('77777777788', $this->instance->getTransferPa(1, 1));

        $this->assertNull($this->instance->getTransferPa(0, 2));
        $this->assertNull($this->instance->getTransferPa(1, 2));

    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {

        $this->assertEquals('01000000000000001', $this->instance->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance->getIuv(1));
        $this->assertNull($this->instance->getIuv(2));

    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertEquals(2, $this->instance->getPaymentMetaDataCount(0));
        $this->assertEquals(2, $this->instance->getPaymentMetaDataCount(1));
        $this->assertNull($this->instance->getPaymentMetaDataCount(2));
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertEquals('chiave_1_1_1', $this->instance->getTransferMetaDataKey(0, 0, 0));
        $this->assertEquals('chiave_1_1_2', $this->instance->getTransferMetaDataKey(0, 0, 1));
        $this->assertNull($this->instance->getTransferMetaDataKey(0, 0, 2));

        $this->assertEquals('chiave_1_2_1', $this->instance->getTransferMetaDataKey(1, 0, 0));
        $this->assertEquals('chiave_1_2_2', $this->instance->getTransferMetaDataKey(1, 0, 1));
        $this->assertNull($this->instance->getTransferMetaDataKey(1, 0, 2));


        $this->assertEquals('chiave_2_1_1', $this->instance->getTransferMetaDataKey(0, 1, 0));
        $this->assertEquals('chiave_2_1_2', $this->instance->getTransferMetaDataKey(0, 1, 1));
        $this->assertNull($this->instance->getTransferMetaDataKey(0, 1, 2));

        $this->assertEquals('chiave_2_2_1', $this->instance->getTransferMetaDataKey(1, 1, 0));
        $this->assertEquals('chiave_2_2_2', $this->instance->getTransferMetaDataKey(1, 1, 1));
        $this->assertNull($this->instance->getTransferMetaDataKey(1, 1, 2));

    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance->getCcp(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance->getCcp(1));
        $this->assertNull($this->instance->getCcp(2));
    }

    #[TestDox('getCartMetadataKey()')]
    public function testGetCartMetadataKey()
    {
        $array = [
            'tipoVersamento' => 'CP',
            'outcomePaymentGateway' => 'OK',
            'timestampOperation' => '2024-04-19T23:01:44',
            'totalAmount' => '701.00',
            'fee' => '1.00',
            'authorizationCode' => '100001',
            'rrn' => 'zzzzzzzzzzzzzzzzzzzzz1'
        ];
        $values = array_keys($array);
        for ($i=0;$i<count($array);$i++)
        {
            $this->assertEquals($values[$i], $this->instance->getCartMetadataKey($i));
        }
        $this->assertNull($this->instance->getCartMetadataKey($i));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['t0000000000000000000000000000001','t0000000000000000000000000000002'], $this->instance->getCcps());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(2, $this->instance->getTransferCount(0));
        $this->assertEquals(2, $this->instance->getTransferCount(1));
        $this->assertNull($this->instance->getTransferCount(2));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['t0000000000000000000000000000001','t0000000000000000000000000000002'], $this->instance->getAllTokens());
    }

    #[TestDox('getCartMetadataCount()')]
    public function testGetCartMetadataCount()
    {
        $this->assertEquals(7, $this->instance->getCartMetadataCount());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777','77777777787'], $this->instance->getPaEmittenti());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance->getStazione());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertEquals('1', $this->instance->getTransferId(0, 0));
        $this->assertEquals('2', $this->instance->getTransferId(1, 0));

        $this->assertEquals('1', $this->instance->getTransferId(0, 1));
        $this->assertEquals('2', $this->instance->getTransferId(1, 1));

        $this->assertNull($this->instance->getTransferId(0, 2));
        $this->assertNull($this->instance->getTransferId(1, 2));
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->instance->getBrokerPsp());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('250.00', $this->instance->getImporto(0));
        $this->assertEquals('450.00', $this->instance->getImporto(1));
        $this->assertNull($this->instance->getImporto(2));

    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('100.00', $this->instance->getTransferAmount(0, 0));
        $this->assertEquals('150.00', $this->instance->getTransferAmount(1, 0));

        $this->assertEquals('200.00', $this->instance->getTransferAmount(0, 1));
        $this->assertEquals('250.00', $this->instance->getTransferAmount(1, 1));

        $this->assertNull($this->instance->getTransferAmount(0, 2));
        $this->assertNull($this->instance->getTransferAmount(1, 2));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo(0, 0));
        $this->assertFalse($this->instance->isBollo(1, 0));

        $this->assertFalse($this->instance->isBollo(0, 1));
        $this->assertFalse($this->instance->isBollo(1, 1));

        $this->assertFalse($this->instance->isBollo(0, 2));
        $this->assertFalse($this->instance->isBollo(1, 2));

    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('PSP_V2', $this->instance->getPsp());

    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance->getAllNoticesNumbers());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertEquals('value_1_1', $this->instance->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('value_1_2', $this->instance->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance->getPaymentMetaDataValue(0, 2));

        $this->assertEquals('value_2_1', $this->instance->getPaymentMetaDataValue(1, 0));
        $this->assertEquals('value_2_2', $this->instance->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance->getPaymentMetaDataValue(0, 2));
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance->getBrokerPa());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('700.00', $this->instance->getImportoTotale());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_02', $this->instance->getCanale());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance->getNoticeNumber(0));
        $this->assertNull($this->instance->getNoticeNumber(1));
        $this->assertNull($this->instance->getNoticeNumber(2));
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertEquals('value_1_1_1', $this->instance->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('value_1_1_2', $this->instance->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance->getTransferMetaDataValue(0, 0, 2));

        $this->assertEquals('value_1_2_1', $this->instance->getTransferMetaDataValue(1, 0, 0));
        $this->assertEquals('value_1_2_2', $this->instance->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance->getTransferMetaDataValue(1, 0, 2));


        $this->assertEquals('value_2_1_1', $this->instance->getTransferMetaDataValue(0, 1, 0));
        $this->assertEquals('value_2_1_2', $this->instance->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance->getTransferMetaDataValue(0, 1, 2));

        $this->assertEquals('value_2_2_1', $this->instance->getTransferMetaDataValue(1, 1, 0));
        $this->assertEquals('value_2_2_2', $this->instance->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance->getTransferMetaDataValue(1, 1, 2));
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance->getToken(1));
        $this->assertNull($this->instance->getToken(2));
    }

    #[TestDox('getCartMetaDataValue()')]
    public function testGetCartMetaDataValue()
    {
        $array = [
            'tipoVersamento' => 'CP',
            'outcomePaymentGateway' => 'OK',
            'timestampOperation' => '2024-04-19T23:01:44',
            'totalAmount' => '701.00',
            'fee' => '1.00',
            'authorizationCode' => '100001',
            'rrn' => 'zzzzzzzzzzzzzzzzzzzzz1'
        ];
        $values = array_values($array);
        for ($i=0;$i<count($array);$i++)
        {
            $this->assertEquals($values[$i], $this->instance->getCartMetaDataValue($i));
        }
        $this->assertNull($this->instance->getCartMetaDataValue($i));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000001','01000000000000002'], $this->instance->getIuvs());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente(0));
        $this->assertEquals('77777777787', $this->instance->getPaEmittente(1));
        $this->assertNull($this->instance->getPaEmittente(2));

    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertEquals('chiave_1_1', $this->instance->getPaymentMetaDataKey(0, 0));
        $this->assertEquals('chiave_1_2', $this->instance->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance->getPaymentMetaDataKey(0, 2));

        $this->assertEquals('chiave_2_1', $this->instance->getPaymentMetaDataKey(1, 0));
        $this->assertEquals('chiave_2_2', $this->instance->getPaymentMetaDataKey(1, 1));
        $this->assertNull($this->instance->getPaymentMetaDataKey(0, 2));

    }
}
