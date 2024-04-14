<?php

namespace process\crawler\nodoAttivaRPT;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00046] Valuta l\'analisi di una transazione con nodoAttivaRPT che risponde con faultCode PPT_MULTI_BENEFICIARIO')]
class T00046_nodoAttivaRPT_PreviousAttivaRPT_FaultCode extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000091');
        $this->assertEquals('2024-03-10 12:51:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000091', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('c0000000000000000000000000000091', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('301000000000000091', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
        $this->assertNull($transaction->getColumnValue('payment_type'));
        $this->assertNull($transaction->getColumnValue('import'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000091' );
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details);
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000091');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('13', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:51:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000096', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('14', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:52:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000097', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('KO', $workflow->getColumnValue('outcome'));
        $this->assertEquals('PPT_MULTI_BENEFICIARIO', $workflow->getColumnValue('faultcode'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertNull($workflow);
    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 96);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 97);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
