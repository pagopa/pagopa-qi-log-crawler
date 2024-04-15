<?php

namespace process\crawler\pspNotifyPayment;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00049] Valuta l\'analisi di una transazione con pspNotifyPayment fatta con PayPAL')]
class T00049_WorkFlow_WithPspNotifyPayment_Paypal extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000102');
        $this->assertEquals('2024-03-10 15:43:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000102', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('c0000000000000000000000000000102', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('301000000000000102', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('CHECKOUT', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('150.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
        $this->assertNull($transaction->getColumnValue('payment_type'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000102' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals('40.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('IT18U0000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals('110.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000102');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('1', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:43:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000116', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('2', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:43:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000117', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('15', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:44:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000118', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('16', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:44:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000119', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals('15', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:45:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000120', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals('16', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:45:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000121', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 6);
        $this->assertEquals('5', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:46:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000122', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 7);
        $this->assertEquals('6', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:46:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000123', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 8);
        $this->assertNull($workflow);
    }


    #[TestDox('[METADATA] Verifica MetaData')]
    public function testMetaData()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000102');

        $details = self::$db->getTransactionDetails($transaction, 1);
        $metadata = self::$db->getMetadataTransfer($details, 0);
        $this->assertEquals('chiave_1_1', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('valore_1_1', $metadata->getColumnValue('meta_value'));
        $metadata = self::$db->getMetadataTransfer($details, 1);
        $this->assertEquals('chiave_1_2', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('valore_1_2', $metadata->getColumnValue('meta_value'));

        $details = self::$db->getTransactionDetails($transaction, 0);
        $metadata = self::$db->getMetadataTransfer($details, 0);
        $this->assertEquals('chiave_2_1', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('valore_2_1', $metadata->getColumnValue('meta_value'));
        $metadata = self::$db->getMetadataTransfer($details, 1);
        $this->assertEquals('chiave_2_2', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('valore_2_2', $metadata->getColumnValue('meta_value'));

    }

    #[TestDox('[EXTRA INFO] Verifica delle informazioni extra')]
    public function testExtraInfo()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000102');

        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'transactionId');
        $this->assertEquals('111111113', $extra_info_rrn->getColumnValue('info_value'));

        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'pspTransactionId');
        $this->assertEquals('11111111111113', $extra_info_rrn->getColumnValue('info_value'));

    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 116);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 117);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 118);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 119);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 120);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 121);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 122);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 123);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
