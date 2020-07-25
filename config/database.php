<?php

return [
    'default' => env('DB_CONNECTION', 'mysql'),
    'migrations' => 'user',
    // 'migrations' => 'client',
    'connections' => [

        'mysql' => [
            'driver'    => env('DB_CONNECTION', 'mysql'),
            'host'      => env('DB_HOST', 'localhost'),
            'port'      => env('DB_PORT', 33060),
            'database'  => env('DB_DATABASE', 'nubeero'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD', 'password'),
            // 'charset'   => env('DB_CHARSET', 'utf8'),
            // 'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
            // 'prefix'    => env('DB_PREFIX', ''),
            // 'timezone'  => env('DB_TIMEZONE', '+00:00'),
            // 'strict'    => env('DB_STRICT_MODE', false),
        ],
    ]
];