<?php

namespace process\crawler\cdInfoWisp;

use pagopa\crawler\MapEvents;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00063] Valuta un workflow con la cdInfoWisp')]
class T00063_WorkFlowWithCdInfoWisp extends TestCase
{
    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000184');
        $this->assertEquals('2024-03-10 14:41:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000184', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000184', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('80.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('OK', $transaction->getColumnValue('esito'));
        $this->assertNull($transaction->getReadyColumnValue('payment_type'));
        $this->assertNull($transaction->getReadyColumnValue('id_carrello'));

    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000184' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('80.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('001', $details->getColumnValue('iur'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
        $this->assertNull($details->getColumnValue('id_transfer'));

    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000184');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals(MapEvents::getMethodId('nodoAttivaRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:41:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000214', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals(MapEvents::getMethodId('nodoAttivaRPT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:41:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000215', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRPT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:42:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000216', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRPT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:42:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000217', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals(MapEvents::getMethodId('cdInfoWisp', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:43:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000218', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals(MapEvents::getMethodId('cdInfoWisp', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:43:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000219', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 6);
        $this->assertEquals(MapEvents::getMethodId('nodoChiediInformazioniPagamento', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:44:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000220', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 7);
        $this->assertEquals(MapEvents::getMethodId('nodoChiediInformazioniPagamento', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:44:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000221', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 8);
        $this->assertEquals(MapEvents::getMethodId('nodoInoltraEsitoPagamentoCarta', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:45:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000222', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 9);
        $this->assertEquals(MapEvents::getMethodId('pspInviaCarrelloRPTCarte', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:45:30.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000224', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('stazione'));
        $this->assertNull($workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 10);
        $this->assertEquals(MapEvents::getMethodId('pspInviaCarrelloRPTCarte', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:45:40.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000225', $workflow->getColumnValue('event_id'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));
        $this->assertNull($workflow->getColumnValue('stazione'));


        $workflow = self::$db->getWorkFlow($transaction, 11);
        $this->assertEquals(MapEvents::getMethodId('nodoInoltraEsitoPagamentoCarta', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:46:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000223', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));



        $workflow = self::$db->getWorkFlow($transaction, 12);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:47:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000226', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 13);
        $this->assertEquals(MapEvents::getMethodId('paaInviaRT', 'REQ'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:47:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000228', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 14);
        $this->assertEquals(MapEvents::getMethodId('paaInviaRT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:47:03.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000229', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));


        $workflow = self::$db->getWorkFlow($transaction, 15);
        $this->assertEquals(MapEvents::getMethodId('nodoInviaRT', 'RESP'), $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 14:47:30.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000227', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('AGID_01', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

    }

    #[TestDox('[EXTRA INFO] Verifica delle informazioni extra')]
    public function testExtraInfo()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000184');

        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'rrn');
        $this->assertEquals('000000000051', $extra_info_rrn->getColumnValue('info_value'));

        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'authcode');
        $this->assertEquals('000003', $extra_info_rrn->getColumnValue('info_value'));

        $extra_info_rrn = self::$db->getExtraInfo($transaction, 'esito_carta');
        $this->assertEquals('00', $extra_info_rrn->getColumnValue('info_value'));
    }
    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 214);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 215);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 216);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 217);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 218);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 219);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 220);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 221);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 222);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 223);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 224);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 225);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 226);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 227);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 228);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 229);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));
    }

}
