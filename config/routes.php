<?php

$router = $di->get('router');

$router->add('/', [
    'controller' => 'index',
    'action' => 'index'
])->setName('home');

$router->add('/api/:action', [
    'controller' => 'faker',
    'action' => 1
]);

$di->set('router', $router);
