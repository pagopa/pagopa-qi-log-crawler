<?php

namespace payload\object;

use pagopa\sert\payload\object\RPT;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\object\RPT')]
#[CoversClass(RPT::class)]
class RPTTest extends TestCase
{

    protected RPT $instance_1_versamento;

    protected RPT $instance_2_versamento;

    protected RPT $instance_2_1_bollo_1_versamento;

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
        $this->instance_1_versamento = new RPT(getPayload('RPT','object', $data_1));

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
        $this->instance_2_versamento = new RPT(getPayload('RPT','object', $data_2));

        $data_3 = [
            'iuv' => '01000000000000002',
            'pa_emittente' => '77777777777',
            'amount' => '66.50',
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
                    'amount' => '16.00',
                    'pa' => '77777777778'
                ]
            ]
        ];
        $this->instance_2_1_bollo_1_versamento = new RPT(getPayload('RPT','object', $data_3));
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(1, $this->instance_1_versamento->getTransferCount());
        $this->assertEquals(2, $this->instance_2_versamento->getTransferCount());
        $this->assertEquals(2, $this->instance_2_1_bollo_1_versamento->getTransferCount());
    }

    #[TestDox('getSingoloVersamento()')]
    public function testGetSingoloVersamento()
    {
        $this->assertEquals(100.50, $this->instance_1_versamento->getSingoloVersamento());
        $this->assertNull($this->instance_1_versamento->getSingoloVersamento(1));

        $this->assertEquals(50.50, $this->instance_2_versamento->getSingoloVersamento(0));
        $this->assertEquals(50.00, $this->instance_2_versamento->getSingoloVersamento(1));
        $this->assertNull($this->instance_2_versamento->getSingoloVersamento(2));

        $this->assertEquals(50.50, $this->instance_2_1_bollo_1_versamento->getSingoloVersamento(0));
        $this->assertEquals(16.00, $this->instance_2_1_bollo_1_versamento->getSingoloVersamento(1));
        $this->assertNull($this->instance_2_1_bollo_1_versamento->getSingoloVersamento(2));

    }

    #[TestDox('getIbanAccredito()')]
    public function testGetIbanAccredito()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance_1_versamento->getIbanAccredito());
        $this->assertNull($this->instance_1_versamento->getIbanAccredito(1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_versamento->getIbanAccredito(0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_2_versamento->getIbanAccredito(1));
        $this->assertNull($this->instance_2_versamento->getIbanAccredito(2));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_2_1_bollo_1_versamento->getIbanAccredito(0));
        $this->assertNull($this->instance_2_1_bollo_1_versamento->getIbanAccredito(1));
        $this->assertNull($this->instance_2_1_bollo_1_versamento->getIbanAccredito(2));

    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_1_versamento->isBollo(0));
        $this->assertFalse($this->instance_1_versamento->isBollo(1));

        $this->assertFalse($this->instance_2_versamento->isBollo(0));
        $this->assertFalse($this->instance_2_versamento->isBollo(1));
        $this->assertFalse($this->instance_2_versamento->isBollo(2));

        $this->assertFalse($this->instance_2_1_bollo_1_versamento->isBollo(0));
        $this->assertTrue($this->instance_2_1_bollo_1_versamento->isBollo(1));
        $this->assertFalse($this->instance_2_1_bollo_1_versamento->isBollo(2));

    }

    #[TestDox('getImportoSingolaRpt()')]
    public function testGetImportoSingolaRpt()
    {
        $this->assertEquals(100.50, $this->instance_1_versamento->getImportoSingolaRpt());
        $this->assertEquals(100.50, $this->instance_2_versamento->getImportoSingolaRpt());
        $this->assertEquals(66.50, $this->instance_2_1_bollo_1_versamento->getImportoSingolaRpt());
    }

    #[TestDox('getPaTransfer()')]
    public function testGetPaTransfer()
    {
        $this->assertEquals('77777777777', $this->instance_1_versamento->getPaTransfer());
        $this->assertEquals('77777777777', $this->instance_2_versamento->getPaTransfer());
        $this->assertEquals('77777777777', $this->instance_2_1_bollo_1_versamento->getPaTransfer());

    }
}
