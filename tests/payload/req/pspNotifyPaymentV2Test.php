<?php

namespace payload\req;

use pagopa\sert\payload\req\pspNotifyPaymentV2;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\pspNotifyPaymentV2')]
#[CoversClass(pspNotifyPaymentV2::class)]
class pspNotifyPaymentV2Test extends TestCase
{

    protected pspNotifyPaymentV2 $instance_1_payment_1_transfer;
    protected pspNotifyPaymentV2 $instance_1_payment_1_transfer_t_metadata;
    protected pspNotifyPaymentV2 $instance_1_payment_1_transfer_p_metadata;
    protected pspNotifyPaymentV2 $instance_1_payment_1_transfer_t_metadata_p_metadata;
    protected pspNotifyPaymentV2 $instance_1_payment_2_transfer;
    protected pspNotifyPaymentV2 $instance_1_payment_2_transfer_t_metadata;
    protected pspNotifyPaymentV2 $instance_1_payment_2_transfer_p_metadata;
    protected pspNotifyPaymentV2 $instance_1_payment_2_transfer_t_metadata_p_metadata;
    protected pspNotifyPaymentV2 $instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata;
    protected pspNotifyPaymentV2 $instance_2_payment_1_transfer;
    protected pspNotifyPaymentV2 $instance_2_payment_1_transfer_t_metadata;
    protected pspNotifyPaymentV2 $instance_2_payment_1_transfer_p_metadata;
    protected pspNotifyPaymentV2 $instance_2_payment_1_transfer_t_metadata_p_metadata;
    protected pspNotifyPaymentV2 $instance_2_payment_2_transfer;
    protected pspNotifyPaymentV2 $instance_2_payment_2_transfer_t_metadata;
    protected pspNotifyPaymentV2 $instance_2_payment_2_transfer_p_metadata;
    protected pspNotifyPaymentV2 $instance_2_payment_2_transfer_t_metadata_p_metadata;
    protected pspNotifyPaymentV2 $instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata;


