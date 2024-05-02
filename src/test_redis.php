<?php


require_once './vendor/autoload.php';

const REDIS_HOST        = '172.17.0.6';
const REDIS_PORT        = '6379';


$connection =
    [
        'scheme' => 'tcp',
        'host' => REDIS_HOST,
        'port' => REDIS_PORT
    ];


function randomString($n = 15)
{
    $string = '';
    for($i=0;$i<$n;$i++)
    {
        $string .= rand(0, 9);
    }
    return $string;
}


$redis_cache = new \pagopa\crawler\RedisCache($connection);

$redis_cache->clearCache();

for($i=0;$i<1500000;$i++)
{
    $add = [
            'id'  => 'valore',
            'date_event' => 'oggi',
        'iuv' => randomString(17),
        'token' => randomString(25),
        'dominio' => randomString(11)
    ];
    $redis_cache->setValue(sprintf('s_%s', $i), $add);
    if (($i % 10000) == 0)
    {
        echo "Inserisco valore " .$i .PHP_EOL;
    }
}



die();





$add1 = [
        'id'  => 'valore',
        'date_event' => 'domani'
];

$redis_cache->clearCache();

$redis_cache->setValue('miachiave', $add, 10);


$value = $redis_cache->getValue('miachiave');

$redis_cache->addValue('miachiave', $add1);


$value = $redis_cache->getValue('miachiave');


print_r($redis_cache->getAllKeys());
$redis_cache->clearCache();;
print_r($redis_cache->getAllKeys());



echo PHP_EOL;













die();
$client = new Predis\Client($connection);

$add = [
    [
        'id'  => 'valore',
        'date_event' => 'oggi'
    ]
];

$client->set('miachiave', json_encode($add));


$value = $client->get('miachiave');

print_r(json_decode($value, JSON_OBJECT_AS_ARRAY));



$add = [
    [
        'id'  => 'valore',
        'date_event' => 'domani'
    ]
];

echo PHP_EOL;

echo "PROCEDO CON NUOVA AGGIUNTA" .PHP_EOL;

$client->set('miachiave', json_encode($add));

$value = $client->get('miachiave');


print_r(json_decode($value, JSON_OBJECT_AS_ARRAY));

echo PHP_EOL;