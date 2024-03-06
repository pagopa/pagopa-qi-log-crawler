<?php



die();

require_once './vendor/autoload.php';


const MEMCACHED_HOST    =   '172.21.0.3';
const MEMCACHED_PORT    =   11211;


$memcached = new Memcached();
$memcached->addServer(MEMCACHED_HOST,MEMCACHED_PORT);


print_r($memcached->getStats());






die();
$instance = new \pagopa\crawler\SingleRow('test_table');
$r = new ReflectionClass($instance);

$property = $r->getProperty('primary_keys');
$property->setValue($instance, ['pk_need']);

print_r($instance->getPrimaryKeys());








die();
const MEMCACHED_HOST    =   '172.21.0.4';
const MEMCACHED_PORT    =   11211;


$memcached = new Memcached();
$memcached->addServer(MEMCACHED_HOST,MEMCACHED_PORT);

$data = [
    'prima chiave'
];

$memcached->set('test_chiave', $data, (time() + 5));

sleep(3);

print_r($memcached->get('test_chiave'));

echo PHP_EOL;
echo "adesso aggiorno la chiave e metto altri 5 secondi";
$data[] = 'seconda chiave';
$memcached->set('test_chiave', $data, (time() + 5));
echo PHP_EOL;
sleep(3);

print_r($memcached->get('test_chiave'));








die();

$a = [
    'ch' => 5,
    'cp' => 6
];

$b = (object) $a;

echo $b->ch;
echo PHP_EOL;
echo $b->cp;
echo PHP_EOL;




die();
$f1 = false;
$f2 = false;

$a = 4;
$t1 = 6;


$b = 5;
$t2 = 6;


if (($f1 = ($a == $t1)) || ($f2 = ($b == $t2)))
{
    echo "IO QUI CI ENTRO SEMPRE" .PHP_EOL;
}


echo $a ." == " .$t1 ." , f1 => " .var_dump($f1);
echo PHP_EOL;
echo $b ." == " .$t2 ." , f2 => " .var_dump($f2);
echo PHP_EOL;

// nel ciclo ci entro solo se una delle due è vera
// se entro, e $f1 è true, allora è vera la prima condizione
// else, sicuramente è vera la seconda, altrimenti nel ciclo non entravo proprio
// quindi posso usare $f1 per capire quale delle due condizioni mi ha fatto entrare nel blocco


die();


$date = '2023-03-30';
$c = new DateTime($date);
$m = $c->format('m');
$d = $c->format('d');
$step = new DateInterval('P1D');

if ($d < 29)
{
    $c->setDate($c->format('Y'), $c->format('m'), 28);
}

while($m == $c->format('m'))
{
    $c->add($step);
}

echo $c->format('Y-m-d') .PHP_EOL;
$c->sub($step);
echo $c->format('Y-m-d');