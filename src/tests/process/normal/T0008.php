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

#[TestDox('[CRAWLER] Lavorazione di una activatePaymentNotice REQ senza IUV, evento non caricato')]
class T0008 extends TestCase
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



        $result = Capsule::table('transaction_re_2024')
            ->where('id', '=', 8)
            ->get();

        self::$re = new TransactionRe(new \DateTime('2024-03-10'), (array) $result->get(0));

    }

    #[TestDox('[TRANSACTION] Verifica assenza della transazione campi')]
    public function testCorrectDateEvent()
    {

        $result = Capsule::table('transaction_2024')
            ->where('token_ccp', '=', 't0000000000000000000000000000008')
            ->get();

        $this->assertEquals(0, $result->count());

    }

    #[TestDox('[RE] Verifica della modifica in REJECTED dell\'evento analizzato')]
    public function testCorrectReEvent()
    {
        $this->assertEquals('REJECTED', self::$re->getColumnValue('state'));
    }
}