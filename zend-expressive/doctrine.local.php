<?php

return [
    'doctrine' => [
        'orm'        => [
            'auto_generate_proxy_classes' => true,
            'proxy_dir'                   => 'data/cache/EntityProxy',
            'proxy_namespace'             => 'EntityProxy',
            'underscore_naming_strategy'  => true,
        ],
        'connection' => [
            // default connection
            'orm_default' => [
                'driver'   => 'pdo_mysql',
                'host'     => 'localhost',
                'port'     => '3306',
                'dbname'   => 'db_xxxx',
                'user'     => 'xxxx',
                'password' => 'xxxx',
                'charset'  => 'UTF8',
            ],
        ],
        'annotation' => [
            'metadata' => [
                'src/App/V1/Entity'
            ],
        ],
    ],
];
