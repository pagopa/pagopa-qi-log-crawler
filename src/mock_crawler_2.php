<?php
require_once './vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use pagopa\crawler\Memcached;


const MEMCACHED_HOST                = '172.17.0.3';
const MEMCACHED_PORT                = "11211";
const DB_HOST                       = '172.17.0.2';
const DB_PORT                       = '5432';
const DB_DATABASE                   = 'postgres';
const DB_USERNAME                   = 'postgres';
const DB_PASSWORD                   = 'admin';
const TRANSACTION_TABLE             = "transaction_%s";
const TRANSACTION_DETAILS_TABLE     = "transaction_details_%s";
const TRANSACTION_EVENTS_TABLE      = "transaction_events_%s";
const TRANSACTION_RE_TABLE          = "transaction_re_%s";

const METADATA_TABLE                = "metadata_%s";

const EXTRA_INFO_TABLE              = "extra_info_%s";

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

\pagopa\crawler\MapEvents::init();

//Capsule::statement('truncate table transaction_2024, transaction_details_2024, transaction_events_2024;');
//Capsule::statement('update transaction_re_2024 set state=:state', [':state' => 'TO_LOAD']);

$a = new \pagopa\crawler\paymentlist\req\activatePaymentNotice(new \DateTime('2023-09-01'),'activatePaymentNotice', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\activatePaymentNotice(new \DateTime('2023-09-01'),'activatePaymentNotice', 'RESP', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\req\nodoInviaCarrelloRPT(new \DateTime('2023-09-01'),'nodoInviaCarrelloRPT', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\nodoInviaCarrelloRPT(new \DateTime('2023-09-01'),'nodoInviaCarrelloRPT', 'RESP', $redis_cache);
$a->run();
//die();


$a = new \pagopa\crawler\paymentlist\req\nodoAttivaRPT(new \DateTime('2023-09-01'), 'nodoAttivaRPT', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\nodoAttivaRPT(new \DateTime('2023-09-01'), 'nodoAttivaRPT', 'RESP', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\req\nodoInviaRPT(new \DateTime('2023-09-01'), 'nodoInviaRPT', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\nodoInviaRPT(new \DateTime('2023-09-01'), 'nodoInviaRPT', 'RESP', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\req\pspNotifyPayment(new \DateTime('2023-09-01'), 'pspNotifyPayment', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\pspNotifyPayment(new \DateTime('2023-09-01'), 'pspNotifyPayment', 'RESP', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\req\pspInviaCarrelloRPT(new DateTime('2023-09-01'), 'pspInviaCarrelloRPT', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\pspInviaCarrelloRPT(new DateTime('2023-09-01'), 'pspInviaCarrelloRPT', 'RESP', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\req\pspInviaCarrelloRPTCarte(new DateTime('2023-09-01'), 'pspInviaCarrelloRPTCarte', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\pspInviaCarrelloRPTCarte(new DateTime('2023-09-01'), 'pspInviaCarrelloRPTCarte', 'RESP', $redis_cache);
$a->run();


$a = new \pagopa\crawler\paymentlist\req\sendPaymentOutcome(new DateTime('2023-09-01'), 'sendPaymentOutcome', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\sendPaymentOutcome(new DateTime('2023-09-01'), 'sendPaymentOutcome', 'RESP', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\req\nodoInviaRT(new DateTime('2023-09-01'), 'nodoInviaRT', 'REQ', $redis_cache);
$a->run();

$a = new \pagopa\crawler\paymentlist\resp\nodoInviaRT(new DateTime('2023-09-01'), 'nodoInviaRT', 'RESP', $redis_cache);
$a->run();

die();
//$a = new \pagopa\crawler\paymentlist\resp\activatePaymentNotice(new \DateTime('2024-03-10'),'activatePaymentNotice', 'RESP', $memcache);
//$a->run();