<?php

$mem = new Memcached();
$connect = $mem->addServer('172.17.0.4',11211);



if (!$connect)
{
    echo "Non mi sono connesso al server memcache" .PHP_EOL;
    exit;
}
$mem->setOption(Memcached::OPT_COMPRESSION, true);


print_r($mem->getStats());