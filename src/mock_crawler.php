<?php
require_once './vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\Memcached;


const MEMCACHED_HOST                = '172.17.0.3';
const MEMCACHED_PORT                = "11211";
const DB_HOST                       = '172.17.0.5';
const DB_PORT                       = '5432';
const DB_DATABASE                   = 'postgres';
const DB_USERNAME                   = 'postgres';
const DB_PASSWORD                   = 'mock';
const TRANSACTION_TABLE             = "transaction_%s";
const TRANSACTION_DETAILS_TABLE     = "transaction_details_%s";
const TRANSACTION_EVENTS_TABLE      = "transaction_events_%s";
const TRANSACTION_RE_TABLE          = "transaction_re_%s";

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

const REDIS_HOST        = '172.17.0.6';
const REDIS_PORT        = '6379';


$connection =
    [
        'scheme' => 'tcp',
        'host' => REDIS_HOST,
        'port' => REDIS_PORT
    ];



$redis_cache = new \pagopa\crawler\RedisCache($connection);

//Capsule::statement('truncate table transaction_2024, transaction_details_2024, transaction_events_2024;');
//Capsule::statement('update transaction_re_2024 set state=:state', [':state' => 'TO_LOAD']);

$a = new \pagopa\crawler\paymentlist\req\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\req\activatePaymentNotice(new \DateTime('2024-03-11'),'activatePaymentNotice', 'REQ', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\resp\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'RESP', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\req\nodoInviaCarrelloRPT(new \DateTime('2024-03-10'),'nodoInviaCarrelloRPT', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\nodoInviaCarrelloRPT(new \DateTime('2024-03-10'),'nodoInviaCarrelloRPT', 'RESP', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\resp\nodoInviaCarrelloRPT(new \DateTime('2024-03-11'),'nodoInviaCarrelloRPT', 'RESP', $redis_cache);
$a->run();
//$a = new \pagopa\crawler\paymentlist\resp\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'RESP', $memcache);
//$a->run();