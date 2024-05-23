<?php

namespace process\crawler\sendPaymentOutcomeV2;

use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00071] Pagamento Mod 3 con sendPaymentOutcomeV2')]
class T00071_WorkflowWithSPOV2_Mod3 extends TestCase
{
    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000262');
        $this->assertEquals('2024-03-10 10:52:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000262', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000262', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('300.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_V2', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));


        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000263');
        $this->assertEquals('2024-03-10 10:52:02.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000263', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000263', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('150.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_V2', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000262' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('300.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000263' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('150.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000262');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000280', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000281', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:04.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000284', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:05.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000285', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));






        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000263');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:02.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000282', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:03.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000283', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:04.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000284', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:05.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000285', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 280);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 281);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 282);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 283);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 284);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 285);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
