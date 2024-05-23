<?php

namespace process\crawler\sendPaymentOutcomeV2;

use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00072] Pagamento Modello Unico con sendPaymentOutcomeV2')]
class T00072_WorkflowWithSPOV2_ModUnico extends TestCase
{
    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000270');
        $this->assertEquals('2024-03-10 10:52:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000270', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000270', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('301000000000000270', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('300.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_V2', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));


        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000271');
        $this->assertEquals('2024-03-10 10:52:04.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000271', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000271', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('301000000000000271', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('400.00', $transaction->getColumnValue('importo'));
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
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000270' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(2, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('100.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));








        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000271' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(2, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('150.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('250.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));



    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000270');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000286', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000290', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:02.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000291', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:03.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000287', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals(MapEvents::getMethodId('closePayment-v2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000294', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals(MapEvents::getMethodId('pspNotifyPaymentV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:04.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000296', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 6);
        $this->assertEquals(MapEvents::getMethodId('pspNotifyPaymentV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:06.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000297', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 7);
        $this->assertEquals(MapEvents::getMethodId('closePayment-v2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:10.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000295', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 8);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:58:04.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000298', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 9);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:58:05.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000299', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));




        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000271');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:04.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000288', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:05.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000292', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('paGetPaymentV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:06.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000293', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:52:07.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000289', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals(MapEvents::getMethodId('closePayment-v2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000294', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals(MapEvents::getMethodId('pspNotifyPaymentV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:04.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000296', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 6);
        $this->assertEquals(MapEvents::getMethodId('pspNotifyPaymentV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:06.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000297', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 7);
        $this->assertEquals(MapEvents::getMethodId('closePayment-v2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:10.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000295', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 8);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:58:04.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000298', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 9);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcomeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:58:05.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000299', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));
    }


    #[TestDox('[EXTRA INFO] Verifica delle informazioni extra')]
    public function testExtraInfo()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000270');
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'rrn');
        $this->assertEquals('rrn_SPOV2', $extra_info_rrn->getColumnValue('info_value'));
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'authcode');
        $this->assertEquals('987654', $extra_info_rrn->getColumnValue('info_value'));



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000271');
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'rrn');
        $this->assertEquals('rrn_SPOV2', $extra_info_rrn->getColumnValue('info_value'));
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'authcode');
        $this->assertEquals('987654', $extra_info_rrn->getColumnValue('info_value'));


    }
    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 286);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 287);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 288);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 289);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 290);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 291);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 292);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 293);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 294);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 295);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 296);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 297);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 298);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 299);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));


    }

}
