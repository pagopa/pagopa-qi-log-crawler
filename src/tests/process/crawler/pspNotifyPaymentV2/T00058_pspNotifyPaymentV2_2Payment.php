<?php

namespace process\crawler\pspNotifyPaymentV2;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00058] Valuta l\'analisi un carrello con activatePaymentNoticeV2')]
class T00058_pspNotifyPaymentV2_2Payment extends TestCase
{
    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000175');
        $this->assertEquals('2024-03-10 10:25:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000175', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000175', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('200.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_V2', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));
        $this->assertNull($transaction->getReadyColumnValue('esito'));


        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000176');
        $this->assertEquals('2024-03-10 10:26:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000176', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000176', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('180.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_V2', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_PSP', $transaction->getColumnValue('touchpoint'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));
        $this->assertNull($transaction->getReadyColumnValue('esito'));

    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000175' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(2, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('20.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('180.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000176' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(2, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('20.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('160.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000175');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('23', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:25:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000174', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('24', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:25:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000175', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('27', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('28', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000179', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals('25', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:28:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000180', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals('26', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:28:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000181', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));





        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000176');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('23', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:26:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000176', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('24', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:26:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000177', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('27', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000178', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('28', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:27:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000179', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals('25', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:28:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000180', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals('26', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:28:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000181', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

    }

    #[TestDox('[EXTRA INFO] Verifica delle informazioni extra')]
    public function testExtraInfo()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000175');
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'rrn');
        $this->assertEquals('zzzzzzzzzzzzzzzzzzzzz1', $extra_info_rrn->getColumnValue('info_value'));
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'authcode');
        $this->assertEquals('100001', $extra_info_rrn->getColumnValue('info_value'));



        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000176');
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'rrn');
        $this->assertEquals('zzzzzzzzzzzzzzzzzzzzz1', $extra_info_rrn->getColumnValue('info_value'));
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'authcode');
        $this->assertEquals('100001', $extra_info_rrn->getColumnValue('info_value'));


    }
    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 174);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 175);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 176);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 177);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 178);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 179);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 180);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 181);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
