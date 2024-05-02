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

print_r($redis_cache->)