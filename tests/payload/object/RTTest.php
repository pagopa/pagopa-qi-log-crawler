<?php

namespace payload\object;

use pagopa\sert\payload\object\RT;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\object\RT')]
#[CoversClass(RT::class)]
class RTTest extends TestCase
{

    protected RT $instance_1_versamento;

    protected RT $instance_2_versamento;

    protected RT $instance_2_versamento_bollo;


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
                    'pa' => '77777777777',
                    'iur' => 'IUR_1'
                ],
            ]
        ];
        $this->instance_1_versamento = new RT(getPayload('RT','object', $data_1));


        $data_2 = [
            'iuv' => '01000000000000001',
            'pa_emittente' => '77777777777',
            'amount' => '100.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000001',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                    'iur' => 'IUR_1'
                ],
                [
                    'id' => '1',
                    'amount' => '50.00',
                    'iban' => 'IT0000000000000000000000002',
                    'pa' => '77777777777',
                    'iur' => 'IUR_2'
                ],
            ]
        ];

        $this->instance_2_versamento = new RT(getPayload('RT','object', $data_2));


        $data_3 = [
            'iuv' => '01000000000000001',
            'pa_emittente' => '77777777777',
            'amount' => '66.50',
            'outcome' => 'OK',
            'token' => 't0000000000000000000000000000001',
            'transfers' => [
                [
                    'id' => '1',
                    'amount' => '50.50',
                    'iban' => 'IT0000000000000000000000001',
                    'pa' => '77777777777',
                    'iur' => 'IUR_1'
                ],
                [
                    'id' => '1',
                    'amount' => '16.00',
                    'pa' => '77777777777',
                    'iur' => 'IUR_2'
                ],
            ]
        ];
        $this->instance_2_versamento_bollo = new RT(getPayload('RT','object', $data_3));
    }

    #[TestDox('getIur()')]
    public function testGetIur()
    {
        $this->assertEquals('IUR_1', $this->instance_1_versamento->getIur(0));
        $this->assertNull($this->instance_1_versamento->getIur(1));

        $this->assertEquals('IUR_1', $this->instance_2_versamento->getIur(0));
        $this->assertEquals('IUR_2', $this->instance_2_versamento->getIur(1));
        $this->assertNull($this->instance_2_versamento->getIur(2));

        $this->assertEquals('IUR_1', $this->instance_2_versamento_bollo->getIur(0));
        $this->assertEquals('IUR_2', $this->instance_2_versamento_bollo->getIur(1));
        $this->assertNull($this->instance_2_versamento_bollo->getIur(2));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_1_versamento->isBollo(0));
        $this->assertFalse($this->instance_1_versamento->isBollo(1));

        $this->assertFalse($this->instance_2_versamento->isBollo(0));
        $this->assertFalse($this->instance_2_versamento->isBollo(1));
        $this->assertFalse($this->instance_2_versamento->isBollo(2));

        $this->assertFalse($this->instance_2_versamento_bollo->isBollo(0));
        $this->assertTrue($this->instance_2_versamento_bollo->isBollo(1));
        $this->assertFalse($this->instance_2_versamento_bollo->isBollo(2));

    }

    #[TestDox('getVersamentiCount()')]
    public function testGetVersamentiCount()
    {
        $this->assertEquals(1, $this->instance_1_versamento->getVersamentiCount());
        $this->assertEquals(2, $this->instance_2_versamento->getVersamentiCount());
        $this->assertEquals(2, $this->instance_2_versamento_bollo->getVersamentiCount());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals(100.50, $this->instance_1_versamento->getImporto());
        $this->assertEquals(100.50, $this->instance_2_versamento->getImporto());
        $this->assertEquals(66.50, $this->instance_2_versamento_bollo->getImporto());
    }

    #[TestDox('getImportoVersamento()')]
    public function testGetImportoVersamento()
    {
        $this->assertEquals(100.50, $this->instance_1_versamento->getImportoVersamento(0));
        $this->assertNull($this->instance_1_versamento->getImportoVersamento(1));

        $this->assertEquals(50.50, $this->instance_2_versamento->getImportoVersamento(0));
        $this->assertEquals(50.00, $this->instance_2_versamento->getImportoVersamento(1));
        $this->assertNull($this->instance_2_versamento->getImportoVersamento(2));

        $this->assertEquals(50.50, $this->instance_2_versamento_bollo->getImportoVersamento(0));
        $this->assertEquals(16.00, $this->instance_2_versamento_bollo->getImportoVersamento(1));
        $this->assertNull($this->instance_2_versamento_bollo->getImportoVersamento(2));
    }

    #[TestDox('getEsito()')]
    public function testGetEsito()
    {
        $this->assertEquals('PAGATA', $this->instance_1_versamento->getEsito());
        $this->assertNull($this->instance_1_versamento->getEsito(1));

        $this->assertEquals('PAGATA', $this->instance_2_versamento->getEsito(0));
        $this->assertEquals('PAGATA', $this->instance_2_versamento->getEsito(1));
        $this->assertNull($this->instance_2_versamento->getEsito(2));

        $this->assertEquals('PAGATA', $this->instance_2_versamento_bollo->getEsito(0));
        $this->assertEquals('PAGATA', $this->instance_2_versamento_bollo->getEsito(1));
        $this->assertNull($this->instance_2_versamento_bollo->getEsito(2));

    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->instance_1_versamento->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_versamento->getPaEmittente());
        $this->assertEquals('77777777777', $this->instance_2_versamento_bollo->getPaEmittente());
    }
}
