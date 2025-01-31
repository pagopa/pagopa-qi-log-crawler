<?php
namespace payload\resp;

use pagopa\sert\payload\resp\activatePaymentNotice;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\CoversClass;

#[TestDox('pagopa\sert\payload\resp\activatePaymentNotice::class')]
#[CoversClass(activatePaymentNotice::class)]
class activatePaymentNoticeTest extends TestCase
{


    protected activatePaymentNotice $instance_1_transfer;
    protected activatePaymentNotice $instance_2_transfer;
    protected activatePaymentNotice $instance_2_transfer_2_metadata;

    protected activatePaymentNotice $instance_fault;
    protected function setUp(): void
    {
        $data_1 = [
            'iuv' => '01000000000000001',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000001',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '100.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777'
                ]
            ]
        ];

        $this->instance_1_transfer = new activatePaymentNotice(getPayload('activatePaymentNotice','resp', $data_1));

        $data_2 = [
            'iuv' => '01000000000000002',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000002',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777'
                ],
                [
                    'id' => '2',
                    'amount' => '50.00',
                    'iban' => 'IT0000000000000000000000002',
                    'pa' => '77777777778'
                ]
            ]
        ];

        $this->instance_2_transfer = new activatePaymentNotice(getPayload('activatePaymentNotice','resp', $data_2));


        $data_3 = [
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

        $this->instance_2_transfer_2_metadata = new activatePaymentNotice(getPayload('activatePaymentNotice','resp', $data_3));

        $this->instance_fault = new activatePaymentNotice(getPayload('activatePaymentNotice','fault', ['code' => 'PPT_TOKEN_SCADUTO', 'string' => 'Token scaduto', 'description' => 'Token scaduto']));

    }

    /**
     * @return void
     */
    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_1_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer_2_metadata->getPaymentsCount());
        $this->assertEquals(0, $this->instance_fault->getPaymentsCount());
    }

    #[TestDox('getCreditorReference()')]
    public function testGetCreditorReference()
    {
        $this->assertEquals('01000000000000001', $this->instance_1_transfer->getCreditorReference());
        $this->assertEquals('01000000000000002', $this->instance_2_transfer->getCreditorReference());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_2_metadata->getCreditorReference());
        $this->assertNull($this->instance_fault->getCreditorReference());

    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('100.50', $this->instance_1_transfer->getTotalAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer->getTotalAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_2_metadata->getTotalAmount());
        $this->assertNull($this->instance_fault->getTotalAmount());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_1_transfer->getFaultCode());
        $this->assertNull($this->instance_2_transfer->getFaultCode());
        $this->assertNull($this->instance_2_transfer_2_metadata->getFaultCode());
        $this->assertEquals('PPT_TOKEN_SCADUTO', $this->instance_fault->getFaultCode());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(0));
        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(1));

        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(0));
        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(1));
        $this->assertEquals(0, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(2));

        $this->assertEquals(0, $this->instance_fault->getTransferMetaDataCount(0));
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_1_transfer->getFaultString());
        $this->assertNull($this->instance_2_transfer->getFaultString());
        $this->assertNull($this->instance_2_transfer_2_metadata->getFaultString());
        $this->assertEquals('Token scaduto', $this->instance_fault->getFaultString());
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance_1_transfer->getTransferPa(0));
        $this->assertNull($this->instance_1_transfer->getTransferPa(1));

        $this->assertEquals('77777777777', $this->instance_2_transfer->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_2_transfer->getTransferPa(1));
        $this->assertNull($this->instance_2_transfer->getTransferPa(2));

        $this->assertEquals('77777777777', $this->instance_2_transfer_2_metadata->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_2_transfer_2_metadata->getTransferPa(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferPa(2));

        $this->assertNull($this->instance_fault->getTransferPa(0));
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

        $this->assertEquals('valore_1_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 0));
        $this->assertEquals('valore_1_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 0));
        $this->assertEquals('valore_2_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 1));
        $this->assertEquals('valore_2_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(2, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 2));

        $this->assertNull($this->instance_fault->getTransferMetaDataValue(0, 0));
    }

    #[TestDox('getOutcome()')]
    public function testGetOutcome()
    {
        $this->assertEquals('OK', $this->instance_1_transfer->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer->getOutcome());
        $this->assertEquals('OK', $this->instance_2_transfer_2_metadata->getOutcome());
        $this->assertEquals('KO', $this->instance_fault->getOutcome());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('100.50', $this->instance_1_transfer->getTransferAmount(0));
        $this->assertNull($this->instance_1_transfer->getTransferAmount(1));

        $this->assertEquals('50.50', $this->instance_2_transfer->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer->getTransferAmount(2));

        $this->assertEquals('50.50', $this->instance_2_transfer_2_metadata->getTransferAmount(0));
        $this->assertEquals('50.00', $this->instance_2_transfer_2_metadata->getTransferAmount(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferAmount(2));

        $this->assertNull($this->instance_fault->getTransferAmount(0));
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertEquals('1', $this->instance_1_transfer->getTransferId(0));
        $this->assertNull($this->instance_1_transfer->getTransferId(1));

        $this->assertEquals('1', $this->instance_2_transfer->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer->getTransferId(1));
        $this->assertNull($this->instance_2_transfer->getTransferId(2));

        $this->assertEquals('1', $this->instance_2_transfer_2_metadata->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer_2_metadata->getTransferId(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferId(2));

        $this->assertNull($this->instance_fault->getTransferId(0));
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1_transfer->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_transfer->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_transfer_2_metadata->getPaEmittente());
        $this->assertNull($this->instance_fault->getPaEmittente());
    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('100.50', $this->instance_1_transfer->getAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer->getAmount());
        $this->assertEquals('100.50', $this->instance_2_transfer_2_metadata->getAmount());
        $this->assertNull($this->instance_fault->getAmount());
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->instance_1_transfer->getIuv());
        $this->assertEquals('01000000000000002', $this->instance_2_transfer->getIuv());
        $this->assertEquals('01000000000000003', $this->instance_2_transfer_2_metadata->getIuv());
        $this->assertNull($this->instance_fault->getIuv());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_transfer->getToken());
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_transfer->getToken());
        $this->assertEquals('t0000000000000000000000000000003', $this->instance_2_transfer_2_metadata->getToken());
        $this->assertNull($this->instance_fault->getToken());
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

        $this->assertEquals('chiave_1_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataName(0, 0));
        $this->assertEquals('chiave_1_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataName(1, 0));
        $this->assertEquals('chiave_2_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataName(0, 1));
        $this->assertEquals('chiave_2_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataName(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataName(2, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataName(2, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataName(0, 2));

        $this->assertNull($this->instance_fault->getTransferMetaDataName(0, 0));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer->getTransferIban(2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer_2_metadata->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer_2_metadata->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferIban(2));

        $this->assertNull($this->instance_fault->getTransferIban(0));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1_transfer->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferCount());
        $this->assertEquals(0, $this->instance_fault->getTransferCount());
    }
}
