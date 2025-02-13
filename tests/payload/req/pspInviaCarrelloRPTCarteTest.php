<?php

namespace payload\req;

use pagopa\sert\payload\req\pspInviaCarrelloRPTCarte;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\req\pspInviaCarrelloRPTCarte')]
#[CoversClass(pspInviaCarrelloRPTCarte::class)]
class pspInviaCarrelloRPTCarteTest extends TestCase
{

    protected pspInviaCarrelloRPTCarte $instance;

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
            'id_cart' => 'ID_CART_1',
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
                        ],
                        [
                            'id' => '2',
                            'amount' => '99.50',
                            'iban' => 'IT0000000000000000000000002',
                            'pa' => '77777777778',
                        ],
                    ],
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
                        ],
                        [
                            'id' => '2',
                            'amount' => '109.50',
                            'iban' => 'IT0000000000000000000000004',
                            'pa' => '87777777778'
                        ],
                    ]
                ]
            ]
        ];

        $rpt_1 = getPayload('RPT', 'object', $data['payments'][0]);
        $rpt_2 = getPayload('RPT', 'object', $data['payments'][1]);
        $data['payments'][0]['rpt_payload'] = base64_encode($rpt_1);
        $data['payments'][1]['rpt_payload'] = base64_encode($rpt_2);
        $this->instance = new pspInviaCarrelloRPTCarte(getPayload('pspInviaCarrelloRPTCarte','req', $data));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000001', $this->instance->getIuv(0));
        $this->assertEquals('01000000000000002', $this->instance->getIuv(1));
        $this->assertNull($this->instance->getIuv(2));
    }

    #[TestDox('getPspBroker()')]
    public function testGetPspBroker()
    {
        $this->assertEquals('88888888888', $this->instance->getPspBroker());
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance->isBollo(0, 0));
        $this->assertFalse($this->instance->isBollo(1, 0));
        $this->assertFalse($this->instance->isBollo(0, 1));
        $this->assertFalse($this->instance->isBollo(1, 1));
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('t0000000000000000000000000000001', $this->instance->getToken(0));
        $this->assertEquals('t0000000000000000000000000000002', $this->instance->getToken(1));
        $this->assertNull($this->instance->getToken(2));
    }

    #[TestDox('getAmount()')]
    public function testGetAmount()
    {
        $this->assertEquals('150.00', $this->instance->getAmount(0));
        $this->assertEquals('150.00', $this->instance->getAmount(1));
        $this->assertNull($this->instance->getAmount(2));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('50.50', $this->instance->getTransferAmount(0, 0));
        $this->assertEquals('99.50', $this->instance->getTransferAmount(1, 0));
        $this->assertNull($this->instance->getTransferAmount(2, 0));
        $this->assertEquals('40.50', $this->instance->getTransferAmount(0, 1));
        $this->assertEquals('109.50', $this->instance->getTransferAmount(1, 1));
        $this->assertNull($this->instance->getTransferAmount(2, 1));
    }

    #[TestDox('getPspId()')]
    public function testGetPspId()
    {
        $this->assertEquals('AGID_01', $this->instance->getPspId());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(2, $this->instance->getTransferCount(0));
        $this->assertEquals(2, $this->instance->getTransferCount(1));
        $this->assertEquals(0, $this->instance->getTransferCount(2));
    }

    #[TestDox('getCreditorReference()')]
    public function testGetCreditorReference()
    {
        $this->assertEquals('01000000000000001', $this->instance->getCreditorReference(0));
        $this->assertEquals('01000000000000002', $this->instance->getCreditorReference(1));
        $this->assertNull($this->instance->getCreditorReference(2));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance->getTransferPa(0, 0));
        $this->assertEquals('77777777777', $this->instance->getTransferPa(1, 0));
        $this->assertEquals('77777777777', $this->instance->getTransferPa(2, 0));
        $this->assertEquals('87777777777', $this->instance->getTransferPa(0, 1));
        $this->assertEquals('87777777777', $this->instance->getTransferPa(1, 1));
        $this->assertEquals('87777777777', $this->instance->getTransferPa(2, 1));
    }

    #[TestDox('getTotalAmount()')]
    public function testGetTotalAmount()
    {
        $this->assertEquals('300.00', $this->instance->getTotalAmount());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance->getPaEmittente(0));
        $this->assertEquals('87777777777', $this->instance->getPaEmittente(1));
        $this->assertNull($this->instance->getPaEmittente(2));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance->getTransferIban(1, 0));
        $this->assertNull($this->instance->getTransferIban(2, 0));
        $this->assertEquals('IT0000000000000000000000003', $this->instance->getTransferIban(0, 1));
        $this->assertEquals('IT0000000000000000000000004', $this->instance->getTransferIban(1, 1));
        $this->assertNull($this->instance->getTransferIban(2, 1));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(2, $this->instance->getPaymentsCount());
    }

    #[TestDox('getPspChannel()')]
    public function testGetPspChannel()
    {
        $this->assertEquals('88888888888_01', $this->instance->getPspChannel());
    }
}
