<?php

namespace process\crawler\pspInviaCarrelloRPTCarte;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00043] Valuta l\'aggiornamento di canale/psp a seguito di una pspCarelloRPTCarteCarte sui pagamenti creati da una nodoInviaCarrelloRPT')]
class T00043_UpdatePspWithNodoInviaCarrelloRPT_1_RPT_ExtraInfo extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000051');
        $this->assertEquals('2024-03-10 10:40:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000051', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000051', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('c0000000000000000000000000000051', $transaction->getColumnValue('id_carrello'));
        $this->assertEquals('600.00', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('PSP_RPT', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertEquals('CP', $transaction->getColumnValue('payment_type'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000051' );
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000010', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('600.00', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000051');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('3', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:40:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000082', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('4', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:40:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000083', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('9', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:42:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000084', $workflow->getColumnValue('event_id'));
        $this->assertNull($workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('10', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:42:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000085', $workflow->getColumnValue('event_id'));
        $this->assertNull($workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));
    }

    #[TestDox('[EXTRAINFO] Verifica presenza Extra Info')]
    public function testExtraInfo()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000051');

        $rrn = self::$db->getExtraInfo($transaction, 'rrn');
        $esito_carta = self::$db->getExtraInfo($transaction, 'esito_carta');
        $authcode = self::$db->getExtraInfo($transaction, 'authcode');


        $this->assertEquals('000000000051', $rrn->getColumnValue('info_value'));
        $this->assertEquals('00', $esito_carta->getColumnValue('info_value'));
        $this->assertEquals('000003', $authcode->getColumnValue('info_value'));

    }
    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 82);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 83);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 84);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 85);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
