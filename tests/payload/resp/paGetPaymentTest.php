<?php

namespace payload\resp;

use pagopa\sert\payload\resp\paGetPayment;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('payload\resp\paGetPayment::class')]
#[CoversClass( paGetPayment::class)]
class paGetPaymentTest extends TestCase
{

    protected paGetPayment $instance_1_transfer;

    protected paGetPayment $instance_2_transfer;

    protected paGetPayment $instance_1_transfer_2_metadata;

    protected paGetPayment $instance_2_transfer_2_metadata;

    protected paGetPayment $instance_1_transfer_1_metadata_2_payment;

    protected paGetPayment $instance_2_transfer_2_metadata_2_payment_metadata;


    protected paGetPayment $instance_fault;


    protected function setUp(): void
    {
        $data_1 = [
            'iuv' => '01000000000000003',
            'pa_emittente' => '77777777777',
            'amount' => '50.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000003',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777'
                ],
            ],
        ];

        $this->instance_1_transfer = new paGetPayment(getPayload('paGetPayment','resp', $data_1));

        $data_2 = [
            'iuv' => '01000000000000003',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000003',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                ],
                [
                    'id' => '2',
                    'amount' => '50.00',
                    'iban' => 'IT0000000000000000000000002',
                    'pa' => '77777777778',
                ]
            ],
        ];

        $this->instance_2_transfer = new paGetPayment(getPayload('paGetPayment','resp', $data_2));

        $data_3 = [
            'iuv' => '01000000000000003',
            'pa_emittente' => '77777777777',
            'amount' => '50.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000003',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                    'metadata' => array(
                        'chiave_1_1' => 'valore_1_1',
                        'chiave_1_2' => 'valore_1_2'
                    )
                ],
            ],
        ];

        $this->instance_1_transfer_2_metadata = new paGetPayment(getPayload('paGetPayment','resp', $data_3));


        $data_4 = [
            'iuv' => '01000000000000003',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000003',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                    'metadata' => array(
                        'chiave_1_1' => 'valore_1_1',
                        'chiave_1_2' => 'valore_1_2'
                    )
                ],
                [
                    'id' => '2',
                    'amount' => '50.00',
                    'iban' => 'IT0000000000000000000000002',
                    'pa' => '77777777778',
                    'metadata' =>
                        array(
                            'chiave_2_1' => 'valore_2_1',
                            'chiave_2_2' => 'valore_2_2'
                        )
                ]
            ]
        ];

        $this->instance_2_transfer_2_metadata = new paGetPayment(getPayload('paGetPayment','resp', $data_4));


        $data_5 = [
            'iuv' => '01000000000000003',
            'pa_emittente' => '77777777777',
            'amount' => '50.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000003',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                    'metadata' => array(
                        'chiave_1_1' => 'valore_1_1',
                        'chiave_1_2' => 'valore_1_2'
                    )
                ],
            ],
            'metadata' => array(
                'pchiave_1_1' => 'pvalore_1_1',
                'pchiave_1_2' => 'pvalore_1_2'
            )
        ];

        $this->instance_1_transfer_1_metadata_2_payment = new paGetPayment(getPayload('paGetPayment','resp', $data_5));


        $data_6 = [
            'iuv' => '01000000000000003',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000003',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                    'metadata' => array(
                        'chiave_1_1' => 'valore_1_1',
                        'chiave_1_2' => 'valore_1_2'
                    )
                ],
                [
                    'id' => '2',
                    'amount' => '50.00',
                    'iban' => 'IT0000000000000000000000002',
                    'pa' => '77777777778',
                    'metadata' =>
                        array(
                            'chiave_2_1' => 'valore_2_1',
                            'chiave_2_2' => 'valore_2_2'
                        )
                ]
            ],
            'metadata' => array(
                'pchiave_1_1' => 'pvalore_1_1',
                'pchiave_1_2' => 'pvalore_1_2'
            )
        ];

        $this->instance_2_transfer_2_metadata_2_payment_metadata = new paGetPayment(getPayload('paGetPayment','resp', $data_6));

        $data_7 = ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto'];
        $this->instance_fault = new paGetPayment(getPayload('paGetPayment','fault', $data_7));

    }

    #[TestDox('getCreditorReference()')]
    public function testGetCreditorReference()
    {
        $this->assertEquals('01000000000000003', $this->instance_1_transfer->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_2_metadata->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_2_metadata->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_1_metadata_2_payment->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_2_metadata_2_payment_metadata->getCreditorReference());
        $this->assertNull($this->instance_fault->getCreditorReference());

    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance_1_transfer->getTransferPa());
        $this->assertEquals('77777777777', $this->instance_2_transfer->getTransferPa());
        $this->assertEquals('77777777777', $this->instance_1_transfer_2_metadata->getTransferPa());
        $this->assertEquals('77777777777', $this->instance_2_transfer_2_metadata->getTransferPa());
        $this->assertEquals('77777777777', $this->instance_1_transfer_1_metadata_2_payment->getTransferPa());
        $this->assertEquals('77777777777', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferPa());
        $this->assertNull($this->instance_fault->getTransferPa());

    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000003', $this->instance_1_transfer->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_2_metadata->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_2_metadata->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_1_transfer_1_metadata_2_payment->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_2_metadata_2_payment_metadata->getIuv());
        $this->assertNull($this->instance_fault->getIuv());

    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->instance_1_transfer->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer->getOutcome());
        $this->assertEquals('OK', $this->instance_1_transfer_2_metadata->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer_2_metadata->getOutcome());
        $this->assertEquals('OK', $this->instance_1_transfer_1_metadata_2_payment->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer_2_metadata_2_payment_metadata->getOutcome());
        $this->assertEquals('KO', $this->instance_fault->getOutcome());

    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('50.50', $this->instance_1_transfer->getTransferAmount(0));
        $this->assertNull($this->instance_1_transfer->getTransferAmount(1));

        $this->assertEquals('50.50', $this->instance_2_transfer->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer->getTransferAmount(2));

        $this->assertEquals('50.50', $this->instance_1_transfer_2_metadata->getTransferAmount(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferAmount(1));

        $this->assertEquals('50.50', $this->instance_2_transfer_2_metadata->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer_2_metadata->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferAmount(2));

        $this->assertEquals('50.50', $this->instance_1_transfer_1_metadata_2_payment->getTransferAmount(0));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferAmount(1));

        $this->assertEquals('50.50', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferAmount(2));

        $this->assertNull($this->instance_fault->getTransferAmount(0));

    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertNull($this->instance_1_transfer->getPaEmittente(0));
        $this->assertNull($this->instance_2_transfer->getPaEmittente(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getPaEmittente(0));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_fault->getPaEmittente(0));

    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1_transfer->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer->getTransferCount());
        $this->assertEquals(1, $this->instance_1_transfer_2_metadata->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferCount());
        $this->assertEquals(1, $this->instance_1_transfer_1_metadata_2_payment->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferCount());
        $this->assertEquals(0, $this->instance_fault->getTransferCount());

    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(0));

        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(1));

        $this->assertEquals(2, $this->instance_1_transfer_2_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_transfer_2_metadata->getTransferMetaDataCount(1));

        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(2));

        $this->assertEquals(2, $this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataCount(1));


    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {

        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue(1, 1));

        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue(1, 2));

        $this->assertEquals('valore_1_1', $this->instance_1_transfer_2_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('valore_1_2', $this->instance_1_transfer_2_metadata->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(2, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(2, 1));


        $this->assertEquals('valore_1_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('valore_1_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(2, 0));
        $this->assertEquals('valore_2_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 1));
        $this->assertEquals('valore_2_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(2, 2));


        $this->assertEquals('valore_1_1', $this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataValue(0, 0));
        $this->assertEquals('valore_1_2', $this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataValue(2, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataValue(2, 1));


        $this->assertEquals('valore_1_1', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('valore_1_2', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(2, 0));
        $this->assertEquals('valore_2_1', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(0, 1));
        $this->assertEquals('valore_2_2', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataValue(2, 2));

        $this->assertNull($this->instance_fault->getTransferMetaDataValue(0, 0));

    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_1_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_transfer_2_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer_2_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_transfer_1_metadata_2_payment->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer_2_metadata_2_payment_metadata->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());

    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_1_transfer->isBollo(0));
        $this->assertFalse($this->instance_1_transfer->isBollo(1));

        $this->assertFalse($this->instance_2_transfer->isBollo(0));
        $this->assertFalse($this->instance_2_transfer->isBollo(1));
        $this->assertFalse($this->instance_2_transfer->isBollo(2));

        $this->assertFalse($this->instance_1_transfer_2_metadata->isBollo(0));
        $this->assertFalse($this->instance_1_transfer_2_metadata->isBollo(1));

        $this->assertFalse($this->instance_2_transfer_2_metadata->isBollo(0));
        $this->assertFalse($this->instance_2_transfer_2_metadata->isBollo(1));
        $this->assertFalse($this->instance_2_transfer_2_metadata->isBollo(2));

        $this->assertFalse($this->instance_1_transfer_1_metadata_2_payment->isBollo(0));
        $this->assertFalse($this->instance_1_transfer_1_metadata_2_payment->isBollo(1));

        $this->assertFalse($this->instance_2_transfer_2_metadata_2_payment_metadata->isBollo(0));
        $this->assertFalse($this->instance_2_transfer_2_metadata_2_payment_metadata->isBollo(1));
        $this->assertFalse($this->instance_2_transfer_2_metadata_2_payment_metadata->isBollo(2));

        $this->assertFalse($this->instance_fault->isBollo(0));

    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('50.50', $this->instance_1_transfer->getTotalAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer->getTotalAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_2_metadata->getTotalAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_2_metadata->getTotalAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_1_metadata_2_payment->getTotalAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTotalAmount());
        $this->assertNull($this->instance_fault->getTotalAmount());

    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertEquals(0, $this->instance_1_transfer->getPaymentMetaDataCount(0));
        $this->assertEquals(0, $this->instance_2_transfer->getPaymentMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_transfer_2_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(0, $this->instance_2_transfer_2_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(2, $this->instance_1_transfer_1_metadata_2_payment->getPaymentMetaDataCount(0));
        $this->assertEquals(2, $this->instance_2_transfer_2_metadata_2_payment_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(0, $this->instance_fault->getPaymentMetaDataCount(0));

    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_1_transfer->getFaultCode());
        $this->assertNull($this->instance_2_transfer->getFaultCode());
        $this->assertNull($this->instance_1_transfer_2_metadata->getFaultCode());
        $this->assertNull($this->instance_2_transfer_2_metadata->getFaultCode());
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getFaultCode());
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->instance_fault->getFaultCode());

    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertEquals('1', $this->instance_1_transfer->getTransferId(0));
        $this->assertNull($this->instance_1_transfer->getTransferId(1));

        $this->assertEquals('1', $this->instance_2_transfer->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer->getTransferId(1));
        $this->assertNull($this->instance_2_transfer->getTransferId(2));

        $this->assertEquals('1', $this->instance_1_transfer_2_metadata->getTransferId(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferId(1));

        $this->assertEquals('1', $this->instance_2_transfer_2_metadata->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer_2_metadata->getTransferId(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferId(2));

        $this->assertEquals('1', $this->instance_1_transfer_1_metadata_2_payment->getTransferId(0));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferId(1));

        $this->assertEquals('1', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferId(1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferId(2));

        $this->assertNull($this->instance_fault->getTransferId(0));

    }

    #[TestDox('getPaymentMetaDataName()')]
    public function testGetPaymentMetaDataName()
    {
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataName(0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataName(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataName(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataName(0));

        $this->assertEquals('pchiave_1_1', $this->instance_1_transfer_1_metadata_2_payment->getPaymentMetaDataName(0));
        $this->assertEquals('pchiave_1_2', $this->instance_1_transfer_1_metadata_2_payment->getPaymentMetaDataName(1));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getPaymentMetaDataName(2));

        $this->assertEquals('pchiave_1_1', $this->instance_2_transfer_2_metadata_2_payment_metadata->getPaymentMetaDataName(0));
        $this->assertEquals('pchiave_1_2', $this->instance_2_transfer_2_metadata_2_payment_metadata->getPaymentMetaDataName(1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getPaymentMetaDataName(2));

        $this->assertNull($this->instance_fault->getPaymentMetaDataName(0));

    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer->getTransferIban(0));;
        $this->assertNull($this->instance_1_transfer->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer->getTransferIban(2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer_2_metadata->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer_2_metadata->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer_2_metadata->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferIban(2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer_1_metadata_2_payment->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferIban(2));

        $this->assertNull($this->instance_fault->getTransferIban(0));

    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_1_transfer->getFaultString());
        $this->assertNull($this->instance_2_transfer->getFaultString());
        $this->assertNull($this->instance_1_transfer_2_metadata->getFaultString());
        $this->assertNull($this->instance_2_transfer_2_metadata->getFaultString());
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getFaultString());
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getFaultString());
        $this->assertEquals('Token scaduto', $this->instance_fault->getFaultString());

    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataValue(0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataValue(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataValue(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataValue(0));

        $this->assertEquals('pvalore_1_1', $this->instance_1_transfer_1_metadata_2_payment->getPaymentMetaDataValue(0));
        $this->assertEquals('pvalore_1_2', $this->instance_1_transfer_1_metadata_2_payment->getPaymentMetaDataValue(1));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getPaymentMetaDataValue(2));

        $this->assertEquals('pvalore_1_1', $this->instance_2_transfer_2_metadata_2_payment_metadata->getPaymentMetaDataValue(0));
        $this->assertEquals('pvalore_1_2', $this->instance_2_transfer_2_metadata_2_payment_metadata->getPaymentMetaDataValue(1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getPaymentMetaDataValue(2));

        $this->assertNull($this->instance_fault->getPaymentMetaDataValue(0));

    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('50.50', $this->instance_1_transfer->getAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer->getAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_2_metadata->getAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_2_metadata->getAmount());
        $this->assertEquals('50.50', $this->instance_1_transfer_1_metadata_2_payment->getAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_2_metadata_2_payment_metadata->getAmount());
        $this->assertNull($this->instance_fault->getAmount());


    }

    #[TestDox('getTransferMetaDataName()')]
    public function testGetTransferMetaDataName()
    {
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataName(0, 0));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataName(1, 1));

        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(0, 0));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(0, 2));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataName(1, 2));

        $this->assertEquals('chiave_1_1', $this->instance_1_transfer_2_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('chiave_1_2', $this->instance_1_transfer_2_metadata->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataName(2, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataName(2, 1));


        $this->assertEquals('chiave_1_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('chiave_1_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataName(2, 0));
        $this->assertEquals('chiave_2_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataName(0, 1));
        $this->assertEquals('chiave_2_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataName(2, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataName(0, 2));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataName(1, 2));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataName(2, 2));


        $this->assertEquals('chiave_1_1', $this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataName(0, 0));
        $this->assertEquals('chiave_1_2', $this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataName(2, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataName(0, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata_2_payment->getTransferMetaDataName(2, 1));


        $this->assertEquals('chiave_1_1', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('chiave_1_2', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(1, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(2, 0));
        $this->assertEquals('chiave_2_1', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(0, 1));
        $this->assertEquals('chiave_2_2', $this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(2, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(0, 2));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(1, 2));
        $this->assertNull($this->instance_2_transfer_2_metadata_2_payment_metadata->getTransferMetaDataName(2, 2));

        $this->assertNull($this->instance_fault->getTransferMetaDataName(0, 0));


    }
}
