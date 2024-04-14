<?php

namespace process\crawler\nodoAttivaRPT;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00045] Valuta l\'analisi di una transazione con nodoAttivaRPT/nodoInviaRPT')]
class T00045_nodoAttivaRPT_PreviousAttivaRPT extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000090');
        $this->assertEquals('2024-03-10 12:45:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000090', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('c0000000000000000000000000000090', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('301000000000000090', $transaction->getColumnValue('notice_id'));
        $this->assertEquals('33.10', $transaction->getColumnValue('importo'));
        $this->assertEquals('77777777777_01', $transaction->getColumnValue('stazione'));
        $this->assertEquals('AGID_01', $transaction->getColumnValue('id_psp'));
        $this->assertEquals('88888888888_01', $transaction->getColumnValue('canale'));
        $this->assertEquals('TOUCHPOINT_EC_OLD', $transaction->getColumnValue('touchpoint'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
        $this->assertNull($transaction->getColumnValue('payment_type'));
    }


    #[TestDox('[DETAILS] Verifica assenza dettagli')]
    public function testTransactionDetails()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000090' );
        $details = self::$db->getTransactionDetails($transaction, 0);

        $this->assertNull($details->getColumnValue('iur'));
        $this->assertNull($details->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('33.10', $details->getColumnValue('amount_transfer'));
        $this->assertFalse($details->getColumnValue('is_bollo'));
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000090');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('13', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:45:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000090', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('14', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:46:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000091', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 2);
        $this->assertEquals('11', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:47:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000092', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 3);
        $this->assertEquals('12', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:48:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000093', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 4);
        $this->assertEquals('11', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:49:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000094', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));

        $workflow = self::$db->getWorkFlow($transaction, 5);
        $this->assertEquals('12', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 12:50:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000095', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('OK', $workflow->getColumnValue('outcome'));

    }

    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 90);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 91);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 92);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 93);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 94);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 95);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
