<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'pgsql',
            'host' => '127.0.0.1',
            'name' => 'floricultura',
            'user' => 'postgres',
            'pass' => 'acesse',
            'port' => '5433',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'pgsql',
            'host' => '127.0.0.1',
            'name' => 'floricultura',
            'user' => 'postgres',
            'pass' => 'acesse',
            'port' => '5433',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'pgsql',
            'host' => '127.0.0.1',
            'name' => 'floricultura',
            'user' => 'postgres',
            'pass' => 'acesse',
            'port' => '5433',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];

// vendor/bin/phinx migrate