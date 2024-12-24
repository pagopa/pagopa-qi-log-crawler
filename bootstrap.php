<?php

require './vendor/autoload.php';

/* load environment config */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

$data = [
    'config_instance' =>
        [
            'driver'        => $_ENV['DB_CONFIG_INSTANCE_DRIVER'],
            'host'          => $_ENV['DB_CONFIG_INSTANCE_HOST'],
            'port'          => $_ENV['DB_CONFIG_INSTANCE_PORT'],
            'database'      => $_ENV['DB_CONFIG_INSTANCE_DATABASE'],
            'username'      => $_ENV['DB_CONFIG_INSTANCE_USERNAME'],
            'password'      => $_ENV['DB_CONFIG_INSTANCE_PASSWORD'],
            'charset'       => $_ENV['DB_CONFIG_INSTANCE_CHARSET'],
            'collation'     => $_ENV['DB_CONFIG_INSTANCE_COLLATION'],
        ],
    'data_instance' =>
        [
            'driver'        => $_ENV['DB_DATA_INSTANCE_DRIVER'],
            'host'          => $_ENV['DB_DATA_INSTANCE_HOST'],
            'port'          => $_ENV['DB_DATA_INSTANCE_PORT'],
            'database'      => $_ENV['DB_DATA_INSTANCE_DATABASE'],
            'username'      => $_ENV['DB_DATA_INSTANCE_USERNAME'],
            'password'      => $_ENV['DB_DATA_INSTANCE_PASSWORD'],
            'charset'       => $_ENV['DB_DATA_INSTANCE_CHARSET'],
            'collation'     => $_ENV['DB_DATA_INSTANCE_COLLATION'],
        ],
    'history_instance' =>
        [
            'driver'        => $_ENV['DB_HISTORY_INSTANCE_DRIVER'],
            'host'          => $_ENV['DB_HISTORY_INSTANCE_HOST'],
            'port'          => $_ENV['DB_HISTORY_INSTANCE_PORT'],
            'database'      => $_ENV['DB_HISTORY_INSTANCE_DATABASE'],
            'username'      => $_ENV['DB_HISTORY_INSTANCE_USERNAME'],
            'password'      => $_ENV['DB_HISTORY_INSTANCE_PASSWORD'],
            'charset'       => $_ENV['DB_HISTORY_INSTANCE_CHARSET'],
            'collation'     => $_ENV['DB_HISTORY_INSTANCE_COLLATION'],
        ]
];

$capsule = new Capsule;
foreach($data as $name => $config)
{
    $capsule->addConnection($config, $name);
}

$capsule->setAsGlobal();
$capsule->bootEloquent();