<?php

namespace process\crawler\nodoInviaRT;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00050] Valuta l\'analisi di una nodoInviaRPT con un carrello di una RPT')]
class T00050_nodoInviaRT_Cart1RPT extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000110');
        $this->assertEquals('2024-03-10 08:30:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000110', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000110', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('600.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('c0000000000000000000000000000110', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000110' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000012', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('100.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('003', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('001', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));



        $details = self::$db->getTransactionDetails($transaction, 2);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000011', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('300.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('002', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000110');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('3', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:30:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000130', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('4', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:30:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000131', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('17', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:35:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000132', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('18', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:35:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000133', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));
    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 130);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 131);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 132);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 133);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
