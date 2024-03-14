<?php

namespace tests\process\cache;

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\Memcached;
use pagopa\crawler\paymentlist\req\activatePaymentNotice;
use pagopa\database\sherlock\Transaction;
use pagopa\database\sherlock\TransactionDetails;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

/**
 *  [ 'id' , 'date_event' , 'inserted_timestamp', 'tipoevento', 'sottotipoevento' , 'iddominio', 'iuv', 'ccp', 'noticenumber',
 *    'creditorreferenceid', 'paymenttoken', 'psp', 'stazione', 'canale', 'sessionid', 'sessionidoriginal', 'uniqueid', 'payload',
 *    'state', 'message' ]
 *
 */

#[TestDox('[CACHE] Test su lavorazione activatePaymentNotice RESP')]
class TestAnalysisActivatePaymentNoticeResp extends TestCase
{


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
        $memcache = new Memcached();

        $a = new activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'RESP', $memcache);
        $a->run();


    }


    #[TestDox('Test su transfer non duplicati')]
    public function testInsertTransfer()
    {
        $result_transaction = Capsule::table('transaction_2024')
            ->where('iuv', '=', '01000000000000001')
            ->where('token_ccp' , '=', 't0000000000000000000000000000001')
            ->get();

        $this->assertEquals(1, $result_transaction->count());
        $transaction = new Transaction(new \DateTime('2024-03-10'), (array) $result_transaction->get(0));
        $id = $transaction->getColumnValue('id');

        $result_events = Capsule::table('transaction_details_2024')
            ->where('fk_payment', '=', $id)
            ->get();

        $this->assertEquals(1, $result_events->count());
        $details = new TransactionDetails(new \DateTime('2024-03-10'), (array) $result_events->get(0));
        $this->assertEquals('180.00', $details->getColumnValue('amount_transfer'));
        $this->assertEquals('06655971007', $details->getColumnValue('pa_transfer'));
        $this->assertEquals('IT18U0000000000000000000001', $details->getColumnValue('iban_transfer'));
    }

}
