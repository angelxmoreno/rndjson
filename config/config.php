<?php
use Phalcon\Config as PhalconConfig;

$config_array = array(
    'database' => array(
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'rndjson',
        'charset' => 'utf8',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir' => __DIR__ . '/../models/',
        'migrationsDir' => __DIR__ . '/../migrations/',
        'viewsDir' => __DIR__ . '/../views/',
        'baseUri' => '/'
    )
);

return new PhalconConfig($config_array);
