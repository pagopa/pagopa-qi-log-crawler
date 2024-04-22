<?php

namespace process\crawler\activateIOPayment;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00053] Valuta l\'analisi di un workflow di activateIOPayment/pspNotifyPayment/sendPaymentOutcome')]
class T00053_activateIOPaymentNotice_2Transfer extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000160');
        $this->assertEquals('2024-03-10 10:42:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000160', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000160', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('35.50', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_IO', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('APP_IO', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));

    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000160' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(2, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('15.50', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('20.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000160');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('21', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:42:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000160', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('22', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:42:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000161', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('15', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:45:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000162', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_IO', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('16', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:45:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000163', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_IO', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals('5', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:47:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000164', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_IO', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals('6', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:47:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000165', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_IO', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

    }


    #[TestDox('[METADATA] Verifica MetaData')]
    public function testMetaData()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000160');

        $details = self::$db->getTransactionDetails($transaction, 1);
        $metadata = self::$db->getMetadataTransfer($details, 0);
        $this->assertEquals('chiave_IO_1_1', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('valore_IO_1_1', $metadata->getColumnValue('meta_value'));
        $metadata = self::$db->getMetadataTransfer($details, 1);
        $this->assertEquals('chiave_IO_1_2', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('valore_IO_1_2', $metadata->getColumnValue('meta_value'));

        $details = self::$db->getTransactionDetails($transaction, 0);
        $metadata = self::$db->getMetadataTransfer($details, 0);
        $this->assertEquals('chiave_IO_2_1', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('valore_IO_2_1', $metadata->getColumnValue('meta_value'));
        $metadata = self::$db->getMetadataTransfer($details, 1);
        $this->assertEquals('chiave_IO_2_2', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('valore_IO_2_2', $metadata->getColumnValue('meta_value'));

    }

    #[TestDox('[EXTRA INFO] Verifica delle informazioni extra')]
    public function testExtraInfo()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000160');

        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'rrn');
        $this->assertEquals('111111111119', $extra_info_rrn->getColumnValue('info_value'));

        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'authcode');
        $this->assertEquals('111119', $extra_info_rrn->getColumnValue('info_value'));

    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 160);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 161);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 162);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 163);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 164);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 165);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
