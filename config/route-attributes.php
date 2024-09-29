<?php

use App\Http\Middleware\Admin\AdminMiddleware;
use App\Http\Middleware\UniqueRequestLogId;

return [
    'enabled' => true,

    'directories' => [
        // admin
        app_path('Http/Controllers/Admin') => [
            'prefix' => 'api/admin',
            'middleware' => [AdminMiddleware::class, UniqueRequestLogId::class],
        ],
    ],

    'middleware' => [],
];
