<?php

namespace tests\ut\payload\resp;

use pagopa\sert\payload\methods\resp\activatePaymentNotice;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('pagopa\sert\payload\methods\resp\activatePaymentNotice::class')]
class activatePaymentNoticeTest extends TestCase
{

    protected array $data_1_transfer = [
        'iuv' => '00000000000000001',
        'pa_emittente' => '77777777777',
        'token' => 't0000000000000000000000000000001',
        'ccp' => '',
        'amount' => '90.45',
        'outcome' => 'OK',
        'transfers' => array(
            array(
                'id' => 1,
                'amount' => '90.45',
                'pa' => '77777777777',
                'iban' => 'IT0000000000000000000000001'
            ),
        )
    ];


    protected array $data_2_transfer = [
        'iuv' => '00000000000000002',
        'pa_emittente' => '77777777777',
        'token' => 't0000000000000000000000000000001',
        'ccp' => '',
        'amount' => '90.45',
        'outcome' => 'OK',
        'transfers' => array(
            array(
                'id' => 1,
                'amount' => '45.45',
                'pa' => '77777777777',
                'iban' => 'IT0000000000000000000000001'
            ),
            array(
                'id' => 2,
                'amount' => '45.00',
                'pa' => '77777777778',
                'iban' => 'IT0000000000000000000000002'
            )
        )
    ];


    protected array $data_1_transfer_1_metadata = [
        'iuv' => '00000000000000003',
        'pa_emittente' => '77777777777',
        'token' => 't0000000000000000000000000000001',
        'ccp' => '',
        'amount' => '90.45',
        'outcome' => 'OK',
        'transfers' => array(
            array(
                'id' => 1,
                'amount' => '90.45',
                'pa' => '77777777777',
                'iban' => 'IT0000000000000000000000001',
                'metadata' => array('chiave_1_1' => 'valore_1_1')
            )
        )
    ];

    protected array $data_1_transfer_2_metadata = [
        'iuv' => '00000000000000004',
        'pa_emittente' => '77777777777',
        'token' => 't0000000000000000000000000000001',
        'ccp' => '',
        'amount' => '90.45',
        'outcome' => 'OK',
        'transfers' => array(
            array(
                'id' => 1,
                'amount' => '90.45',
                'pa' => '77777777777',
                'iban' => 'IT0000000000000000000000001',
                'metadata' => array('chiave_1_1' => 'valore_1_1', 'chiave_1_2' => 'valore_1_2')
            )
        )
    ];

    protected array $data_2_transfer_2_metadata = [
        'iuv' => '00000000000000005',
        'pa_emittente' => '77777777777',
        'token' => 't0000000000000000000000000000001',
        'ccp' => '',
        'amount' => '90.45',
        'outcome' => 'OK',
        'transfers' => array(
            array(
                'id' => 1,
                'amount' => '45.45',
                'pa' => '77777777777',
                'iban' => 'IT0000000000000000000000001',
                'metadata' => array('chiave_1_1' => 'valore_1_1', 'chiave_1_2' => 'valore_1_2')
            ),
            array(
                'id' => 2,
                'amount' => '45.00',
                'pa' => '77777777778',
                'iban' => 'IT0000000000000000000000002',
                'metadata' => array('chiave_2_1' => 'valore_2_1', 'chiave_2_2' => 'valore_2_2')
            )
        )
    ];

    protected array $data_fault = [
        'fault' =>
            [
                'code' => 'PPT_ERRORE_EMESSO_DA_PAA',
                'string' => 'Errore restituito dalla PAA.',
                'description' => 'FaultCode PA: PAA_PAGAMENTO_SCADUTO'
            ]
    ];

    protected activatePaymentNotice $instance_1_transfer;

    protected activatePaymentNotice $instance_2_transfer;

    protected activatePaymentNotice $instance_1_transfer_1_metadata;

    protected activatePaymentNotice $instance_1_transfer_2_metadata;

