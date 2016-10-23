<?php

$router = $di->get('router');

$router->add('/', array(
    'controller' => 'index',
    'action' => 'index'
))->setName('home');

$router->add('/faker', array(
    'controller' => 'faker',
    'action' => 'index'
))->setName('home');

$di->set('router', $router);
