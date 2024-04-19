<?php

namespace process\crawler\paaInviaRT;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00052] Valuta l\'analisi di 2 paaInviaRPT con un carrello di 2 RPT')]
class T00052_paaInviaRT_Cart2RPT extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000150');
        $this->assertEquals('2024-03-10 10:20:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000150', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000150', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('655.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_RT', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('c0000000000000000000000000000150', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000151');
        $this->assertEquals('2024-03-10 10:20:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000151', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000150', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('616.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_RT', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('c0000000000000000000000000000150', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000150' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000011', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('300.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('111111111112', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('355.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('111111111111', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));





        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000151' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertNull($details->getColumnValue('iban_transfer'));
        $this->assertEquals('16.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('000000000002', $details->getColumnValue('iur'));
        $this->assertTrue($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('600.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('000000000001', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000150');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('3', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:20:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000150', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('4', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:20:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000151', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('7', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:21:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000152', $workflow->getColumnValue('event_id'));
        $this->assertNull($workflow->getColumnValue('stazione'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('8', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:21:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000153', $workflow->getColumnValue('event_id'));
        $this->assertNull($workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals('19', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:22:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000154', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals('20', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:22:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000155', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 6);
        $this->assertEquals('19', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:32:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000156', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 7);
        $this->assertEquals('20', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:32:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000157', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));





    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 150);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 151);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 152);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 153);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 154);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 155);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 156);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 157);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));


    }

}
