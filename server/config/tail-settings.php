<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 07/03/2018
 * Time: 5:29 PM
 */
return [
    'default' => 'default_connection',

    'connections' => array(

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
    )
];