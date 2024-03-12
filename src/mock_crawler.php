<?php
require_once './vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\Memcached;


const MEMCACHED_HOST = '172.17.0.3';

const MEMCACHED_PORT = "11211";
const DB_HOST = '172.17.0.5';
const DB_PORT = '5432';
const DB_DATABASE = 'postgres';
const DB_USERNAME = 'postgres';
const DB_PASSWORD = 'mock';



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

//Capsule::statement('truncate table transaction_2024, transaction_details_2024, transaction_events_2024;');
//Capsule::statement('update transaction_re_2024 set state=:state', [':state' => 'TO_LOAD']);

$a = new \pagopa\crawler\paymentlist\req\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'REQ', $memcache);
$a->run();

$a = new \pagopa\crawler\paymentlist\req\activatePaymentNotice(new \DateTime('2024-03-11'),'activatePaymentNotice', 'REQ', $memcache);
$a->run();


$a = new \pagopa\crawler\paymentlist\resp\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'RESP', $memcache);
$a->run();


//$a = new \pagopa\crawler\paymentlist\resp\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'RESP', $memcache);
//$a->run();