<?php

namespace payload\resp;

use pagopa\sert\payload\resp\activatePaymentNoticeV2;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\resp\activatePaymentNoticeV2')]
#[CoversClass(activatePaymentNoticeV2::class)]
class activatePaymentNoticeV2Test extends TestCase
{

    protected activatePaymentNoticeV2 $instance_1_transfer;

    protected activatePaymentNoticeV2 $instance_1_transfer_t_metadata;

    protected activatePaymentNoticeV2 $instance_1_transfer_p_metadata;

    protected activatePaymentNoticeV2 $instance_1_transfer_t_metadata_p_metadata;

    protected activatePaymentNoticeV2 $instance_2_transfer;

    protected activatePaymentNoticeV2 $instance_2_transfer_t_metadata;

    protected activatePaymentNoticeV2 $instance_2_transfer_p_metadata;

    protected activatePaymentNoticeV2 $instance_2_transfer_t_metadata_p_metadata;

    protected activatePaymentNoticeV2 $instance_2_transfer_1_bollo_t_metadata_p_metadata;
    protected activatePaymentNoticeV2 $instance_fault;


    protected function setUp(): void
    {
        $data = [
            'nav' => '301000000000000001',
            'iuv' => '01000000000000003',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'brokerpa' => '77777777777',
            'station' => '77777777777_01',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'token' => 't0000000000000000000000000000003',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                    'metadata' => array(
                        't_key_1_1' => 't_value_1_1',
                        't_key_1_2' => 't_value_1_2'
                    )
                ],
                [
                    'id' => '2',
                    'amount' => '50.00',
                    'iban' => 'IT0000000000000000000000002',
                    'pa' => '77777777778',
                    'metadata' => array(
                        't_key_2_1' => 't_value_2_1',
                        't_key_2_2' => 't_value_2_2'
                    )
                ],
            ],
            'metadata' => array(
                'p_key_1' => 'p_value_1',
                'p_key_2' => 'p_value_2'
            )
        ];

        $data_1_transfer = $data;
        $data_1_transfer['amount'] = '50.50';
        unset($data_1_transfer['transfers'][0]['metadata']);
        unset($data_1_transfer['transfers'][1]);
        unset($data_1_transfer['metadata']);
        $this->instance_1_transfer = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_1_transfer));

        $data_1_transfer_t_metadata = $data;
        $data_1_transfer_t_metadata['amount'] = '50.50';
        unset($data_1_transfer_t_metadata['transfers'][1]);
        unset($data_1_transfer_t_metadata['metadata']);
        $this->instance_1_transfer_t_metadata = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_1_transfer_t_metadata));

        $data_1_transfer_p_metadata = $data;
        $data_1_transfer_p_metadata['amount'] = '50.50';
        unset($data_1_transfer_p_metadata['transfers'][0]['metadata']);
        unset($data_1_transfer_p_metadata['transfers'][1]);
        $this->instance_1_transfer_p_metadata = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_1_transfer_p_metadata));

        $data_1_transfer_t_metadata_p_metadata = $data;
        $data_1_transfer_t_metadata_p_metadata['amount'] = '50.50';
        unset($data_1_transfer_t_metadata_p_metadata['transfers'][1]);
        $this->instance_1_transfer_t_metadata_p_metadata = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_1_transfer_t_metadata_p_metadata));

        $data_2_transfer = $data;
        unset($data_2_transfer['transfers'][0]['metadata']);
        unset($data_2_transfer['transfers'][1]['metadata']);
        unset($data_2_transfer['metadata']);
        $this->instance_2_transfer = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_2_transfer));

        $data_2_transfer_t_metadata = $data;
        unset($data_2_transfer_t_metadata['metadata']);
        $this->instance_2_transfer_t_metadata = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_2_transfer_t_metadata));

        $data_2_transfer_p_metadata = $data;
        unset($data_2_transfer_p_metadata['transfers'][0]['metadata']);
        unset($data_2_transfer_p_metadata['transfers'][1]['metadata']);
        $this->instance_2_transfer_p_metadata = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_2_transfer_p_metadata));

        $data_2_transfer_t_metadata_p_metadata = $data;
        $this->instance_2_transfer_t_metadata_p_metadata = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_2_transfer_t_metadata_p_metadata));

        $data_2_transfer_1_bollo_t_metadata_p_metadata = $data;
        unset($data_2_transfer_1_bollo_t_metadata_p_metadata['transfers'][1]['iban']);
        $data_2_transfer_1_bollo_t_metadata_p_metadata['transfers'][1]['richiestaMarcaDaBollo'] = 'dummy';
        $data_2_transfer_1_bollo_t_metadata_p_metadata['transfers'][1]['amount'] = '16.00';
        $data_2_transfer_1_bollo_t_metadata_p_metadata['amount'] = '66.50';
        $this->instance_2_transfer_1_bollo_t_metadata_p_metadata = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','resp', $data_2_transfer_1_bollo_t_metadata_p_metadata));

        $this->instance_fault = new activatePaymentNoticeV2(getPayload('activatePaymentNoticeV2','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));

    }

    #[TestDox('getTransferMetaDataName()')]
    public function testGetTransferMetaDataName()
    {
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataName(0, 0));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataName(1, 1));

        $this->assertEquals('t_key_1_1', $this->instance_1_transfer_t_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('t_key_1_2', $this->instance_1_transfer_t_metadata->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_1_transfer_t_metadata->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_1_transfer_t_metadata->getTransferMetaDataName(1, 1));

        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferMetaDataName(0, 0));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferMetaDataName(1, 1));

        $this->assertEquals('t_key_1_1', $this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('t_key_1_2', $this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1));


        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(0, 0));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(0, 2));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(1, 2));


        $this->assertEquals('t_key_1_1', $this->instance_2_transfer_t_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('t_key_1_2', $this->instance_2_transfer_t_metadata->getTransferMetaDataName(1, 0));
        $this->assertEquals('t_key_2_1', $this->instance_2_transfer_t_metadata->getTransferMetaDataName(0, 1));
        $this->assertEquals('t_key_2_2', $this->instance_2_transfer_t_metadata->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer_t_metadata->getTransferMetaDataName(0, 2));
        $this->assertNull($this->instance_2_transfer_t_metadata->getTransferMetaDataName(1, 2));

        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataName(0, 0));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataName(0, 2));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataName(1, 2));


        $this->assertEquals('t_key_1_1', $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('t_key_1_2', $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0));
        $this->assertEquals('t_key_2_1', $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1));
        $this->assertEquals('t_key_2_2', $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 2));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 2));


        $this->assertEquals('t_key_1_1', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('t_key_1_2', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 0));
        $this->assertEquals('t_key_2_1', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 1));
        $this->assertEquals('t_key_2_2', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 2));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 2));

        $this->assertNull($this->instance_fault->getTransferMetaDataName(0, 0));
        $this->assertNull($this->instance_fault->getTransferMetaDataName(1, 0));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {

        $this->assertFalse($this->instance_1_transfer->isBollo(0));
        $this->assertFalse($this->instance_1_transfer->isBollo(1));

        $this->assertFalse($this->instance_1_transfer_t_metadata->isBollo(0));
        $this->assertFalse($this->instance_1_transfer_t_metadata->isBollo(1));

        $this->assertFalse($this->instance_1_transfer_p_metadata->isBollo(0));
        $this->assertFalse($this->instance_1_transfer_p_metadata->isBollo(1));

        $this->assertFalse($this->instance_1_transfer_t_metadata_p_metadata->isBollo(0));
        $this->assertFalse($this->instance_1_transfer_t_metadata_p_metadata->isBollo(1));

        $this->assertFalse($this->instance_2_transfer->isBollo(0));
        $this->assertFalse($this->instance_2_transfer->isBollo(1));
        $this->assertFalse($this->instance_2_transfer->isBollo(2));

        $this->assertFalse($this->instance_2_transfer_t_metadata->isBollo(0));
        $this->assertFalse($this->instance_2_transfer_t_metadata->isBollo(1));
        $this->assertFalse($this->instance_2_transfer_t_metadata->isBollo(2));

        $this->assertFalse($this->instance_2_transfer_p_metadata->isBollo(0));
        $this->assertFalse($this->instance_2_transfer_p_metadata->isBollo(1));
        $this->assertFalse($this->instance_2_transfer_p_metadata->isBollo(2));

        $this->assertFalse($this->instance_2_transfer_t_metadata_p_metadata->isBollo(0));
        $this->assertFalse($this->instance_2_transfer_t_metadata_p_metadata->isBollo(1));
        $this->assertFalse($this->instance_2_transfer_t_metadata_p_metadata->isBollo(2));

        $this->assertFalse($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(0));
        $this->assertTrue($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(1));
        $this->assertFalse($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(2));

        $this->assertFalse($this->instance_fault->isBollo(0));
        $this->assertFalse($this->instance_fault->isBollo(1));

    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('50.50', $this->instance_1_transfer->getAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_t_metadata->getAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_p_metadata->getAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_t_metadata_p_metadata->getAmount());

        $this->assertEquals('100.50', $this->instance_2_transfer->getAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_t_metadata->getAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_p_metadata->getAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_t_metadata_p_metadata->getAmount());

        $this->assertEquals('66.50', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getAmount());
        $this->assertNull($this->instance_fault->getAmount());

    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertEquals(0, $this->instance_1_transfer->getPaymentMetaDataCount());
        $this->assertEquals(0, $this->instance_1_transfer_t_metadata->getPaymentMetaDataCount());
        $this->assertEquals(2, $this->instance_1_transfer_p_metadata->getPaymentMetaDataCount());
        $this->assertEquals(2, $this->instance_1_transfer_t_metadata_p_metadata->getPaymentMetaDataCount());
        $this->assertEquals(0, $this->instance_2_transfer->getPaymentMetaDataCount());
        $this->assertEquals(0, $this->instance_2_transfer_t_metadata->getPaymentMetaDataCount());
        $this->assertEquals(2, $this->instance_2_transfer_p_metadata->getPaymentMetaDataCount());
        $this->assertEquals(2, $this->instance_2_transfer_t_metadata_p_metadata->getPaymentMetaDataCount());
        $this->assertEquals(2, $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentMetaDataCount());

    }

    #[TestDox('getPaymentMetaDataName()')]
    public function testGetPaymentMetaDataName()
    {
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataName(0));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataName(1));

        $this->assertNull($this->instance_1_transfer_t_metadata->getPaymentMetaDataName(0));
        $this->assertNull($this->instance_1_transfer_t_metadata->getPaymentMetaDataName(1));

        $this->assertEquals('p_key_1', $this->instance_1_transfer_p_metadata->getPaymentMetaDataName(0));
        $this->assertEquals('p_key_2', $this->instance_1_transfer_p_metadata->getPaymentMetaDataName(1));
        $this->assertNull($this->instance_1_transfer_p_metadata->getPaymentMetaDataName(2));

        $this->assertEquals('p_key_1', $this->instance_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0));
        $this->assertEquals('p_key_2', $this->instance_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2));

        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataName(0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataName(1));

        $this->assertNull($this->instance_2_transfer_t_metadata->getPaymentMetaDataName(0));
        $this->assertNull($this->instance_2_transfer_t_metadata->getPaymentMetaDataName(1));

        $this->assertEquals('p_key_1', $this->instance_2_transfer_p_metadata->getPaymentMetaDataName(0));
        $this->assertEquals('p_key_2', $this->instance_2_transfer_p_metadata->getPaymentMetaDataName(1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getPaymentMetaDataName(2));

        $this->assertEquals('p_key_1', $this->instance_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0));
        $this->assertEquals('p_key_2', $this->instance_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2));

        $this->assertEquals('p_key_1', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(0));
        $this->assertEquals('p_key_2', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(1));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(2));

        $this->assertNull($this->instance_fault->getPaymentMetaDataName(0));

    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataValue(0));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataValue(1));

        $this->assertNull($this->instance_1_transfer_t_metadata->getPaymentMetaDataValue(0));
        $this->assertNull($this->instance_1_transfer_t_metadata->getPaymentMetaDataValue(1));

        $this->assertEquals('p_value_1', $this->instance_1_transfer_p_metadata->getPaymentMetaDataValue(0));
        $this->assertEquals('p_value_2', $this->instance_1_transfer_p_metadata->getPaymentMetaDataValue(1));
        $this->assertNull($this->instance_1_transfer_p_metadata->getPaymentMetaDataValue(2));

        $this->assertEquals('p_value_1', $this->instance_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0));
        $this->assertEquals('p_value_2', $this->instance_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2));

        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataValue(0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataValue(1));

        $this->assertNull($this->instance_2_transfer_t_metadata->getPaymentMetaDataValue(0));
        $this->assertNull($this->instance_2_transfer_t_metadata->getPaymentMetaDataValue(1));

        $this->assertEquals('p_value_1', $this->instance_2_transfer_p_metadata->getPaymentMetaDataValue(0));
        $this->assertEquals('p_value_2', $this->instance_2_transfer_p_metadata->getPaymentMetaDataValue(1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getPaymentMetaDataValue(2));

        $this->assertEquals('p_value_1', $this->instance_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0));
        $this->assertEquals('p_value_2', $this->instance_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2));

        $this->assertEquals('p_value_1', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(0));
        $this->assertEquals('p_value_2', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(1));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(2));

        $this->assertNull($this->instance_fault->getPaymentMetaDataValue(0));

    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_1_transfer->getToken());
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_1_transfer_t_metadata->getToken());
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_1_transfer_p_metadata->getToken());
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_1_transfer_t_metadata_p_metadata->getToken());
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_2_transfer->getToken());
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_2_transfer_t_metadata->getToken());
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_2_transfer_p_metadata->getToken());
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_2_transfer_t_metadata_p_metadata->getToken());

    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1_transfer->getTransferCount());
        $this->assertEquals(1, $this->instance_1_transfer_t_metadata->getTransferCount());
        $this->assertEquals(1, $this->instance_1_transfer_p_metadata->getTransferCount());
        $this->assertEquals(1, $this->instance_1_transfer_t_metadata_p_metadata->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer_t_metadata->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer_p_metadata->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer_t_metadata_p_metadata->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferCount());
        $this->assertEquals(0, $this->instance_fault->getTransferCount());

    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1_transfer->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_1_transfer_t_metadata->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_1_transfer_p_metadata->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_1_transfer_t_metadata_p_metadata->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_transfer->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_transfer_t_metadata->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_transfer_p_metadata->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_transfer_t_metadata_p_metadata->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaEmittente());
        $this->assertNull($this->instance_fault->getPaEmittente());

    }

    #[TestDox('getCreditorReference()')]
    public function testGetCreditorReference()
    {
        $this->assertEquals('01000000000000003', $this->instance_1_transfer->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_t_metadata->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_p_metadata->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_t_metadata_p_metadata->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_t_metadata->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_p_metadata->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_t_metadata_p_metadata->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getCreditorReference());
        $this->assertNull($this->instance_fault->getCreditorReference());
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer_t_metadata->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer_t_metadata->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer_p_metadata->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer_t_metadata_p_metadata->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer->getTransferIban(2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer_t_metadata->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer_t_metadata->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer_t_metadata->getTransferIban(2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer_p_metadata->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer_p_metadata->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferIban(2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer_t_metadata_p_metadata->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer_t_metadata_p_metadata->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getTransferIban(2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(0));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(2));

        $this->assertNull($this->instance_fault->getTransferIban(0));

    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->instance_1_transfer->getOutcome());
        $this->assertEquals('OK', $this->instance_1_transfer_t_metadata->getOutcome());
        $this->assertEquals('OK', $this->instance_1_transfer_p_metadata->getOutcome());
        $this->assertEquals('OK', $this->instance_1_transfer_t_metadata_p_metadata->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer_t_metadata->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer_p_metadata->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer_t_metadata_p_metadata->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getOutcome());
        $this->assertEquals('KO', $this->instance_fault->getOutcome());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance_1_transfer->getTransferPa(0));
        $this->assertNull($this->instance_1_transfer->getTransferPa(1));

        $this->assertEquals('77777777777', $this->instance_1_transfer_t_metadata->getTransferPa(0));
        $this->assertNull($this->instance_1_transfer_t_metadata->getTransferPa(1));

        $this->assertEquals('77777777777', $this->instance_1_transfer_p_metadata->getTransferPa(0));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferPa(1));

        $this->assertEquals('77777777777', $this->instance_1_transfer_t_metadata_p_metadata->getTransferPa(0));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getTransferPa(1));

        $this->assertEquals('77777777777', $this->instance_2_transfer->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_2_transfer->getTransferPa(1));
        $this->assertNull($this->instance_2_transfer->getTransferPa(2));

        $this->assertEquals('77777777777', $this->instance_2_transfer_t_metadata->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_2_transfer_t_metadata->getTransferPa(1));
        $this->assertNull($this->instance_2_transfer_t_metadata->getTransferPa(2));

        $this->assertEquals('77777777777', $this->instance_2_transfer_p_metadata->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_2_transfer_p_metadata->getTransferPa(1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferPa(2));

        $this->assertEquals('77777777777', $this->instance_2_transfer_t_metadata_p_metadata->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_2_transfer_t_metadata_p_metadata->getTransferPa(1));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getTransferPa(2));

        $this->assertEquals('77777777777', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(1));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(2));

        $this->assertNull($this->instance_fault->getTransferPa(0));
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue(1, 1));

        $this->assertEquals('t_value_1_1', $this->instance_1_transfer_t_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('t_value_1_2', $this->instance_1_transfer_t_metadata->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer_t_metadata->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer_t_metadata->getTransferMetaDataValue(1, 1));

        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferMetaDataValue(1, 1));

        $this->assertEquals('t_value_1_1', $this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('t_value_1_2', $this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1));


        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(1, 2));


        $this->assertEquals('t_value_1_1', $this->instance_2_transfer_t_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('t_value_1_2', $this->instance_2_transfer_t_metadata->getTransferMetaDataValue(1, 0));
        $this->assertEquals('t_value_2_1', $this->instance_2_transfer_t_metadata->getTransferMetaDataValue(0, 1));
        $this->assertEquals('t_value_2_2', $this->instance_2_transfer_t_metadata->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer_t_metadata->getTransferMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_transfer_t_metadata->getTransferMetaDataValue(1, 2));

        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferMetaDataValue(1, 2));


        $this->assertEquals('t_value_1_1', $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('t_value_1_2', $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0));
        $this->assertEquals('t_value_2_1', $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1));
        $this->assertEquals('t_value_2_2', $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 2));


        $this->assertEquals('t_value_1_1', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('t_value_1_2', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 0));
        $this->assertEquals('t_value_2_1', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 1));
        $this->assertEquals('t_value_2_2', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 2));

        $this->assertNull($this->instance_fault->getTransferMetaDataValue(0, 0));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue(1, 0));
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertEquals('1', $this->instance_1_transfer->getTransferId(0));
        $this->assertNull($this->instance_1_transfer->getTransferId(1));

        $this->assertEquals('1', $this->instance_1_transfer_t_metadata->getTransferId(0));
        $this->assertNull($this->instance_1_transfer_t_metadata->getTransferId(1));

        $this->assertEquals('1', $this->instance_1_transfer_p_metadata->getTransferId(0));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferId(1));

        $this->assertEquals('1', $this->instance_1_transfer_t_metadata_p_metadata->getTransferId(0));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getTransferId(1));

        $this->assertEquals('1', $this->instance_2_transfer->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer->getTransferId(1));
        $this->assertNull($this->instance_2_transfer->getTransferId(2));

        $this->assertEquals('1', $this->instance_2_transfer_t_metadata->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer_t_metadata->getTransferId(1));
        $this->assertNull($this->instance_2_transfer_t_metadata->getTransferId(2));

        $this->assertEquals('1', $this->instance_2_transfer_p_metadata->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer_p_metadata->getTransferId(1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferId(2));

        $this->assertEquals('1', $this->instance_2_transfer_t_metadata_p_metadata->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer_t_metadata_p_metadata->getTransferId(1));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getTransferId(2));

        $this->assertEquals('1', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(1));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(2));

        $this->assertNull($this->instance_fault->getTransferId(0));
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_1_transfer->getFaultCode());
        $this->assertNull($this->instance_1_transfer_t_metadata->getFaultCode());
        $this->assertNull($this->instance_1_transfer_p_metadata->getFaultCode());
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getFaultCode());
        $this->assertNull($this->instance_2_transfer->getFaultCode());
        $this->assertNull($this->instance_2_transfer_t_metadata->getFaultCode());
        $this->assertNull($this->instance_2_transfer_p_metadata->getFaultCode());
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getFaultCode());
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->instance_fault->getFaultCode());
    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('50.50', $this->instance_1_transfer->getTotalAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_t_metadata->getTotalAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_p_metadata->getTotalAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_t_metadata_p_metadata->getTotalAmount());

        $this->assertEquals('100.50', $this->instance_2_transfer->getTotalAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_t_metadata->getTotalAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_p_metadata->getTotalAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_t_metadata_p_metadata->getTotalAmount());

        $this->assertEquals('66.50', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTotalAmount());
        $this->assertNull($this->instance_fault->getTotalAmount());

    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_1_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_transfer_t_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_transfer_p_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_transfer_t_metadata_p_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer_t_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer_p_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer_t_metadata_p_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());

    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('50.50', $this->instance_1_transfer->getTransferAmount(0));
        $this->assertNull($this->instance_1_transfer->getTransferAmount(1));

        $this->assertEquals('50.50', $this->instance_1_transfer_t_metadata->getTransferAmount(0));
        $this->assertNull($this->instance_1_transfer_t_metadata->getTransferAmount(1));

        $this->assertEquals('50.50', $this->instance_1_transfer_p_metadata->getTransferAmount(0));
        $this->assertNull($this->instance_1_transfer_p_metadata->getTransferAmount(1));

        $this->assertEquals('50.50', $this->instance_1_transfer_t_metadata_p_metadata->getTransferAmount(0));
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getTransferAmount(1));

        $this->assertEquals('50.50', $this->instance_2_transfer->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer->getTransferAmount(2));

        $this->assertEquals('50.50', $this->instance_2_transfer_t_metadata->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer_t_metadata->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer_t_metadata->getTransferAmount(2));

        $this->assertEquals('50.50', $this->instance_2_transfer_p_metadata->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer_p_metadata->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer_p_metadata->getTransferAmount(2));

        $this->assertEquals('50.50', $this->instance_2_transfer_t_metadata_p_metadata->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer_t_metadata_p_metadata->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getTransferAmount(2));

        $this->assertEquals('50.50', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(0));
        $this->assertEquals('16.00', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(2));

        $this->assertNull($this->instance_fault->getTransferAmount(0));
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(1));

        $this->assertEquals(2, $this->instance_1_transfer_t_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_transfer_t_metadata->getTransferMetaDataCount(1));

        $this->assertEquals(0, $this->instance_1_transfer_p_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_transfer_p_metadata->getTransferMetaDataCount(1));

        $this->assertEquals(2, $this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1));

        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(2));

        $this->assertEquals(2, $this->instance_2_transfer_t_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(2, $this->instance_2_transfer_t_metadata->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->instance_2_transfer_t_metadata->getTransferMetaDataCount(2));

        $this->assertEquals(0, $this->instance_2_transfer_p_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_2_transfer_p_metadata->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->instance_2_transfer_p_metadata->getTransferMetaDataCount(2));


        $this->assertEquals(2, $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(2, $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->instance_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(2));


        $this->assertEquals(2, $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(2, $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(2));

        $this->assertEquals(0, $this->instance_fault->getTransferMetaDataCount(0));

    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_1_transfer->getFaultString());
        $this->assertNull($this->instance_1_transfer_t_metadata->getFaultString());
        $this->assertNull($this->instance_1_transfer_p_metadata->getFaultString());
        $this->assertNull($this->instance_1_transfer_t_metadata_p_metadata->getFaultString());
        $this->assertNull($this->instance_2_transfer->getFaultString());
        $this->assertNull($this->instance_2_transfer_t_metadata->getFaultString());
        $this->assertNull($this->instance_2_transfer_p_metadata->getFaultString());
        $this->assertNull($this->instance_2_transfer_t_metadata_p_metadata->getFaultString());
        $this->assertNull($this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getFaultString());
        $this->assertEquals('Token scaduto', $this->instance_fault->getFaultString());

    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000003', $this->instance_1_transfer->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_t_metadata->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_p_metadata->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_t_metadata_p_metadata->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_t_metadata->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_p_metadata->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_t_metadata_p_metadata->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_1_bollo_t_metadata_p_metadata->getIuv());
        $this->assertNull($this->instance_fault->getIuv());
    }
}
