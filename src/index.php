<?php

require_once './vendor/autoload.php';



use Illuminate\Database\Capsule\Manager as Capsule;


const DB_HOST           =   '172.17.0.2';
const DB_PORT           =   5432;
const DB_DATABASE       =   'postgres';
const DB_USERNAME       =   'postgres';
const DB_PASSWORD       =   'admin';
const MEMCACHED_HOST    =   '172.17.0.3';
const MEMCACHED_PORT    =   11211;

/*$id = "1298084";

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'pgsql',
    'host' => '172.21.0.2',
    'database' => 'postgres',
    'username' => 'postgres',
    'password' => 'admin',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci'
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$date = '2023-09-01';
$events = DB::table('transaction_2023')
    ->where('id', '=', $id)
    ->get();


$json = json_encode(['2023-09-01', '2023-09-02']);

$p = new \pagopa\crawler\rows\Transaction(new DateTime('2023-09-01'));
$p->retrieveByPk($id, new DateTime('2023-09-01'));

$p->addDate(new DateTime('2023-09-03'));
$p->update();
DB::statement($p->getQuery(), $p->getBindParams());


die();*/




global $microtime;


$microtime = microtime(true);

function randomString(int $size = 15, $only_number = false)
{
    $string = '';
    for($i=0;$i<$size;$i++)
    {
        $string .= ($only_number) ? chr(rand(48,57)) : chr(rand(97,122));
    }
    return $string;
}

function convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}
function print_memory_usage()
{
    global $microtime;
    $mem = memory_get_usage(false);
    $mem_real = memory_get_usage(true);

    $peek = memory_get_peak_usage(false);
    $peek_real = memory_get_peak_usage(true);

    echo sprintf("[%s secs] Mem/Peek: %s / %s , Real Mem/Peek: %s / %s", (round((microtime(true) - $microtime),2)), convert($mem), convert($peek), convert($mem_real), convert($peek_real));
    echo PHP_EOL;
}






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

//\Illuminate\Support\Facades\DB::getPdo()->lastInsertId()


/**
 * Come Procedere
 * La Events è una collezione di Eventi
 *  Un evento gestisce
 *      i dati dell'evento del Registro Eventi
 *      I dati del payload dell'evento stesso
 *
 *  La PaymentList invece gestisce quella che dovrà essere la Transaction sul database (insert o update che siano)
 *      La paymentList , per ogni evento che gestisce, dovrà
 *          Capire se un evento è nuovo
 *              Nuovo => Non lo tengo nella mia lista temporanea
 *                       Non è presente sul db in base ai dati di data_event/iuv/pa_emittente/token
 *              Presente =>
 *                       Lo tengo in lista
 *                       E' presente sul db in base ai dati di data_event/iuv/pa_emittente/token
 *
 *          Come fa a capire se lo è o meno?
 *              Se è presente nella sua lista temporanea, allora è presente
 *              Se non lo è, deve capirlo
 *                  Per capirlo deve chiede alla event se esiste una riga sul db corrispondente ad data_event/iuv/pa_emittente/token
 *                  La event lo farà chiedendo questi dati o a se stesso (dati presenti nell'evento), o dai dati del payload (chiedendo alla primitiva) o ancora chiedendo in base ad altri parametri come ad esempio
 *                      sessionId e/o sessionIdOriginal
 *                          (nel caso di una RESP ad un metodo dove le colonne iuv/dominio non sono valorizzate e dal payload non posso capirlo)
 *                          (nel caso di una RESP ad una sendPaymentOutcome che non ha le colonne iuv/dominio valorizzata, succede)
 *                          etc.
 *                      token
 *                          (nel caso in cui una REQ di una sendPaymentOutcome non abbia valorizzato le colonne di iuv/id dominio, cerco col token perchè il payload non è sufficiente)
 *
 *          Per ogni evento analizzato, la paymentList dovrà richiedere al metodo la lista delle modifiche da apportare sul database, query e bindParams
 *          Fatte tutte le richieste, partirà la transaction con l'aggiornamento
 *
 *
 */


/**
 * Per ogni evento devo
 * Cercare nella cache
 *      Se c'è nella cache, recupero i dati, e aggiorno il DB solo per il necessario
 * Cercare sul db (se attivo)
 *      Se c'è sul DB, recupero i dati, aggiorno il DB solo per il necessario
 * Non c'è da nessuna parte
 *      Se riesco a ricavare le informazioni, le uso per aggiornare il DB
 * Altrimenti scarto l'evento
 *
 *
 *
 *
 * Per la singleRow, implementare metodi per ricavare una o + righe da varie chiavi (che siano le pk o i dati della transaction)
 *
 *
 */


$a = new \pagopa\crawler\paymentlist\req\activatePaymentNotice(new DateTime('2023-09-01'), 'activatePaymentNotice', 'REQ', new \pagopa\crawler\Memcached());
$a->run();

