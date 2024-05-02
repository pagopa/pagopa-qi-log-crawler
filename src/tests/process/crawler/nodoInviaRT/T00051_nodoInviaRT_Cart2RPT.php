<?php

namespace process\crawler\nodoInviaRT;

use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00051] Valuta l\'analisi di 2 nodoInviaRPT con un carrello di 2 RPT')]
class T00051_nodoInviaRT_Cart2RPT extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000111');
        $this->assertEquals('2024-03-10 08:31:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000111', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000111', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('700.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('c0000000000000000000000000000111', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000112');
        $this->assertEquals('2024-03-10 08:31:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000112', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000112', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('300.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('c0000000000000000000000000000111', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000111' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000012', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('50.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('013', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('300.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('011', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));



        $details = self::$db->getTransactionDetails($transaction, 2);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000011', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('350.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('012', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));




        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000112' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000011', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('100.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('112', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('111', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000111');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:31:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000135', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:31:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000136', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:36:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000137', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:36:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000138', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:37:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000139', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:37:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000140', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));




        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000112');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:31:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000135', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:31:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000136', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:36:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000137', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:36:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000138', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:37:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000139', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 08:37:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000140', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 135);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 136);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 137);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 138);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 139);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 140);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