    protected activatePaymentNotice $instance_2_transfer_2_metadata;

    protected activatePaymentNotice $instance_fault;

    protected function setUp(): void
    {
        $this->instance_1_transfer = new activatePaymentNotice(getPayload('activatePaymentNotice', 'resp', $this->data_1_transfer));
        $this->instance_2_transfer = new activatePaymentNotice(getPayload('activatePaymentNotice', 'resp', $this->data_2_transfer));
        $this->instance_1_transfer_1_metadata = new activatePaymentNotice(getPayload('activatePaymentNotice', 'resp', $this->data_1_transfer_1_metadata));
        $this->instance_1_transfer_2_metadata = new activatePaymentNotice(getPayload('activatePaymentNotice', 'resp', $this->data_1_transfer_2_metadata));
        $this->instance_2_transfer_2_metadata = new activatePaymentNotice(getPayload('activatePaymentNotice', 'resp', $this->data_2_transfer_2_metadata));
        $this->instance_fault = new activatePaymentNotice(getPayload('activatePaymentNotice', 'fault', $this->data_fault));

    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->instance_1_transfer->getBrokerPsp());
        $this->assertNull($this->instance_2_transfer->getBrokerPsp());
        $this->assertNull($this->instance_1_transfer_1_metadata->getBrokerPsp());
        $this->assertNull($this->instance_1_transfer_2_metadata->getBrokerPsp());
        $this->assertNull($this->instance_2_transfer_2_metadata->getBrokerPsp());
        $this->assertNull($this->instance_fault->getBrokerPsp());

    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->instance_1_transfer->outcome());
        $this->assertEquals('OK', $this->instance_2_transfer->outcome());
        $this->assertEquals('OK', $this->instance_1_transfer_1_metadata->outcome());
        $this->assertEquals('OK', $this->instance_1_transfer_2_metadata->outcome());
        $this->assertEquals('OK', $this->instance_2_transfer_2_metadata->outcome());
        $this->assertEquals('KO', $this->instance_fault->outcome());

    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $metadata = 0;
        $transfer = 0;
        $index = 0;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue($metadata, $transfer, $index));

        $metadata = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue($metadata, $transfer, $index));

        $metadata = 0;
        $transfer = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue($metadata, $transfer, $index));

        $metadata = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue($metadata, $transfer, $index));

        $metadata = 0;
        $transfer = 0;
        $index = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue($metadata, $transfer, $index));

        $metadata = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue($metadata, $transfer, $index));

        $metadata = 0;
        $transfer = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue($metadata, $transfer, $index));

        $metadata = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataValue($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataValue($metadata, $transfer, $index));




        $this->assertEquals('valore_1_1', $this->instance_1_transfer_1_metadata->getTransferMetaDataValue(0, 0 ,0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataValue(1, 0 ,0));

        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataValue(0, 1 ,0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataValue(1, 1 ,0));

        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataValue(0, 0 ,1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataValue(1, 0 ,1));

        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataValue(0, 1 ,1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataValue(1, 1 ,1));





        $this->assertEquals('valore_1_1', $this->instance_1_transfer_2_metadata->getTransferMetaDataValue(0, 0 ,0));
        $this->assertEquals('valore_1_2', $this->instance_1_transfer_2_metadata->getTransferMetaDataValue(1, 0 ,0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(2, 0 ,0));

        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(0, 1 ,0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(1, 1 ,0));

        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(0, 0 ,1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(1, 0 ,1));

        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(0, 1 ,1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataValue(1, 1 ,1));






        $this->assertEquals('valore_1_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 0 ,0));
        $this->assertEquals('valore_1_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 0 ,0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(2, 0 ,0));

        $this->assertEquals('valore_2_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 1 ,0));
        $this->assertEquals('valore_2_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 1 ,0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(2, 1 ,0));

        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 0 ,1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 0 ,1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(0, 1 ,1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(1, 1 ,1));

    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_1_transfer->isBollo(0));
        $this->assertFalse($this->instance_1_transfer->isBollo(1));

        $this->assertFalse($this->instance_2_transfer->isBollo(0));
        $this->assertFalse($this->instance_2_transfer->isBollo(1));

        $this->assertFalse($this->instance_1_transfer_1_metadata->isBollo(0));
        $this->assertFalse($this->instance_1_transfer_1_metadata->isBollo(1));

        $this->assertFalse($this->instance_1_transfer_2_metadata->isBollo(0));
        $this->assertFalse($this->instance_1_transfer_2_metadata->isBollo(1));

        $this->assertFalse($this->instance_2_transfer_2_metadata->isBollo(0));
        $this->assertFalse($this->instance_2_transfer_2_metadata->isBollo(1));

        $this->assertFalse($this->instance_fault->isBollo(0));
        $this->assertFalse($this->instance_fault->isBollo(1));

    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer->getTransferIban(1));
        $this->assertNull($this->instance_1_transfer->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_transfer->getTransferIban(1, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer->getTransferIban(2));
        $this->assertNull($this->instance_2_transfer->getTransferIban(0, 1));
        $this->assertNull($this->instance_2_transfer->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_transfer->getTransferIban(2, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer_1_metadata->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferIban(1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferIban(2, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_transfer_2_metadata->getTransferIban(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferIban(1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferIban(2, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_transfer_2_metadata->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_transfer_2_metadata->getTransferIban(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferIban(2));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferIban(2, 1));

        $this->assertNull($this->instance_fault->getTransferIban(0, 0));
        $this->assertNull($this->instance_fault->getTransferIban(1, 0));
        $this->assertNull($this->instance_fault->getTransferIban(0, 1));
        $this->assertNull($this->instance_fault->getTransferIban(1, 1));

    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->instance_1_transfer->getPsp());
        $this->assertNull($this->instance_2_transfer->getPsp());
        $this->assertNull($this->instance_1_transfer_1_metadata->getPsp());
        $this->assertNull($this->instance_1_transfer_2_metadata->getPsp());
        $this->assertNull($this->instance_2_transfer_2_metadata->getPsp());
        $this->assertNull($this->instance_fault->getPsp());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_1_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_transfer_1_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_transfer_2_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_2_transfer_2_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_fault->getPaymentsCount());

    }

    #[TestDox('isValidPayload()')]
    public function testIsValidPayload()
    {
        $this->assertTrue($this->instance_1_transfer->isValidPayload());
        $this->assertTrue($this->instance_2_transfer->isValidPayload());
        $this->assertTrue($this->instance_1_transfer_1_metadata->isValidPayload());
        $this->assertTrue($this->instance_1_transfer_2_metadata->isValidPayload());
        $this->assertTrue($this->instance_2_transfer_2_metadata->isValidPayload());
        $this->assertTrue($this->instance_fault->isValidPayload());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertEquals('1', $this->instance_1_transfer->getTransferId(0));
        $this->assertNull($this->instance_1_transfer->getTransferId(1));
        $this->assertNull($this->instance_1_transfer->getTransferId(0, 1));
        $this->assertNull($this->instance_1_transfer->getTransferId(1, 1));

        $this->assertEquals(1, $this->instance_2_transfer->getTransferId(0));
        $this->assertEquals(2, $this->instance_2_transfer->getTransferId(1));
        $this->assertNull($this->instance_2_transfer->getTransferId(2));
        $this->assertNull($this->instance_2_transfer->getTransferId(0, 1));
        $this->assertNull($this->instance_2_transfer->getTransferId(1, 1));
        $this->assertNull($this->instance_2_transfer->getTransferId(2, 1));


        $this->assertEquals('1', $this->instance_1_transfer_1_metadata->getTransferId(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferId(1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferId(1, 1));

        $this->assertEquals('1', $this->instance_1_transfer_2_metadata->getTransferId(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferId(1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferId(1, 1));

        $this->assertEquals('1', $this->instance_2_transfer_2_metadata->getTransferId(0));
        $this->assertEquals('2', $this->instance_2_transfer_2_metadata->getTransferId(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferId(2));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferId(2, 1));

        $this->assertNull($this->instance_fault->getTransferId(0));
        $this->assertNull($this->instance_fault->getTransferId(1));
        $this->assertNull($this->instance_fault->getTransferId(0, 1));
        $this->assertNull($this->instance_fault->getTransferId(1, 1));

    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance_1_transfer->getBrokerPa());
        $this->assertNull($this->instance_2_transfer->getBrokerPa());
        $this->assertNull($this->instance_1_transfer_1_metadata->getBrokerPa());
        $this->assertNull($this->instance_1_transfer_2_metadata->getBrokerPa());
        $this->assertNull($this->instance_2_transfer_2_metadata->getBrokerPa());
        $this->assertNull($this->instance_fault->getBrokerPa());

    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('00000000000000001', $this->instance_1_transfer->getIuv(0));
        $this->assertNull($this->instance_1_transfer->getIuv(1));

        $this->assertEquals('00000000000000002', $this->instance_2_transfer->getIuv(0));
        $this->assertNull($this->instance_2_transfer->getIuv(1));

        $this->assertEquals('00000000000000003', $this->instance_1_transfer_1_metadata->getIuv(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getIuv(1));

        $this->assertEquals('00000000000000004', $this->instance_1_transfer_2_metadata->getIuv(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getIuv(1));

        $this->assertEquals('00000000000000005', $this->instance_2_transfer_2_metadata->getIuv(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getIuv(1));

        $this->assertNull($this->instance_fault->getIuv(0));
        $this->assertNull($this->instance_fault->getIuv(1));



    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1_transfer->getPaEmittente(0));
        $this->assertNull($this->instance_1_transfer->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_2_transfer->getPaEmittente(0));
        $this->assertNull($this->instance_2_transfer->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_transfer_1_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_transfer_2_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_2_transfer_2_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaEmittente(1));

        $this->assertNull($this->instance_fault->getPaEmittente(0));
        $this->assertNull($this->instance_fault->getPaEmittente(1));


    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {

        $this->assertEquals('77777777777', $this->instance_1_transfer->getTransferPa(0, 0));
        $this->assertNull($this->instance_1_transfer->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_transfer->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_transfer->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_2_transfer->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_2_transfer->getTransferPa(1, 0));
        $this->assertNull($this->instance_2_transfer->getTransferPa(2, 0));
        $this->assertNull($this->instance_2_transfer->getTransferPa(0, 1));
        $this->assertNull($this->instance_2_transfer->getTransferPa(1, 1));
        $this->assertNull($this->instance_2_transfer->getTransferPa(2, 1));

        $this->assertEquals('77777777777', $this->instance_1_transfer_1_metadata->getTransferPa(0, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_1_transfer_2_metadata->getTransferPa(0, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_2_transfer_2_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_2_transfer_2_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferPa(2, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferPa(1, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferPa(2, 1));

    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $metadata = 0;
        $transfer = 0;
        $index = 0;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataKey($metadata, $transfer, $index));

        $metadata = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataKey($metadata, $transfer, $index));

        $metadata = 0;
        $transfer = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataKey($metadata, $transfer, $index));

        $metadata = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataKey($metadata, $transfer, $index));

        $metadata = 0;
        $transfer = 0;
        $index = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataKey($metadata, $transfer, $index));

        $metadata = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataKey($metadata, $transfer, $index));

        $metadata = 0;
        $transfer = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataKey($metadata, $transfer, $index));

        $metadata = 1;
        $this->assertNull($this->instance_1_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_2_transfer->getTransferMetaDataKey($metadata, $transfer, $index));
        $this->assertNull($this->instance_fault->getTransferMetaDataKey($metadata, $transfer, $index));




        $this->assertEquals('chiave_1_1', $this->instance_1_transfer_1_metadata->getTransferMetaDataKey(0, 0 ,0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataKey(1, 0 ,0));

        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataKey(0, 1 ,0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataKey(1, 1 ,0));

        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataKey(0, 0 ,1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataKey(1, 0 ,1));

        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataKey(0, 1 ,1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferMetaDataKey(1, 1 ,1));





        $this->assertEquals('chiave_1_1', $this->instance_1_transfer_2_metadata->getTransferMetaDataKey(0, 0 ,0));
        $this->assertEquals('chiave_1_2', $this->instance_1_transfer_2_metadata->getTransferMetaDataKey(1, 0 ,0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataKey(2, 0 ,0));

        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataKey(0, 1 ,0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataKey(1, 1 ,0));

        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataKey(0, 0 ,1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataKey(1, 0 ,1));

        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataKey(0, 1 ,1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferMetaDataKey(1, 1 ,1));






        $this->assertEquals('chiave_1_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataKey(0, 0 ,0));
        $this->assertEquals('chiave_1_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataKey(1, 0 ,0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataValue(2, 0 ,0));

        $this->assertEquals('chiave_2_1', $this->instance_2_transfer_2_metadata->getTransferMetaDataKey(0, 1 ,0));
        $this->assertEquals('chiave_2_2', $this->instance_2_transfer_2_metadata->getTransferMetaDataKey(1, 1 ,0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataKey(2, 1 ,0));

        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataKey(0, 0 ,1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataKey(1, 0 ,1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataKey(0, 1 ,1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferMetaDataKey(1, 1 ,1));

    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance_1_transfer->getStazione());
        $this->assertNull($this->instance_2_transfer->getStazione());
        $this->assertNull($this->instance_1_transfer_1_metadata->getStazione());
        $this->assertNull($this->instance_1_transfer_2_metadata->getStazione());
        $this->assertNull($this->instance_2_transfer_2_metadata->getStazione());
        $this->assertNull($this->instance_fault->getStazione());

    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->instance_1_transfer->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_2_transfer->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_1_transfer_1_metadata->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_1_transfer_2_metadata->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->instance_2_transfer_2_metadata->getPaEmittenti());
        $this->assertNull($this->instance_fault->getPaEmittenti());

    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertNull($this->instance_1_transfer->getCcp(0));
        $this->assertNull($this->instance_1_transfer->getCcp(1));

        $this->assertNull($this->instance_2_transfer->getCcp(0));
        $this->assertNull($this->instance_2_transfer->getCcp(1));

        $this->assertNull($this->instance_1_transfer_1_metadata->getCcp(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getCcp(1));

        $this->assertNull($this->instance_1_transfer_2_metadata->getCcp(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getCcp(1));

        $this->assertNull($this->instance_2_transfer_2_metadata->getCcp(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getCcp(1));

        $this->assertNull($this->instance_fault->getCcp(0));
        $this->assertNull($this->instance_fault->getCcp(1));

    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_transfer->getToken(0));
        $this->assertNull($this->instance_1_transfer->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_transfer->getToken(0));
        $this->assertNull($this->instance_2_transfer->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_transfer_1_metadata->getToken(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_transfer_2_metadata->getToken(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_transfer_2_metadata->getToken(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getToken(1));

        $this->assertNull($this->instance_fault->getToken(0));
        $this->assertNull($this->instance_fault->getToken(1));

    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_1_transfer->getNoticeNumber(0));
        $this->assertNull($this->instance_1_transfer->getNoticeNumber(1));
        $this->assertNull($this->instance_2_transfer->getNoticeNumber(0));
        $this->assertNull($this->instance_2_transfer->getNoticeNumber(1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getNoticeNumber(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getNoticeNumber(1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getNoticeNumber(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getNoticeNumber(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getNoticeNumber(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getNoticeNumber(1));
        $this->assertNull($this->instance_fault->getNoticeNumber(0));
        $this->assertNull($this->instance_fault->getNoticeNumber(1));

    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataCount(1));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataCount(1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataCount(1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataCount(1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataCount(1));
        $this->assertNull($this->instance_fault->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_fault->getPaymentMetaDataCount(1));
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance_1_transfer->getAllNoticesNumbers());
        $this->assertNull($this->instance_2_transfer->getAllNoticesNumbers());
        $this->assertNull($this->instance_1_transfer_1_metadata->getAllNoticesNumbers());
        $this->assertNull($this->instance_1_transfer_2_metadata->getAllNoticesNumbers());
        $this->assertNull($this->instance_2_transfer_2_metadata->getAllNoticesNumbers());
        $this->assertNull($this->instance_fault->getAllNoticesNumbers());

    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1_transfer->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer->getTransferCount());
        $this->assertEquals(1, $this->instance_1_transfer_1_metadata->getTransferCount());
        $this->assertEquals(1, $this->instance_1_transfer_2_metadata->getTransferCount());
        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferCount());
        $this->assertNull($this->instance_fault->getTransferCount());


    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {

        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataKey(1, 1));

        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataKey(1, 1));

        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataKey(1, 1));

        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataKey(1, 1));

        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataKey(1, 1));

        $this->assertNull($this->instance_fault->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_fault->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->instance_fault->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_fault->getPaymentMetaDataKey(1, 1));

    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['t0000000000000000000000000000001'], $this->instance_1_transfer->getAllTokens());
        $this->assertEquals(['t0000000000000000000000000000001'], $this->instance_2_transfer->getAllTokens());
        $this->assertEquals(['t0000000000000000000000000000001'], $this->instance_1_transfer_1_metadata->getAllTokens());
        $this->assertEquals(['t0000000000000000000000000000001'], $this->instance_1_transfer_2_metadata->getAllTokens());
        $this->assertEquals(['t0000000000000000000000000000001'], $this->instance_2_transfer_2_metadata->getAllTokens());
        $this->assertNull($this->instance_fault->getAllTokens());

    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('90.45', $this->instance_1_transfer->getImporto(0));
        $this->assertNull($this->instance_1_transfer->getImporto(1));

        $this->assertEquals('90.45', $this->instance_2_transfer->getImporto(0));
        $this->assertNull($this->instance_2_transfer->getImporto(1));

        $this->assertEquals('90.45', $this->instance_1_transfer_1_metadata->getImporto(0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getImporto(1));

        $this->assertEquals('90.45', $this->instance_1_transfer_2_metadata->getImporto(0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getImporto(1));

        $this->assertEquals('90.45', $this->instance_2_transfer_2_metadata->getImporto(0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getImporto(1));

        $this->assertNull($this->instance_fault->getImporto(0));
        $this->assertNull($this->instance_fault->getImporto(1));
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['00000000000000001'], $this->instance_1_transfer->getIuvs());
        $this->assertEquals(['00000000000000002'], $this->instance_2_transfer->getIuvs());
        $this->assertEquals(['00000000000000003'], $this->instance_1_transfer_1_metadata->getIuvs());
        $this->assertEquals(['00000000000000004'], $this->instance_1_transfer_2_metadata->getIuvs());
        $this->assertEquals(['00000000000000005'], $this->instance_2_transfer_2_metadata->getIuvs());
        $this->assertNull($this->instance_fault->getIuvs());

    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('90.45', $this->instance_1_transfer->getImportoTotale());
        $this->assertEquals('90.45', $this->instance_2_transfer->getImportoTotale());
        $this->assertEquals('90.45', $this->instance_1_transfer_1_metadata->getImportoTotale());
        $this->assertEquals('90.45', $this->instance_1_transfer_2_metadata->getImportoTotale());
        $this->assertEquals('90.45', $this->instance_2_transfer_2_metadata->getImportoTotale());
        $this->assertNull($this->instance_fault->getImportoTotale());

    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->instance_1_transfer->getCanale());
        $this->assertNull($this->instance_2_transfer->getCanale());
        $this->assertNull($this->instance_1_transfer_1_metadata->getCanale());
        $this->assertNull($this->instance_1_transfer_2_metadata->getCanale());
        $this->assertNull($this->instance_2_transfer_2_metadata->getCanale());
        $this->assertNull($this->instance_fault->getCanale());

    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer->getPaymentMetaDataValue(1, 1));

        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_transfer->getPaymentMetaDataValue(1, 1));

        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getPaymentMetaDataValue(1, 1));

        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getPaymentMetaDataValue(1, 1));

        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getPaymentMetaDataValue(1, 1));

        $this->assertNull($this->instance_fault->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_fault->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_fault->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_fault->getPaymentMetaDataValue(1, 1));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('90.45', $this->instance_1_transfer->getTransferAmount(0,0));
        $this->assertNull($this->instance_1_transfer->getTransferAmount(1,0));
        $this->assertNull($this->instance_1_transfer->getTransferAmount(0,1));
        $this->assertNull($this->instance_1_transfer->getTransferAmount(1,1));

        $this->assertEquals('45.45', $this->instance_2_transfer->getTransferAmount(0,0));
        $this->assertEquals('45.00', $this->instance_2_transfer->getTransferAmount(1,0));
        $this->assertNull($this->instance_2_transfer->getTransferAmount(0,1));
        $this->assertNull($this->instance_2_transfer->getTransferAmount(1,1));

        $this->assertEquals('90.45', $this->instance_1_transfer_1_metadata->getTransferAmount(0,0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferAmount(1,0));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferAmount(0,1));
        $this->assertNull($this->instance_1_transfer_1_metadata->getTransferAmount(1,1));

        $this->assertEquals('90.45', $this->instance_1_transfer_2_metadata->getTransferAmount(0,0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferAmount(1,0));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferAmount(0,1));
        $this->assertNull($this->instance_1_transfer_2_metadata->getTransferAmount(1,1));

        $this->assertEquals('45.45', $this->instance_2_transfer_2_metadata->getTransferAmount(0,0));
        $this->assertEquals('45.00', $this->instance_2_transfer_2_metadata->getTransferAmount(1,0));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferAmount(0,1));
        $this->assertNull($this->instance_2_transfer_2_metadata->getTransferAmount(1,1));

        $this->assertNull($this->instance_fault->getTransferAmount(0,0));
        $this->assertNull($this->instance_fault->getTransferAmount(1,0));
        $this->assertNull($this->instance_fault->getTransferAmount(0,1));
        $this->assertNull($this->instance_fault->getTransferAmount(1,1));

    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertNull($this->instance_1_transfer->getCcps());
        $this->assertNull($this->instance_2_transfer->getCcps());
        $this->assertNull($this->instance_1_transfer_1_metadata->getCcps());
        $this->assertNull($this->instance_1_transfer_2_metadata->getCcps());
        $this->assertNull($this->instance_2_transfer_2_metadata->getCcps());
        $this->assertNull($this->instance_fault->getCcps());

    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_1_transfer->getTransferMetaDataCount(1, 1));

        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_2_transfer->getTransferMetaDataCount(1, 1));

        $this->assertEquals(1, $this->instance_1_transfer_1_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_transfer_1_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_1_transfer_1_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_1_transfer_1_metadata->getTransferMetaDataCount(1, 1));

        $this->assertEquals(2, $this->instance_1_transfer_2_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_transfer_2_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_1_transfer_2_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_1_transfer_2_metadata->getTransferMetaDataCount(1, 1));

        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_2_transfer_2_metadata->getTransferMetaDataCount(1, 1));

    }
}
