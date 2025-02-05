<?php

namespace payload\req;

use pagopa\sert\payload\req\pspNotifyPayment;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\pspNotifyPayment')]
#[CoversClass(pspNotifyPayment::class)]
class pspNotifyPaymentTest extends TestCase
{

    protected pspNotifyPayment $instance_1_transfer;

    protected pspNotifyPayment $instance_1_transfer_t_metadata;

    protected pspNotifyPayment $instance_1_transfer_p_metadata;

    protected pspNotifyPayment $instance_1_transfer_t_metadata_p_metadata;

    protected pspNotifyPayment $instance_2_transfer;

    protected pspNotifyPayment $instance_2_transfer_t_metadata;

    protected pspNotifyPayment $instance_2_transfer_p_metadata;

    protected pspNotifyPayment $instance_2_transfer_t_metadata_p_metadata;


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
            'brokerpsp' => '88888888888',
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
        $this->instance_1_transfer = new pspNotifyPayment(getPayload('pspNotifyPayment','req', $data_1_transfer));

        $data_1_transfer_t_metadata = $data;
        $data_1_transfer_t_metadata['amount'] = '50.50';
        unset($data_1_transfer_t_metadata['transfers'][1]);
        unset($data_1_transfer_t_metadata['metadata']);
        $this->instance_1_transfer_t_metadata = new pspNotifyPayment(getPayload('pspNotifyPayment','req', $data_1_transfer_t_metadata));

        $data_1_transfer_p_metadata = $data;
        $data_1_transfer_p_metadata['amount'] = '50.50';
        unset($data_1_transfer_p_metadata['transfers'][0]['metadata']);
        unset($data_1_transfer_p_metadata['transfers'][1]);
        $this->instance_1_transfer_p_metadata = new pspNotifyPayment(getPayload('pspNotifyPayment','req', $data_1_transfer_p_metadata));

        $data_1_transfer_t_metadata_p_metadata = $data;
        $data_1_transfer_t_metadata_p_metadata['amount'] = '50.50';
        unset($data_1_transfer_t_metadata_p_metadata['transfers'][1]);
        $this->instance_1_transfer_t_metadata_p_metadata = new pspNotifyPayment(getPayload('pspNotifyPayment','req', $data_1_transfer_t_metadata_p_metadata));

        $data_2_transfer = $data;
        unset($data_2_transfer['transfers'][0]['metadata']);
        unset($data_2_transfer['transfers'][1]['metadata']);
        unset($data_2_transfer['metadata']);
        $this->instance_2_transfer = new pspNotifyPayment(getPayload('pspNotifyPayment','req', $data_2_transfer));

        $data_2_transfer_t_metadata = $data;
        unset($data_2_transfer_t_metadata['metadata']);
        $this->instance_2_transfer_t_metadata = new pspNotifyPayment(getPayload('pspNotifyPayment','req', $data_2_transfer_t_metadata));

        $data_2_transfer_p_metadata = $data;
        unset($data_2_transfer_p_metadata['transfers'][0]['metadata']);
        unset($data_2_transfer_p_metadata['transfers'][1]['metadata']);
        $this->instance_2_transfer_p_metadata = new pspNotifyPayment(getPayload('pspNotifyPayment','req', $data_2_transfer_p_metadata));

        $data_2_transfer_t_metadata_p_metadata = $data;
        $this->instance_2_transfer_t_metadata_p_metadata = new pspNotifyPayment(getPayload('pspNotifyPayment','req', $data_2_transfer_t_metadata_p_metadata));

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

    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertEquals('88888888888', $this->instance_1_transfer->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_transfer_t_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_transfer_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_transfer_t_metadata_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_transfer->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_transfer_t_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_transfer_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_transfer_t_metadata_p_metadata->getPspBroker());
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
    }

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertEquals('88888888888_01', $this->instance_1_transfer->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_transfer_t_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_transfer_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_transfer_t_metadata_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_transfer->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_transfer_t_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_transfer_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_transfer_t_metadata_p_metadata->getPspChannel());

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

    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertEquals('AGID_01', $this->instance_1_transfer->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_transfer_t_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_transfer_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_transfer_t_metadata_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_transfer->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_transfer_t_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_transfer_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_transfer_t_metadata_p_metadata->getPspId());

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

    }
}
