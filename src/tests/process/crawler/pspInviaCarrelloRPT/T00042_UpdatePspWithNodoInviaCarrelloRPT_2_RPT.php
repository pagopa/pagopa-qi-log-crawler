<?php

namespace process\crawler\pspInviaCarrelloRPT;

use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00042] Valuta l\'aggiornamento di canale/psp a seguito di una pspCarelloRPTCarte sui pagamenti creati da una nodoInviaCarrelloRPT con due RPT')]
class T00042_UpdatePspWithNodoInviaCarrelloRPT_2_RPT extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000043');
        $this->assertEquals('2024-03-10 10:55:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000043', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000043', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000043', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('300.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_RPT_3', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('BBT', $transaction->getColumnValue('payment_type'));

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000044');
        $this->assertEquals('2024-03-10 10:55:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000044', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000043', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000043', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('420.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_RPT_3', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('BBT', $transaction->getColumnValue('payment_type'));

    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000043' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('100.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000044' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000003', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('120.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000004', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('300.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000043');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000078', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000079', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('pspInviaCarrelloRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:56:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000080', $workflow->getColumnValue('event_id'));
        $this->assertNull($workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('pspInviaCarrelloRPT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:56:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000081', $workflow->getColumnValue('event_id'));
        $this->assertNull($workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertNull($workflow);



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000044');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000078', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaCarrelloRPT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000079', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('pspInviaCarrelloRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:56:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000080', $workflow->getColumnValue('event_id'));
        $this->assertNull($workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('pspInviaCarrelloRPT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:56:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000081', $workflow->getColumnValue('event_id'));
        $this->assertNull($workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertNull($workflow);

    }
    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 78);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 79);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 80);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 81);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
