<?php

namespace process\crawler\activatePaymentNoticeV2;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('[T00057] Valuta l\'analisi di una coppia di activatePaymentNoticeV2 REQ/RESP con faultCode nella Response')]
class T00057_activatePaymentNoticeV2_WithFault extends TestCase
{


    protected static \GetInfoFromDb $db;


    public static function setUpBeforeClass(): void
    {
        self::$db = new \GetInfoFromDb();
    }

    #[TestDox('[TRANSACTION] Verifica correttezza dei dati nella tabella transaction')]
    public function testTransaction()
    {

        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000164');
        $this->assertEquals('2024-03-10 10:55:00.197', $transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000164', $transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('t0000000000000000000000000000164', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('216.00', $transaction->getColumnValue('importo'));
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
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000164' );

        $details = self::$db->getTransactionDetails($transaction, 0);
        $this->assertNull($details);

        $details = self::$db->getTransactionDetails($transaction, 1);
        $this->assertNull($details);
    }

    #[TestDox('[WORKFLOW] Verifica presenza eventi Workflow')]
    public function testWorkFlow()
    {
        $transaction = self::$db->getTransaction(new \DateTime('2024-03-10'), '01000000000000164');

        $workflow = self::$db->getWorkFlow($transaction, 0);
        $this->assertEquals('23', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:00.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000172', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertNull($workflow->getColumnValue('outcome'));

        $workflow = self::$db->getWorkFlow($transaction, 1);
        $this->assertEquals('24', $workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('2024-03-10 10:55:01.197', $workflow->getColumnValue('event_timestamp'));
        $this->assertEquals('T000173', $workflow->getColumnValue('event_id'));
        $this->assertEquals('77777777777_01', $workflow->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getColumnValue('canale'));
        $this->assertEquals('PSP_V2', $workflow->getColumnValue('id_psp'));
        $this->assertEquals('KO', $workflow->getColumnValue('outcome'));
        $this->assertEquals('PPT_STAZIONE_INT_PA_SERVIZIO_NONATTIVO', $workflow->getColumnValue('faultcode'));
    }
    #[TestDox('[ReEvent] Verifica stato evento')]
    public function testEvent()
    {
        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 172);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $event = self::$db->getReEvent(new \DateTime('2024-03-10'), 173);
        $this->assertEquals('LOADED', $event->getColumnValue('state'));

    }

}