    protected function setUp(): void
    {
        $data = [
            'totalAmount' => '300.00',
            'outcome' => 'OK',
            'brokerpa' => '77777777777',
            'station' => '77777777777_01',
            'psp' => 'AGID_01',
            'channel' => '88888888888_01',
            'brokerpsp' => '88888888888',
            'payments' => [
                [
                    'nav' => '301000000000000001',
                    'iuv' => '01000000000000001',
                    'pa_emittente' => '77777777777',
                    'amount' => '150.00',
                    'token' => 't0000000000000000000000000000001',
                    'transfers' => [
                        [
                            'id' => '1',
                            'amount' => '50.50',
                            'iban' => 'IT0000000000000000000000001',
                            'pa' => '77777777777',
                            'metadata' => array(
                                't_key_1_1_1' => 't_value_1_1_1',
                                't_key_1_1_2' => 't_value_1_1_2'
                            )
                        ],
                        [
                            'id' => '2',
                            'amount' => '99.50',
                            'iban' => 'IT0000000000000000000000002',
                            'pa' => '77777777778',
                            'metadata' => array(
                                't_key_1_2_1' => 't_value_1_2_1',
                                't_key_1_2_2' => 't_value_1_2_2'
                            )
                        ],
                    ],
                    'metadata' => array(
                        'p_key_1_1' => 'p_value_1_1',
                        'p_key_1_2' => 'p_value_1_2'
                    )
                ],
                [
                    'nav' => '301000000000000002',
                    'iuv' => '01000000000000002',
                    'pa_emittente' => '87777777777',
                    'amount' => '150.00',
                    'token' => 't0000000000000000000000000000002',
                    'transfers' => [
                        [
                            'id' => '1',
                            'amount' => '40.50',
                            'iban' => 'IT0000000000000000000000003',
                            'pa' => '87777777777',
                            'metadata' => array(
                                't_key_2_1_1' => 't_value_2_1_1',
                                't_key_2_1_2' => 't_value_2_1_2'
                            )
                        ],
                        [
                            'id' => '2',
                            'amount' => '109.50',
                            'iban' => 'IT0000000000000000000000004',
                            'pa' => '87777777778',
                            'metadata' => array(
                                't_key_2_2_1' => 't_value_2_2_1',
                                't_key_2_2_2' => 't_value_2_2_2'
                            )
                        ],
                    ],
                    'metadata' => array(
                        'p_key_2_1' => 'p_value_2_1',
                        'p_key_2_2' => 'p_value_2_2'
                    )
                ]
            ]
        ];

        $tmp_data = $data; // 1 payment, 1 transfer, no metadata in payment e tranasfer
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '150.00'; // modifico l'amount per essere coerente con il totale
        $tmp_data['totalAmount'] = '150.00'; // modifico il totale dell'importo per essere coerente con tutto
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        unset($tmp_data['payments'][0]['metadata']); // elimino i metadata del payment 0
        unset($tmp_data['payments'][0]['transfers'][1]); // elimino il 2° transfer dal primo payment
        unset($tmp_data['payments'][0]['transfers'][0]['metadata']); // elimino i metadata del primo transfer dal primo payment
        $this->instance_1_payment_1_transfer = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 1 payment, 1 transfer, metadata solo nel transfer
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '150.00'; // modifico l'amount per essere coerente con il totale
        $tmp_data['totalAmount'] = '150.00'; // modifico il totale dell'importo per essere coerente con tutto
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        unset($tmp_data['payments'][0]['metadata']); // elimino i metadata del payment 0
        unset($tmp_data['payments'][0]['transfers'][1]); // elimino il 2° transfer dal primo payment
        $this->instance_1_payment_1_transfer_t_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));


        $tmp_data = $data; // 1 payment, 1 transfer, metadata solo nel payment
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '150.00'; // modifico l'amount per essere coerente con il totale
        $tmp_data['totalAmount'] = '150.00'; // modifico il totale dell'importo per essere coerente con tutto
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        unset($tmp_data['payments'][0]['transfers'][1]); // elimino il 2° transfer dal primo payment
        unset($tmp_data['payments'][0]['transfers'][0]['metadata']); // elimino i metadata del primo transfer dal primo payment
        $this->instance_1_payment_1_transfer_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 1 payment, 1 transfer, metadata in payment e transfer
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '150.00'; // modifico l'amount per essere coerente con il totale
        $tmp_data['totalAmount'] = '150.00'; // modifico il totale dell'importo per essere coerente con tutto
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        unset($tmp_data['payments'][0]['transfers'][1]); // elimino il 2° transfer dal primo payment
        $this->instance_1_payment_1_transfer_t_metadata_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 1 payment, 2 transfer, no metadata
        $tmp_data['totalAmount'] = '150.00'; // modifico il totale dell'importo per essere coerente con tutto
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        unset($tmp_data['payments'][0]['metadata']); // elimino i metadata del payment 0
        unset($tmp_data['payments'][0]['transfers'][0]['metadata']); // elimino i metadata del primo transfer dal primo payment
        unset($tmp_data['payments'][0]['transfers'][1]['metadata']); // elimino i metadata del secondo transfer dal primo payment
        $this->instance_1_payment_2_transfer = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 1 payment, 2 transfer, metadata solo nei transfer
        $tmp_data['totalAmount'] = '150.00'; // modifico il totale dell'importo per essere coerente con tutto
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        unset($tmp_data['payments'][0]['metadata']); // elimino i metadata del payment 0
        $this->instance_1_payment_2_transfer_t_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 1 payment, 2 transfer, metadata solo nel payment
        $tmp_data['totalAmount'] = '150.00'; // modifico il totale dell'importo per essere coerente con tutto
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        unset($tmp_data['payments'][0]['transfers'][0]['metadata']); // elimino i metadata del primo transfer dal primo payment
        unset($tmp_data['payments'][0]['transfers'][1]['metadata']); // elimino i metadata del secondo transfer dal primo payment
        $this->instance_1_payment_2_transfer_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 1 payment, 2 transfer, metadata nel transfer e payment
        $tmp_data['totalAmount'] = '150.00'; // modifico il totale dell'importo per essere coerente con tutto
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        $this->instance_1_payment_2_transfer_t_metadata_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 1 payment, 2 transfer, metadata su payment e transfer, 2° transfer di tipo bollo
        $tmp_data['totalAmount'] = '66.50'; // modifico il totale dell'importo per essere coerente con tutto
        $tmp_data['payments'][0]['amount'] = '66.50'; // modifico l'amount per essere coerente con il totale
        unset($tmp_data['payments'][1]); // elimino il 2° payment
        unset($tmp_data['payments'][0]['transfers'][1]['iban']); // elimino l'iban dal secondo transfer
        $tmp_data['payments'][0]['transfers'][1]['richiestaMarcaDaBollo'] = 'dummy'; // creo la marca da bollo
        $tmp_data['payments'][0]['transfers'][1]['amount'] = '16.00'; // imposto il transfer della marca da bollo
        $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 1 transfer per payment, no metadata
        unset($tmp_data['payments'][0]['transfers'][1]); // elimino 2° transfer da 1° payment
        unset($tmp_data['payments'][1]['transfers'][1]); // elimino 2° transfer da 2° payment
        unset($tmp_data['payments'][0]['transfers'][0]['metadata']); // elimino metadata dal 1° transfer del 1° payment
        unset($tmp_data['payments'][1]['transfers'][0]['metadata']); // elimino metadata dal 1° transfer del 2° payment
        unset($tmp_data['payments'][0]['metadata']); // elimino metadata dal 1° payment
        unset($tmp_data['payments'][1]['metadata']); // elimino metadata dal 2° payment
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '150.00'; // aggiorno importo per coerenza del 1° transfer del 1° payment
        $tmp_data['payments'][1]['transfers'][0]['amount'] = '150.00'; // aggiorno importo per coerenza del 1° transfer del 2° payment
        $this->instance_2_payment_1_transfer = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 1 transfer per payment, metadata solo nei transfer
        unset($tmp_data['payments'][0]['transfers'][1]); // elimino 2° transfer da 1° payment
        unset($tmp_data['payments'][1]['transfers'][1]); // elimino 2° transfer da 2° payment
        unset($tmp_data['payments'][0]['metadata']); // elimino metadata dal 1° payment
        unset($tmp_data['payments'][1]['metadata']); // elimino metadata dal 2° payment
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '150.00'; // aggiorno importo per coerenza del 1° transfer del 1° payment
        $tmp_data['payments'][1]['transfers'][0]['amount'] = '150.00'; // aggiorno importo per coerenza del 1° transfer del 2° payment
        $this->instance_2_payment_1_transfer_t_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 1 transfer per payment, metadata solo nei payment
        unset($tmp_data['payments'][0]['transfers'][1]); // elimino 2° transfer da 1° payment
        unset($tmp_data['payments'][1]['transfers'][1]); // elimino 2° transfer da 2° payment
        unset($tmp_data['payments'][0]['transfers'][0]['metadata']); // elimino metadata dal 1° transfer del 1° payment
        unset($tmp_data['payments'][1]['transfers'][0]['metadata']); // elimino metadata dal 1° transfer del 2° payment
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '150.00'; // aggiorno importo per coerenza del 1° transfer del 1° payment
        $tmp_data['payments'][1]['transfers'][0]['amount'] = '150.00'; // aggiorno importo per coerenza del 1° transfer del 2° payment
        $this->instance_2_payment_1_transfer_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 1 transfer per payment, metadata in transfer e payment
        unset($tmp_data['payments'][0]['transfers'][1]); // elimino 2° transfer da 1° payment
        unset($tmp_data['payments'][1]['transfers'][1]); // elimino 2° transfer da 2° payment
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '150.00'; // aggiorno importo per coerenza del 1° transfer del 1° payment
        $tmp_data['payments'][1]['transfers'][0]['amount'] = '150.00'; // aggiorno importo per coerenza del 1° transfer del 2° payment
        $this->instance_2_payment_1_transfer_t_metadata_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 2 transfer per payment, no metadata
        unset($tmp_data['payments'][0]['metadata']); // elimino metadata dal 1° payment
        unset($tmp_data['payments'][1]['metadata']); // elimino metadata dal 2° payment
        unset($tmp_data['payments'][0]['transfers'][0]['metadata']); // elimino metadata dal 1° transfer del 1° payment
        unset($tmp_data['payments'][0]['transfers'][1]['metadata']); // elimino metadata dal 2° transfer del 1° payment
        unset($tmp_data['payments'][1]['transfers'][0]['metadata']); // elimino metadata dal 1° transfer del 2° payment
        unset($tmp_data['payments'][1]['transfers'][1]['metadata']); // elimino metadata dal 2° transfer del 2° payment
        $this->instance_2_payment_2_transfer = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 2 transfer per payment, metadata solo nei transfer
        unset($tmp_data['payments'][0]['metadata']); // elimino metadata dal 1° payment
        unset($tmp_data['payments'][1]['metadata']); // elimino metadata dal 2° payment
        $this->instance_2_payment_2_transfer_t_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 2 transfer per payment, metadata solo nei payment
        unset($tmp_data['payments'][0]['transfers'][0]['metadata']); // elimino metadata dal 1° transfer del 1° payment
        unset($tmp_data['payments'][0]['transfers'][1]['metadata']); // elimino metadata dal 2° transfer del 1° payment
        unset($tmp_data['payments'][1]['transfers'][0]['metadata']); // elimino metadata dal 1° transfer del 2° payment
        unset($tmp_data['payments'][1]['transfers'][1]['metadata']); // elimino metadata dal 2° transfer del 2° payment
        $this->instance_2_payment_2_transfer_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 2 transfer per payment, metadata in payment e transfer
        $this->instance_2_payment_2_transfer_t_metadata_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

        $tmp_data = $data; // 2 payment, 2 transfer per payment, 1 bollo nel primo transfer del primo payment, metadata in payment e transfer
        $tmp_data['totalAmount'] = '265.50'; // modifico il totalAmount per coerenza totale importo
        $tmp_data['payments'][0]['amount'] = '115.50'; // modifico l'amount del primo payment per coerenza con l'importo
        unset($tmp_data['payments'][0]['transfers'][0]['iban']); // elimino l'iban dal primo transfer
        $tmp_data['payments'][0]['transfers'][0]['richiestaMarcaDaBollo'] = 'dummy'; // creo la marca da bollo
        $tmp_data['payments'][0]['transfers'][0]['amount'] = '16.00'; // imposto il transfer della marca da bollo
        $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata = new pspNotifyPaymentV2(getPayload('pspNotifyPaymentV2','req', $tmp_data));

    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1_payment_1_transfer->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer->getTransferCount(1));

        $this->assertEquals(1, $this->instance_1_payment_1_transfer_t_metadata->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer_t_metadata->getTransferCount(1));

        $this->assertEquals(1, $this->instance_1_payment_1_transfer_p_metadata->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer_p_metadata->getTransferCount(1));

        $this->assertEquals(1, $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferCount(1));

        $this->assertEquals(2, $this->instance_1_payment_2_transfer->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer->getTransferCount(1));

        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_t_metadata->getTransferCount(1));

        $this->assertEquals(2, $this->instance_1_payment_2_transfer_p_metadata->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_p_metadata->getTransferCount(1));

        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferCount(1));

        $this->assertEquals(2, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferCount(0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferCount(1));


        $this->assertEquals(1, $this->instance_2_payment_1_transfer->getTransferCount(0));
        $this->assertEquals(1, $this->instance_2_payment_1_transfer->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer->getTransferCount(2));

        $this->assertEquals(1, $this->instance_2_payment_1_transfer_t_metadata->getTransferCount(0));
        $this->assertEquals(1, $this->instance_2_payment_1_transfer_t_metadata->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_t_metadata->getTransferCount(2));

        $this->assertEquals(1, $this->instance_2_payment_1_transfer_p_metadata->getTransferCount(0));
        $this->assertEquals(1, $this->instance_2_payment_1_transfer_p_metadata->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_p_metadata->getTransferCount(2));

        $this->assertEquals(1, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferCount(0));
        $this->assertEquals(1, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferCount(2));

        $this->assertEquals(2, $this->instance_2_payment_2_transfer->getTransferCount(0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferCount(2));

        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getTransferCount(0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata->getTransferCount(2));

        $this->assertEquals(2, $this->instance_2_payment_2_transfer_p_metadata->getTransferCount(0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_p_metadata->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferCount(2));

        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferCount(0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferCount(2));

        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferCount(0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferCount(1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferCount(2));

    }

    #[TestDox('getCreditorReference()')]
    public function testGetCreditorReference()
    {

        $this->assertEquals('01000000000000001', $this->instance_1_payment_1_transfer->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_1_transfer->getCreditorReference(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_1_transfer_t_metadata->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getCreditorReference(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_1_transfer_p_metadata->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getCreditorReference(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getCreditorReference(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_2_transfer->getCreditorReference(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer_t_metadata->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getCreditorReference(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer_p_metadata->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getCreditorReference(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getCreditorReference(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getCreditorReference(0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getCreditorReference(1));


        $this->assertEquals('01000000000000001', $this->instance_2_payment_1_transfer->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_1_transfer->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_1_transfer->getCreditorReference(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_1_transfer_t_metadata->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_1_transfer_t_metadata->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getCreditorReference(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_1_transfer_p_metadata->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_1_transfer_p_metadata->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getCreditorReference(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getCreditorReference(2));


        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_2_transfer->getCreditorReference(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer_t_metadata->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer_t_metadata->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getCreditorReference(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer_p_metadata->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer_p_metadata->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getCreditorReference(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getCreditorReference(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getCreditorReference(1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getCreditorReference(2));

    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertEquals('AGID_01', $this->instance_1_payment_1_transfer->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_payment_1_transfer_t_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_payment_1_transfer_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_payment_2_transfer->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_payment_2_transfer_t_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_payment_2_transfer_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_1_transfer->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_1_transfer_t_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_1_transfer_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_2_transfer->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_2_transfer_t_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_2_transfer_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPspId());
        $this->assertEquals('AGID_01', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPspId());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertEquals(1, $this->instance_1_payment_1_transfer->getTransferId(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferId(1, 1));

        $this->assertEquals(1, $this->instance_1_payment_1_transfer_t_metadata->getTransferId(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferId(1, 1));


        $this->assertEquals(1, $this->instance_1_payment_1_transfer_p_metadata->getTransferId(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferId(1, 1));


        $this->assertEquals(1, $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferId(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferId(1, 1));

        $this->assertEquals(1, $this->instance_1_payment_2_transfer->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferId(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferId(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferId(2, 1));


        $this->assertEquals(1, $this->instance_1_payment_2_transfer_t_metadata->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferId(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferId(2, 1));


        $this->assertEquals(1, $this->instance_1_payment_2_transfer_p_metadata->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_p_metadata->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferId(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferId(2, 1));

        $this->assertEquals(1, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferId(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferId(2, 1));

        $this->assertEquals(1, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(2, 1));


        $this->assertEquals(1, $this->instance_2_payment_1_transfer->getTransferId(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_1_transfer->getTransferId(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferId(1, 2));

        $this->assertEquals(1, $this->instance_2_payment_1_transfer_t_metadata->getTransferId(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_1_transfer_t_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferId(1, 2));

        $this->assertEquals(1, $this->instance_2_payment_1_transfer_p_metadata->getTransferId(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_1_transfer_p_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferId(1, 2));

        $this->assertEquals(1, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferId(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferId(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferId(1, 2));

        $this->assertEquals(1, $this->instance_2_payment_2_transfer->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_2_transfer->getTransferId(0, 1));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferId(1, 2));

        $this->assertEquals(1, $this->instance_2_payment_2_transfer_t_metadata->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_2_transfer_t_metadata->getTransferId(0, 1));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferId(1, 2));


        $this->assertEquals(1, $this->instance_2_payment_2_transfer_p_metadata->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_p_metadata->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_2_transfer_p_metadata->getTransferId(0, 1));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_p_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferId(1, 2));


        $this->assertEquals(1, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferId(0, 1));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferId(1, 2));


        $this->assertEquals(1, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(0, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(1, 0));
        $this->assertEquals(1, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(0, 1));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferId(1, 2));

    }
    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_1_transfer->getTransferIban(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferIban(1, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_1_transfer_t_metadata->getTransferIban(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferIban(1, 1));


        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_1_transfer_p_metadata->getTransferIban(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferIban(1, 1));


        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferIban(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferIban(1, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_2_transfer->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_1_payment_2_transfer->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferIban(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferIban(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferIban(2, 1));


        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_2_transfer_t_metadata->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_1_payment_2_transfer_t_metadata->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferIban(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferIban(2, 1));


        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_2_transfer_p_metadata->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_1_payment_2_transfer_p_metadata->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferIban(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferIban(2, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferIban(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferIban(2, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(2, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(2, 1));


        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_payment_1_transfer->getTransferIban(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_1_transfer->getTransferIban(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferIban(1, 2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_payment_1_transfer_t_metadata->getTransferIban(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_1_transfer_t_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferIban(1, 2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_payment_1_transfer_p_metadata->getTransferIban(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_1_transfer_p_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferIban(1, 2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferIban(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferIban(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferIban(1, 2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_payment_2_transfer->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_payment_2_transfer->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_2_transfer->getTransferIban(0, 1));
        $this->assertEquals('IT0000000000000000000000004', $this->instance_2_payment_2_transfer->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferIban(1, 2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_payment_2_transfer_t_metadata->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_payment_2_transfer_t_metadata->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_2_transfer_t_metadata->getTransferIban(0, 1));
        $this->assertEquals('IT0000000000000000000000004', $this->instance_2_payment_2_transfer_t_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferIban(1, 2));


        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_payment_2_transfer_p_metadata->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_payment_2_transfer_p_metadata->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_2_transfer_p_metadata->getTransferIban(0, 1));
        $this->assertEquals('IT0000000000000000000000004', $this->instance_2_payment_2_transfer_p_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferIban(1, 2));


        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferIban(0, 1));
        $this->assertEquals('IT0000000000000000000000004', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferIban(1, 2));


        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(1, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(0, 1));
        $this->assertEquals('IT0000000000000000000000004', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferIban(1, 2));
    }

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertEquals('88888888888_01', $this->instance_1_payment_1_transfer->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_payment_1_transfer_t_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_payment_1_transfer_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_payment_2_transfer->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_payment_2_transfer_t_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_payment_2_transfer_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_1_transfer->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_1_transfer_t_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_1_transfer_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_2_transfer->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_2_transfer_t_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_2_transfer_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPspChannel());
        $this->assertEquals('88888888888_01', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPspChannel());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer->getTransferAmount(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferAmount(1, 1));

        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_t_metadata->getTransferAmount(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferAmount(1, 1));

        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_p_metadata->getTransferAmount(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferAmount(1, 1));

        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferAmount(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferAmount(1, 1));


        $this->assertEquals('50.50', $this->instance_1_payment_2_transfer->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_1_payment_2_transfer->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferAmount(1, 1));

        $this->assertEquals('50.50', $this->instance_1_payment_2_transfer_t_metadata->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_1_payment_2_transfer_t_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferAmount(1, 1));

        $this->assertEquals('50.50', $this->instance_1_payment_2_transfer_p_metadata->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_1_payment_2_transfer_p_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferAmount(1, 1));

        $this->assertEquals('50.50', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(1, 1));

        $this->assertEquals('50.50', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(0, 0));
        $this->assertEquals('16.00', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(1, 1));


        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer->getTransferAmount(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferAmount(1, 0));
        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer->getTransferAmount(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferAmount(1, 0));

        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_t_metadata->getTransferAmount(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferAmount(1, 0));
        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_t_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferAmount(1, 0));

        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_p_metadata->getTransferAmount(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferAmount(1, 0));
        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_p_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferAmount(1, 0));

        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferAmount(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferAmount(1, 0));
        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferAmount(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferAmount(1, 0));


        $this->assertEquals('50.50', $this->instance_2_payment_2_transfer->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_2_payment_2_transfer->getTransferAmount(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferAmount(2, 0));
        $this->assertEquals('40.50', $this->instance_2_payment_2_transfer->getTransferAmount(0, 1));
        $this->assertEquals('109.50', $this->instance_2_payment_2_transfer->getTransferAmount(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferAmount(2, 0));

        $this->assertEquals('50.50', $this->instance_2_payment_2_transfer_t_metadata->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_2_payment_2_transfer_t_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferAmount(2, 0));
        $this->assertEquals('40.50', $this->instance_2_payment_2_transfer_t_metadata->getTransferAmount(0, 1));
        $this->assertEquals('109.50', $this->instance_2_payment_2_transfer_t_metadata->getTransferAmount(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferAmount(2, 0));

        $this->assertEquals('50.50', $this->instance_2_payment_2_transfer_p_metadata->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_2_payment_2_transfer_p_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferAmount(2, 0));
        $this->assertEquals('40.50', $this->instance_2_payment_2_transfer_p_metadata->getTransferAmount(0, 1));
        $this->assertEquals('109.50', $this->instance_2_payment_2_transfer_p_metadata->getTransferAmount(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferAmount(2, 0));

        $this->assertEquals('50.50', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(2, 0));
        $this->assertEquals('40.50', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(0, 1));
        $this->assertEquals('109.50', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferAmount(2, 0));

        $this->assertEquals('16.00', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(2, 0));
        $this->assertEquals('40.50', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(0, 1));
        $this->assertEquals('109.50', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferAmount(2, 0));

    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1_payment_1_transfer->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_1_transfer->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_payment_1_transfer_t_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_payment_1_transfer_p_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_2_transfer->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer_t_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer_p_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaEmittente(1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaEmittente(0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaEmittente(1));


        $this->assertEquals('77777777777', $this->instance_2_payment_1_transfer->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_1_transfer->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaEmittente(2));

        $this->assertEquals('77777777777', $this->instance_2_payment_1_transfer_t_metadata->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_1_transfer_t_metadata->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaEmittente(2));

        $this->assertEquals('77777777777', $this->instance_2_payment_1_transfer_p_metadata->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_1_transfer_p_metadata->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaEmittente(2));

        $this->assertEquals('77777777777', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaEmittente(2));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaEmittente(2));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer_t_metadata->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer_t_metadata->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaEmittente(2));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer_p_metadata->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer_p_metadata->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaEmittente(2));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaEmittente(2));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaEmittente(1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaEmittente(2));


    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer->getTotalAmount());
        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_t_metadata->getTotalAmount());
        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_p_metadata->getTotalAmount());
        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTotalAmount());
        $this->assertEquals('150.00', $this->instance_1_payment_2_transfer->getTotalAmount());
        $this->assertEquals('150.00', $this->instance_1_payment_2_transfer_t_metadata->getTotalAmount());
        $this->assertEquals('150.00', $this->instance_1_payment_2_transfer_p_metadata->getTotalAmount());
        $this->assertEquals('150.00', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTotalAmount());
        $this->assertEquals('66.50', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTotalAmount());
        $this->assertEquals('300.00', $this->instance_2_payment_1_transfer->getTotalAmount());
        $this->assertEquals('300.00', $this->instance_2_payment_1_transfer_t_metadata->getTotalAmount());
        $this->assertEquals('300.00', $this->instance_2_payment_1_transfer_p_metadata->getTotalAmount());
        $this->assertEquals('300.00', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTotalAmount());
        $this->assertEquals('300.00', $this->instance_2_payment_2_transfer->getTotalAmount());
        $this->assertEquals('300.00', $this->instance_2_payment_2_transfer_t_metadata->getTotalAmount());
        $this->assertEquals('300.00', $this->instance_2_payment_2_transfer_p_metadata->getTotalAmount());
        $this->assertEquals('300.00', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTotalAmount());
        $this->assertEquals('265.50', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTotalAmount());

    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_1_transfer->getToken(0));
        $this->assertNull($this->instance_1_payment_1_transfer->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_1_transfer_t_metadata->getToken(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_1_transfer_p_metadata->getToken(0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getToken(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_2_transfer->getToken(0));
        $this->assertNull($this->instance_1_payment_2_transfer->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_2_transfer_t_metadata->getToken(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_2_transfer_p_metadata->getToken(0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getToken(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getToken(1));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getToken(0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getToken(1));


        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_1_transfer->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_1_transfer->getToken(1));
        $this->assertNull($this->instance_2_payment_1_transfer->getToken(2));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_1_transfer_t_metadata->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_1_transfer_t_metadata->getToken(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getToken(2));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_1_transfer_p_metadata->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_1_transfer_p_metadata->getToken(1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getToken(2));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getToken(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getToken(2));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_2_transfer->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_2_transfer->getToken(1));
        $this->assertNull($this->instance_2_payment_2_transfer->getToken(2));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_2_transfer_t_metadata->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_2_transfer_t_metadata->getToken(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getToken(2));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_2_transfer_p_metadata->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_2_transfer_p_metadata->getToken(1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getToken(2));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getToken(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getToken(2));

        $this->assertEquals('t0000000000000000000000000000001', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getToken(1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getToken(2));


    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer->getAmount(0));
        $this->assertNull($this->instance_1_payment_1_transfer->getAmount(1));

        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_t_metadata->getAmount(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getAmount(1));

        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_p_metadata->getAmount(0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getAmount(1));

        $this->assertEquals('150.00', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getAmount(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getAmount(1));

        $this->assertEquals('150.00', $this->instance_1_payment_2_transfer->getAmount(0));
        $this->assertNull($this->instance_1_payment_2_transfer->getAmount(1));

        $this->assertEquals('150.00', $this->instance_1_payment_2_transfer_t_metadata->getAmount(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getAmount(1));

        $this->assertEquals('150.00', $this->instance_1_payment_2_transfer_p_metadata->getAmount(0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getAmount(1));

        $this->assertEquals('150.00', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getAmount(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getAmount(1));

        $this->assertEquals('66.50', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getAmount(0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getAmount(1));


        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer->getAmount(1));
        $this->assertNull($this->instance_2_payment_1_transfer->getAmount(2));

        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_t_metadata->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_t_metadata->getAmount(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getAmount(2));

        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_p_metadata->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_p_metadata->getAmount(1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getAmount(2));

        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getAmount(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getAmount(2));

        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer->getAmount(1));
        $this->assertNull($this->instance_2_payment_2_transfer->getAmount(2));

        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer_t_metadata->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer_t_metadata->getAmount(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getAmount(2));

        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer_p_metadata->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer_p_metadata->getAmount(1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getAmount(2));

        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getAmount(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getAmount(2));

        $this->assertEquals('115.50', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getAmount(0));
        $this->assertEquals('150.00', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getAmount(1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getAmount(2));
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertEquals(0, $this->instance_1_payment_1_transfer->getPaymentMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer_t_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(2, $this->instance_1_payment_1_transfer_p_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(2, $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_t_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_p_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataCount(0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataCount(0));

    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance_1_payment_1_transfer->getTransferPa(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_1_payment_1_transfer_t_metadata->getTransferPa(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_1_payment_1_transfer_p_metadata->getTransferPa(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferPa(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferPa(1, 1));


        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_1_payment_2_transfer->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer_t_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_1_payment_2_transfer_t_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer_p_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_1_payment_2_transfer_p_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferPa(1, 1));

        $this->assertEquals('77777777777', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(1, 1));


        $this->assertEquals('77777777777', $this->instance_2_payment_1_transfer->getTransferPa(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferPa(1, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_1_transfer->getTransferPa(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferPa(1, 0));

        $this->assertEquals('77777777777', $this->instance_2_payment_1_transfer_t_metadata->getTransferPa(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferPa(1, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_1_transfer_t_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferPa(1, 0));

        $this->assertEquals('77777777777', $this->instance_2_payment_1_transfer_p_metadata->getTransferPa(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferPa(1, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_1_transfer_p_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferPa(1, 0));

        $this->assertEquals('77777777777', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferPa(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferPa(1, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferPa(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferPa(1, 0));


        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_2_payment_2_transfer->getTransferPa(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferPa(2, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer->getTransferPa(0, 1));
        $this->assertEquals('87777777778', $this->instance_2_payment_2_transfer->getTransferPa(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferPa(2, 0));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer_t_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_2_payment_2_transfer_t_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferPa(2, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer_t_metadata->getTransferPa(0, 1));
        $this->assertEquals('87777777778', $this->instance_2_payment_2_transfer_t_metadata->getTransferPa(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferPa(2, 0));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer_p_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_2_payment_2_transfer_p_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferPa(2, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer_p_metadata->getTransferPa(0, 1));
        $this->assertEquals('87777777778', $this->instance_2_payment_2_transfer_p_metadata->getTransferPa(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferPa(2, 0));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferPa(2, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferPa(0, 1));
        $this->assertEquals('87777777778', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferPa(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferPa(2, 0));

        $this->assertEquals('77777777777', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(2, 0));
        $this->assertEquals('87777777777', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(0, 1));
        $this->assertEquals('87777777778', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferPa(2, 0));

    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_1_payment_1_transfer->isBollo(0, 0));
        $this->assertFalse($this->instance_1_payment_1_transfer->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_1_transfer->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_1_transfer->isBollo(1, 1));

        $this->assertFalse($this->instance_1_payment_1_transfer_t_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_1_payment_1_transfer_t_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_1_transfer_t_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_1_transfer_t_metadata->isBollo(1, 1));

        $this->assertFalse($this->instance_1_payment_1_transfer_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_1_payment_1_transfer_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_1_transfer_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_1_transfer_p_metadata->isBollo(1, 1));

        $this->assertFalse($this->instance_1_payment_1_transfer_t_metadata_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_1_payment_1_transfer_t_metadata_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_1_transfer_t_metadata_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_1_transfer_t_metadata_p_metadata->isBollo(1, 1));

        $this->assertFalse($this->instance_1_payment_2_transfer->isBollo(0, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer->isBollo(2, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer->isBollo(1, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer->isBollo(2, 1));

        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata->isBollo(2, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata->isBollo(2, 1));

        $this->assertFalse($this->instance_1_payment_2_transfer_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_p_metadata->isBollo(2, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer_p_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer_p_metadata->isBollo(2, 1));

        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata_p_metadata->isBollo(2, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata_p_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer_t_metadata_p_metadata->isBollo(2, 1));

        $this->assertFalse($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(0, 0));
        $this->assertTrue($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(2, 0));
        $this->assertFalse($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(2, 1));


        $this->assertFalse($this->instance_2_payment_1_transfer->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_1_transfer->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_1_transfer->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_1_transfer->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_1_transfer->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_1_transfer->isBollo(1, 2));

        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata->isBollo(1, 2));

        $this->assertFalse($this->instance_2_payment_1_transfer_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_1_transfer_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_1_transfer_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_1_transfer_p_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_1_transfer_p_metadata->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_1_transfer_p_metadata->isBollo(1, 2));

        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata_p_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata_p_metadata->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_1_transfer_t_metadata_p_metadata->isBollo(1, 2));

        $this->assertFalse($this->instance_2_payment_2_transfer->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_2_transfer->isBollo(1, 2));

        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata->isBollo(1, 2));

        $this->assertFalse($this->instance_2_payment_2_transfer_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer_p_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer_p_metadata->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_2_transfer_p_metadata->isBollo(1, 2));

        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata_p_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata_p_metadata->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_2_transfer_t_metadata_p_metadata->isBollo(1, 2));

        $this->assertTrue($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(0, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(1, 0));
        $this->assertFalse($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(0, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(1, 1));
        $this->assertFalse($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(0, 2));
        $this->assertFalse($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->isBollo(1, 2));

    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(0, $this->instance_1_payment_1_transfer->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer->getTransferMetaDataCount(1, 0));

        $this->assertEquals(2, $this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataCount(1, 0));

        $this->assertEquals(0, $this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataCount(1, 0));

        $this->assertEquals(2, $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1, 0));


        $this->assertEquals(0, $this->instance_1_payment_2_transfer->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer->getTransferMetaDataCount(2, 0));

        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataCount(2, 0));

        $this->assertEquals(0, $this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataCount(2, 0));

        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(2, 0));

        $this->assertEquals(2, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(2, 0));


        $this->assertEquals(0, $this->instance_2_payment_1_transfer->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer->getTransferMetaDataCount(1, 1));

        $this->assertEquals(2, $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(2, $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataCount(1, 1));

        $this->assertEquals(0, $this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataCount(1, 1));

        $this->assertEquals(2, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(2, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1, 1));


        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(2, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(1, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(2, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(0, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(1, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer->getTransferMetaDataCount(2, 2));

        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(2, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(1, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(2, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(0, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(1, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataCount(2, 2));

        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(2, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(1, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(2, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(0, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(1, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataCount(2, 2));

        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(2, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(2, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(0, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(1, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataCount(2, 2));

        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(1, 0));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(2, 0));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(0, 1));
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(1, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(2, 1));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(0, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(1, 2));
        $this->assertEquals(0, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataCount(2, 2));

    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertEquals('88888888888', $this->instance_1_payment_1_transfer->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_payment_1_transfer_t_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_payment_1_transfer_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_payment_2_transfer->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_payment_2_transfer_t_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_payment_2_transfer_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_1_transfer->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_1_transfer_t_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_1_transfer_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_2_transfer->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_2_transfer_t_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_2_transfer_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPspBroker());
        $this->assertEquals('88888888888', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPspBroker());

    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_1_payment_1_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_payment_1_transfer_t_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_payment_1_transfer_p_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_payment_2_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_payment_2_transfer_t_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_payment_2_transfer_p_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaymentsCount());
        $this->assertEquals(1, $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_1_transfer->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_1_transfer_t_metadata->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_1_transfer_p_metadata->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_2_transfer->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_p_metadata->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentsCount());
        $this->assertEquals(2, $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentsCount());

    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->instance_1_payment_1_transfer->getIuv(0));
        $this->assertNull($this->instance_1_payment_1_transfer->getIuv(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_1_transfer_t_metadata->getIuv(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getIuv(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_1_transfer_p_metadata->getIuv(0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getIuv(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getIuv(0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getIuv(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer->getIuv(0));
        $this->assertNull($this->instance_1_payment_2_transfer->getIuv(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer_t_metadata->getIuv(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getIuv(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer_p_metadata->getIuv(0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getIuv(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getIuv(0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getIuv(1));

        $this->assertEquals('01000000000000001', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getIuv(0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getIuv(1));


        $this->assertEquals('01000000000000001', $this->instance_2_payment_1_transfer->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_1_transfer->getIuv(1));
        $this->assertNull($this->instance_2_payment_1_transfer->getIuv(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_1_transfer_t_metadata->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_1_transfer_t_metadata->getIuv(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getIuv(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_1_transfer_p_metadata->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_1_transfer_p_metadata->getIuv(1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getIuv(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getIuv(1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getIuv(2));


        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer->getIuv(1));
        $this->assertNull($this->instance_2_payment_2_transfer->getIuv(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer_t_metadata->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer_t_metadata->getIuv(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getIuv(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer_p_metadata->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer_p_metadata->getIuv(1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getIuv(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getIuv(1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getIuv(2));

        $this->assertEquals('01000000000000001', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getIuv(1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getIuv(2));

    }

    #[TestDox('getPaymentMetaDataName()')]
    public function testGetPaymentMetaDataName()
    {

        $this->assertNull($this->instance_1_payment_1_transfer->getPaymentMetaDataName(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getPaymentMetaDataName(2, 0));

        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getPaymentMetaDataName(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getPaymentMetaDataName(2, 0));

        $this->assertEquals('p_key_1_1', $this->instance_1_payment_1_transfer_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_1_payment_1_transfer_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getPaymentMetaDataName(2, 0));

        $this->assertEquals('p_key_1_1', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2, 0));

        $this->assertNull($this->instance_1_payment_2_transfer->getPaymentMetaDataName(0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getPaymentMetaDataName(2, 0));

        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getPaymentMetaDataName(0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getPaymentMetaDataName(2, 0));

        $this->assertEquals('p_key_1_1', $this->instance_1_payment_2_transfer_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_1_payment_2_transfer_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getPaymentMetaDataName(2, 0));

        $this->assertEquals('p_key_1_1', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2, 0));

        $this->assertEquals('p_key_1_1', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(2, 0));

        $this->assertEquals('p_key_1_1', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(2, 0));


        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(2, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataName(2, 2));

        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(2, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataName(2, 2));

        $this->assertEquals('p_key_1_1', $this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(2, 0));
        $this->assertEquals('p_key_2_1' ,$this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(0, 1));
        $this->assertEquals('p_key_2_2', $this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataName(2, 2));

        $this->assertEquals('p_key_1_1', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2, 0));
        $this->assertEquals('p_key_2_1' ,$this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0, 1));
        $this->assertEquals('p_key_2_2', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2, 2));

        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(2, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataName(2, 2));

        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(2, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataName(2, 2));

        $this->assertEquals('p_key_1_1', $this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(2, 0));
        $this->assertEquals('p_key_2_1' ,$this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(0, 1));
        $this->assertEquals('p_key_2_2', $this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataName(2, 2));

        $this->assertEquals('p_key_1_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2, 0));
        $this->assertEquals('p_key_2_1' ,$this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0, 1));
        $this->assertEquals('p_key_2_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataName(2, 2));

        $this->assertEquals('p_key_1_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(0, 0));
        $this->assertEquals('p_key_1_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(2, 0));
        $this->assertEquals('p_key_2_1' ,$this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(0, 1));
        $this->assertEquals('p_key_2_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataName(2, 2));

    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance_1_payment_1_transfer->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getPaymentMetaDataValue(2, 0));

        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getPaymentMetaDataValue(2, 0));

        $this->assertEquals('p_value_1_1', $this->instance_1_payment_1_transfer_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_1_payment_1_transfer_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getPaymentMetaDataValue(2, 0));

        $this->assertEquals('p_value_1_1', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2, 0));

        $this->assertNull($this->instance_1_payment_2_transfer->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getPaymentMetaDataValue(2, 0));

        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getPaymentMetaDataValue(2, 0));

        $this->assertEquals('p_value_1_1', $this->instance_1_payment_2_transfer_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_1_payment_2_transfer_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getPaymentMetaDataValue(2, 0));

        $this->assertEquals('p_value_1_1', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2, 0));

        $this->assertEquals('p_value_1_1', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(2, 0));

        $this->assertEquals('p_value_1_1', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(2, 0));


        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(2, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_1_transfer->getPaymentMetaDataValue(2, 2));

        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(2, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getPaymentMetaDataValue(2, 2));

        $this->assertEquals('p_value_1_1', $this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(2, 0));
        $this->assertEquals('p_value_2_1' ,$this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertEquals('p_value_2_2', $this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getPaymentMetaDataValue(2, 2));

        $this->assertEquals('p_value_1_1', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2, 0));
        $this->assertEquals('p_value_2_1' ,$this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertEquals('p_value_2_2', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2, 2));

        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(2, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getPaymentMetaDataValue(2, 2));

        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(2, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getPaymentMetaDataValue(2, 2));

        $this->assertEquals('p_value_1_1', $this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(2, 0));
        $this->assertEquals('p_value_2_1' ,$this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertEquals('p_value_2_2', $this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getPaymentMetaDataValue(2, 2));

        $this->assertEquals('p_value_1_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2, 0));
        $this->assertEquals('p_value_2_1' ,$this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertEquals('p_value_2_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getPaymentMetaDataValue(2, 2));

        $this->assertEquals('p_value_1_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('p_value_1_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(2, 0));
        $this->assertEquals('p_value_2_1' ,$this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(0, 1));
        $this->assertEquals('p_value_2_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(2, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getPaymentMetaDataValue(2, 2));

    }


    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataValue(1, 1, 1));


        $this->assertEquals('t_value_1_1_1', $this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataValue(2, 1, 1));


        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataValue(2, 1, 1));

        $this->assertEquals('t_value_1_1_1', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 1));



        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataValue(2, 1, 1));


        $this->assertEquals('t_value_1_1_1', $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertEquals('t_value_1_2_1', $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertEquals('t_value_1_2_2', $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 1, 1));


        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 1, 1));


        $this->assertEquals('t_value_1_1_1', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertEquals('t_value_1_2_1', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertEquals('t_value_1_2_2', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 1));


        $this->assertEquals('t_value_1_1_1', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertEquals('t_value_1_2_1', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertEquals('t_value_1_2_2', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 1));


        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataValue(2, 1, 1));


        $this->assertEquals('t_value_1_1_1', $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertEquals('t_value_2_1_1', $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertEquals('t_value_2_1_2', $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataValue(2, 1, 1));


        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataValue(2, 1, 1));


        $this->assertEquals('t_value_1_1_1', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2,0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertEquals('t_value_2_1_1', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertEquals('t_value_2_1_2', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 1));


        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(2, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataValue(2, 1, 2));



        $this->assertEquals('t_value_1_1_1', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 0, 0));
        $this->assertEquals('t_value_1_2_1', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertEquals('t_value_1_2_2', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertEquals('t_value_2_1_1', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertEquals('t_value_2_1_2', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertEquals('t_value_2_2_1', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertEquals('t_value_2_2_2', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataValue(2, 1, 2));

        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataValue(2, 1, 2));

        $this->assertEquals('t_value_1_1_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 0));
        $this->assertEquals('t_value_1_2_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertEquals('t_value_1_2_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertEquals('t_value_2_1_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertEquals('t_value_2_1_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertEquals('t_value_2_2_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertEquals('t_value_2_2_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 2));



        $this->assertEquals('t_value_1_1_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('t_value_1_1_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 0));
        $this->assertEquals('t_value_1_2_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 0));
        $this->assertEquals('t_value_1_2_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 0));
        $this->assertEquals('t_value_2_1_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 1));
        $this->assertEquals('t_value_2_1_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 1));
        $this->assertEquals('t_value_2_2_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 1));
        $this->assertEquals('t_value_2_2_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataValue(2, 1, 2));

    }

    #[TestDox('getTransferMetaDataName()')]
    public function testGetTransferMetaDataName()
    {
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataName(0, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer->getTransferMetaDataName(1, 1, 1));


        $this->assertEquals('t_key_1_1_1', $this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata->getTransferMetaDataName(2, 1, 1));


        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_p_metadata->getTransferMetaDataName(2, 1, 1));

        $this->assertEquals('t_key_1_1_1', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_1_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 1));



        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(0, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer->getTransferMetaDataName(2, 1, 1));


        $this->assertEquals('t_key_1_1_1', $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertEquals('t_key_1_2_1', $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertEquals('t_key_1_2_2', $this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 1, 1));


        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 1, 1));


        $this->assertEquals('t_key_1_1_1', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertEquals('t_key_1_2_1', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertEquals('t_key_1_2_2', $this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 1));


        $this->assertEquals('t_key_1_1_1', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertEquals('t_key_1_2_1', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertEquals('t_key_1_2_2', $this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_1_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 1));


        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(0, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer->getTransferMetaDataName(2, 1, 1));


        $this->assertEquals('t_key_1_1_1', $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertEquals('t_key_2_1_1', $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertEquals('t_key_2_1_2', $this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata->getTransferMetaDataName(2, 1, 1));


        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_p_metadata->getTransferMetaDataName(2, 1, 1));


        $this->assertEquals('t_key_1_1_1', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(2,0, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertEquals('t_key_2_1_1', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertEquals('t_key_2_1_2', $this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_1_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 1));


        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(0, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(2, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer->getTransferMetaDataName(2, 1, 2));



        $this->assertEquals('t_key_1_1_1', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 0, 0));
        $this->assertEquals('t_key_1_2_1', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertEquals('t_key_1_2_2', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertEquals('t_key_2_1_1', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertEquals('t_key_2_1_2', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertEquals('t_key_2_2_1', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertEquals('t_key_2_2_2', $this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata->getTransferMetaDataName(2, 1, 2));

        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_p_metadata->getTransferMetaDataName(2, 1, 2));

        $this->assertEquals('t_key_1_1_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 0));
        $this->assertEquals('t_key_1_2_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertEquals('t_key_1_2_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertEquals('t_key_2_1_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertEquals('t_key_2_1_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertEquals('t_key_2_2_1', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertEquals('t_key_2_2_2', $this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 2));



        $this->assertEquals('t_key_1_1_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 0));
        $this->assertEquals('t_key_1_1_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 0));
        $this->assertEquals('t_key_1_2_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 0));
        $this->assertEquals('t_key_1_2_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 0));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 0));
        $this->assertEquals('t_key_2_1_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 1));
        $this->assertEquals('t_key_2_1_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 1));
        $this->assertEquals('t_key_2_2_1', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 1));
        $this->assertEquals('t_key_2_2_2', $this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 1));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 0, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(0, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(1, 1, 2));
        $this->assertNull($this->instance_2_payment_2_transfer_1_bollo_t_metadata_p_metadata->getTransferMetaDataName(2, 1, 2));

    }
}
