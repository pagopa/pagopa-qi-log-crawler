<?php

namespace tests\process\normal;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\database\sherlock\Transaction;
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

#[TestDox('[CRAWLER] Lavorazione di una activatePaymentNotice REQ assenza della stazione')]
class T0004 extends TestCase
{

    protected static Transaction $transaction;

    protected static Workflow $workflow;

    protected static TransactionRe $re;


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

        $result = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000004')
            ->where('token_ccp', '=', 't0000000000000000000000000000004')
            ->get();

        self::$transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result->get(0));

        $id = self::$transaction->getColumnValue('id');

        $result = Capsule::table('transaction_events_2024')
            ->where('fk_payment', '=', $id)
            ->get();

        self::$workflow = new Workflow(new \DateTime('2024-03-10'), (array) $result->get(0));


        $result = Capsule::table('transaction_re_2024')
            ->where('id', '=', 4)
            ->get();

        self::$re = new TransactionRe(new \DateTime('2024-03-10'), (array) $result->get(0));

    }

    #[TestDox('[TRANSACTION] Verifica correttezza campi')]
    public function testCorrectDateEvent()
    {
        $this->assertEquals('2024-03-10',self::$transaction->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:13.232',self::$transaction->getColumnValue('inserted_timestamp'));
        $this->assertEquals('01000000000000004',self::$transaction->getColumnValue('iuv'));
        $this->assertEquals('77777777777',self::$transaction->getColumnValue('pa_emittente'));
        $this->assertEquals('301000000000000004',self::$transaction->getColumnValue('notice_id'));
        $this->assertNull(self::$transaction->getColumnValue('id_carrello'));
        $this->assertEquals('t0000000000000000000000000000004',self::$transaction->getColumnValue('token_ccp'));
        $this->assertNull(self::$transaction->getColumnValue('id_broker_pa'));
        $this->assertEquals('88888888888',self::$transaction->getColumnValue('id_broker_psp'));
        $this->assertEquals('PSP_01',self::$transaction->getColumnValue('id_psp'));
        $this->assertEmpty(self::$transaction->getColumnValue('stazione'));
        $this->assertEquals('88888888888_01',self::$transaction->getColumnValue('canale'));
        $this->assertEquals('0.00',self::$transaction->getColumnValue('importo'));
        $this->assertNull(self::$transaction->getColumnValue('esito'));
    }


    #[TestDox('[WORKFLOW] Verifica correttezza campi')]
    public function testCorrectWorkflowDateEvent()
    {
        $this->assertEquals('2024-03-10', self::$workflow->getColumnValue('date_event'));
        $this->assertEquals('2024-03-10 09:10:13.232', self::$workflow->getColumnValue('event_timestamp'));
        $this->assertEquals(1, self::$workflow->getColumnValue('fk_tipoevento'));
        $this->assertEquals('T000004', self::$workflow->getColumnValue('event_id'));
    }

    #[TestDox('[RE] Verifica della modifica in LOADED dell\'evento analizzato')]
    public function testCorrectReEvent()
    {
        $this->assertEquals('LOADED', self::$re->getColumnValue('state'));
    }
}