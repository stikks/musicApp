<?php

require __DIR__.'/bootstrap/autoload.php';

//$app = require_once __DIR__.'/bootstrap/app.php';
//
//$app->boot();

use Illuminate\Container\Container;
use Mookofe\Tail\Tail as TailClass;
use Mookofe\Tail\Facades\Tail;

$app = new Container();
$app->singleton('app', 'Illuminate\Container\Container');

$app->singleton('config', 'Illuminate\Config\Repository');

$app['config']->set('tail-settings.default', 'default_connection');
$app['config']->set('tail-settings.connections.default_connection', array(

    'default_connection' => array(
        'host'         => 'localhost',
        'port'         => 5672,
        'username'     => 'guest',
        'password'     => 'guest',
        'vhost'        => '/',
        'exchange'     => 'default_exchange',
        'consumer_tag' => 'consumer',
        'exchange_type'=> 'direct',
        'content_type' => 'text/plain'
    )
));

$app->bind('Tail', function ($app) {
    return new TailClass();
});

$tail = $app->make('Tail');

$tail::listen('queue-name', function ($message) {
    print_r($message);
});
