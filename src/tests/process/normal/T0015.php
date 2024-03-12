<?php

namespace pagopa\process\normal;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\Memcached;
use pagopa\crawler\paymentlist\req\activatePaymentNotice;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use pagopa\database\sherlock\TransactionRe;
use pagopa\database\sherlock\Workflow;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

/**
 *  [ 'id' , 'date_event' , 'inserted_timestamp', 'tipoevento', 'sottotipoevento' , 'iddominio', 'iuv', 'ccp', 'noticenumber',
 *    'creditorreferenceid', 'paymenttoken', 'psp', 'stazione', 'canale', 'sessionid', 'sessionidoriginal', 'uniqueid', 'payload',
 *    'state', 'message' ]
 *
 */

#[TestDox('[CRAWLER] Lavorazione di una coppia di activatePaymentNotice REQ/RESP con prima RESP OK e seconda RESP che ha un faultCode')]
class T0015 extends TestCase
{


    protected static Transaction $transaction;

    protected static Capsule $db;

    public static function setUpBeforeClass(): void
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'pgsql',
            'host' => DB_HOST,
            'port' => DB_PORT,
            'database' => DB_DATABASE,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();


        self::$db = $capsule;

        $result = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000014')
            ->where('token_ccp', '=', 't0000000000000000000000000000014')
            ->get();


        self::$transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result->get(0));



    }

    #[TestDox('[TRANSACTION] Verifica correttezza campi')]
    public function testCorrectDateEvent()
    {

        $transaction = self::$transaction;

        $this->assertEquals('2024-03-10',$transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:24:30.232',$transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000014',$transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777',$transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000014',$transaction->getColumnValue('notice_id'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
        $this->assertEquals('t0000000000000000000000000000014', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888',$transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_01',$transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01',$transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01',$transaction->getColumnValue('canale'));
        $this->assertEquals('270.00',$transaction->getColumnValue('importo'));
        $this->assertNull($transaction->getColumnValue('esito'));
    }


    #[TestDox('[WORKFLOW] Verifica correttezza campi')]
    public function testCorrectWorkflowDateEvent()
    {
        $transaction = self::$transaction;
        $id = $transaction->getColumnValue('id');


        // mi prendo la REQ
        $result = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento' , '=', 1)
            ->orderBy('event_timestamp', 'asc')
            ->get();

        // ho 1 sola req
        $this->assertEquals(1, $result->count());
        $req = new Workflow(new \DateTime('2024-03-10'), (array) $result->get(0));


        // mi prendo le 2 RESP
        $result = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento' , '=', 2)
            ->orderBy('event_timestamp', 'asc')
            ->get();

        // ho due resp
        $this->assertEquals(2, $result->count());

        $resp_1 = new Workflow(new \DateTime('2024-03-10'), (array) $result->get(0));
        $resp_2 = new Workflow(new \DateTime('2024-03-10'), (array) $result->get(1));


        $this->assertEquals('2024-03-10', $req->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:24:30.232', $req->getColumnValue('event_timestamp'));
        $this->assertEquals(1, $req->getColumnValue('fk_tipoevento'));
        $this->assertEquals('T000020', $req->getColumnValue('event_id'));


        $this->assertEquals('2024-03-10', $resp_1->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:24:35.232', $resp_1->getColumnValue('event_timestamp'));
        $this->assertEquals(2, $resp_1->getColumnValue('fk_tipoevento'));
        $this->assertEquals('T000021', $resp_1->getColumnValue('event_id'));

        $this->assertEquals('2024-03-10', $resp_2->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:24:45.232', $resp_2->getColumnValue('event_timestamp'));
        $this->assertEquals(2, $resp_2->getColumnValue('fk_tipoevento'));
        $this->assertEquals('T000022', $resp_2->getColumnValue('event_id'));
        $this->assertEquals('PPT_ERRORE_EMESSO_DA_PAA', $resp_2->getColumnValue('faultcode'));


    }

    #[TestDox('[RE] Verifica della modifica in LOADED dell\'evento analizzato')]
    public function testCorrectReEvent()
    {

        $result = Capsule::table('transaction_re_2024')
            ->where('id', '=', '21')
            ->get();

        $event = new TransactionRe(new \DateTime('2024-03-10'), (array) $result->get(0));

        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $result = Capsule::table('transaction_re_2024')
            ->where('id', '=', '22')
            ->get();

        $event = new TransactionRe(new \DateTime('2024-03-10'), (array) $result->get(0));

        $this->assertEquals('LOADED', $event->getColumnValue('state'));


    }

    #[TestDox('[DETAILS] Verifica corretto inserimento transfer')]
    public function testCorrectDetails()
    {
        $transaction = self::$transaction;

        $id = $transaction->getColumnValue('id');

        $result = Capsule::table('transaction_details_2024')
            ->where('fk_payment', '=', $id)
            ->orderBy('amount_transfer', 'desc')
            ->get();

        $this->assertEquals(2, $result->count());

        $transfer_1 = new TransactionDetails(new \DateTime(), (array) $result->get(0));
        $transfer_2 = new TransactionDetails(new \DateTime(), (array) $result->get(1));

        $this->assertEquals(1, $transfer_1->getColumnValue('id_transfer'));
        $this->assertEquals('77777777777', $transfer_1->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $transfer_1->getColumnValue('iban_transfer'));
        $this->assertEquals('180.00', $transfer_1->getColumnValue('amount_transfer'));

        $this->assertEquals(2, $transfer_2->getColumnValue('id_transfer'));
        $this->assertEquals('77777777778', $transfer_2->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000002', $transfer_2->getColumnValue('iban_transfer'));
        $this->assertEquals('90.00', $transfer_2->getColumnValue('amount_transfer'));

    }
}