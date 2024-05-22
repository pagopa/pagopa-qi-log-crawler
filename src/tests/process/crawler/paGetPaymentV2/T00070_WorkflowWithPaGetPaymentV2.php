<?php

namespace process\crawler\paGetPaymentV2;

use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00070] Valuta un workflow con la paGetPaymentV2')]
class T00070_WorkflowWithPaGetPaymentV2 extends TestCase
{
    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000261');
        $this->assertEquals('2024-03-10 10:40:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000261', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000261', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('150.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000261' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('150.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000261');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:40:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000270', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:40:02.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000272', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:40:05.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000273', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNotice', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:40:10.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000271', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcome', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:41:02.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000274', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcome', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:41:05.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000275', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 6);
        $this->assertEquals(MapEvents::getMethodId('paSendRT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:42:02.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000276', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertNull($workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 7);
        $this->assertEquals(MapEvents::getMethodId('paSendRT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:42:05.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000277', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 270);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 271);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 272);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 273);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 274);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 275);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 276);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 277);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));


    }

}
