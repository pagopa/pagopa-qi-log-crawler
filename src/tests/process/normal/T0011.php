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

#[TestDox('[CRAWLER] Lavorazione di una coppia di activatePaymentNotice REQ/RESP corrette ed un solo transfer')]
class T0011 extends TestCase
{


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



    }

    #[TestDox('[TRANSACTION] Verifica correttezza campi')]
    public function testCorrectDateEvent()
    {
        $result = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000010')
            ->where('token_ccp', '=', 't0000000000000000000000000000010')
            ->get();


        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result->get(0));


        $this->assertEquals('2024-03-10',$transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:11:10.232',$transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000010',$transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777',$transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000010',$transaction->getColumnValue('notice_id'));
        $this->assertNull($transaction->getColumnValue('id_carrello'));
        $this->assertEquals('t0000000000000000000000000000010', $transaction->getColumnValue('token_ccp'));
        $this->assertEquals('77777777777', $transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888',$transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_01',$transaction->getColumnValue('id_psp'));
        $this->assertEquals('77777777777_01',$transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01',$transaction->getColumnValue('canale'));
        $this->assertEquals('180.00',$transaction->getColumnValue('importo'));
        $this->assertNull($transaction->getColumnValue('esito'));
    }


    #[TestDox('[WORKFLOW] Verifica correttezza campi')]
    public function testCorrectWorkflowDateEvent()
    {

        $result = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000010')
            ->where('token_ccp', '=', 't0000000000000000000000000000010')
            ->get();


        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result->get(0));

        $id = $transaction->getColumnValue('id');


        $result = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento' , '=', 1)
            ->get();

        $req = new Workflow(new \DateTime('2024-03-10'), (array) $result->get(0));

        $result = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->where('fk_tipoevento' , '=', 2)
            ->get();

        $resp = new Workflow(new \DateTime('2024-03-10'), (array) $result->get(0));


        $this->assertEquals('2024-03-10', $req->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:11:10.232', $req->getColumnValue('event_timestamp'));
        $this->assertEquals(1, $req->getColumnValue('fk_tipoevento'));
        $this->assertEquals('T000010', $req->getColumnValue('event_id'));

        $this->assertEquals('2024-03-10', $resp->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:12:10.232', $resp->getColumnValue('event_timestamp'));
        $this->assertEquals(2, $resp->getColumnValue('fk_tipoevento'));
        $this->assertEquals('T000010', $resp->getColumnValue('event_id'));


        $result = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->get();

        $this->assertEquals(2, $result->count());

    }

    #[TestDox('[RE] Verifica della modifica in LOADED dell\'evento analizzato')]
    public function testCorrectReEvent()
    {

        $result = Capsule::table('transaction_re_2024')
            ->where('id', '=', '11')
            ->get();

        $event = new TransactionRe(new \DateTime('2024-03-10'), (array) $result->get(0));

        $this->assertEquals('LOADED', $event->getColumnValue('state'));

        $result = Capsule::table('transaction_re_2024')
            ->where('id', '=', '12')
            ->get();

        $event = new TransactionRe(new \DateTime('2024-03-10'), (array) $result->get(0));

        $this->assertEquals('LOADED', $event->getColumnValue('state'));


    }

    #[TestDox('[DETAILS] Verifica corretto inserimento transfer')]
    public function testCorrectDetails()
    {
        $result = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000010')
            ->where('token_ccp', '=', 't0000000000000000000000000000010')
            ->get();


        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result->get(0));

        $id = $transaction->getColumnValue('id');

        $result = Capsule::table('transaction_details_2024')
            ->where('fk_payment', '=', $id)
            ->get();

        $details = new TransactionDetails(new \DateTime('2024-03-10'), (array) $result->get(0));

        $this->assertEquals(1, $result->count());
        $this->assertEquals('180.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
        $this->assertEquals('77777777777', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('1', $details->getColumnValue('id_transfer'));

    }
}