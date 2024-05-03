<?php

namespace process\crawler\nodoInoltraEsitoPagamentoPayPal;

use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00064] Valuta un workflow con la nodoInoltraEsitoPagamentoPayPal')]
class T00064_WorkFlowWithNodoInoltraEsitoPagamentoPayPal extends TestCase
{
    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000185');
        $this->assertEquals('2024-03-10 15:42:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000185', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000185', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('50.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('APP_IO', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertEquals('PPAL', $transaction->getColumnValue('payment_type'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));

    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000185' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals(1, $details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('50.00', $details->getColumnValue('amount_transfer'));
        $this->assertNull($details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000185');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('activateIOPayment', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:42:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000230', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('activateIOPayment', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:42:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000231', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('nodoChiediInformazioniPagamento', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:43:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000232', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('nodoChiediInformazioniPagamento', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:43:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000233', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals(MapEvents::getMethodId('nodoInoltraEsitoPagamentoPayPal', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:44:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000234', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals(MapEvents::getMethodId('pspNotifyPayment', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:44:10.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000236', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 6);
        $this->assertEquals(MapEvents::getMethodId('pspNotifyPayment', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:44:30.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000237', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 7);
        $this->assertEquals(MapEvents::getMethodId('nodoInoltraEsitoPagamentoPayPal', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:44:50.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000235', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 8);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcome', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:46:10.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000238', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 9);
        $this->assertEquals(MapEvents::getMethodId('sendPaymentOutcome', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 15:46:30.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000239', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

    }

    #[TestDox('[EXTRA INFO] Verifica delle informazioni extra')]
    public function testExtraInfo()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000185');
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'transactionId');
        $this->assertEquals('222222222', $extra_info_rrn->getColumnValue('info_value'));
        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'pspTransactionId');
        $this->assertEquals('99999999999999', $extra_info_rrn->getColumnValue('info_value'));
    }
    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 230);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 231);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 232);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 233);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 234);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 235);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 236);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 237);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 238);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 239);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
