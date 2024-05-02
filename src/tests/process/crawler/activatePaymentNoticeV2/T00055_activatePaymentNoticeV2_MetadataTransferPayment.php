<?php

namespace process\crawler\activatePaymentNoticeV2;

use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00055] Valuta l\'analisi di una coppia di activatePaymentNoticeV2 REQ/RESP con metadata nei transfer e payment')]
class T00055_activatePaymentNoticeV2_MetadataTransferPayment extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000162');
        $this->assertEquals('2024-03-10 10:53:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000162', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000162', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('360.00', $transaction->getColumnValue('importo'));
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
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000162' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(2, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000002', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('160.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));


        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000162');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:53:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000168', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('activatePaymentNoticeV2', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:53:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000169', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));
    }

    #[TestDox('[METADATA] Verifica MetaData')]
    public function testMetaData()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000162');

        $details = self::$db->getTransactionDetails($transaction, 1);
        $metadata = self::$db->getMetadataTransfer($details, 0);
        $this->assertEquals('mk_transfer_1_1', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('mv_transfer_1_1', $metadata->getColumnValue('meta_value'));
        $metadata = self::$db->getMetadataTransfer($details, 1);
        $this->assertEquals('mk_transfer_1_2', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('mv_transfer_1_2', $metadata->getColumnValue('meta_value'));

        $details = self::$db->getTransactionDetails($transaction, 0);
        $metadata = self::$db->getMetadataTransfer($details, 0);
        $this->assertEquals('mk_transfer_2_1', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('mv_transfer_2_1', $metadata->getColumnValue('meta_value'));
        $metadata = self::$db->getMetadataTransfer($details, 1);
        $this->assertEquals('mk_transfer_2_2', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('mv_transfer_2_2', $metadata->getColumnValue('meta_value'));


        $metadata = self::$db->getMetadataPayment($transaction, 0);
        $this->assertEquals('mk_payment_1', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('mv_payment_1', $metadata->getColumnValue('meta_value'));
        $metadata = self::$db->getMetadataPayment($transaction, 1);
        $this->assertEquals('mk_payment_2', $metadata->getColumnValue('meta_key'));
        $this->assertEquals('mv_payment_2', $metadata->getColumnValue('meta_value'));


    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 168);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 169);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
