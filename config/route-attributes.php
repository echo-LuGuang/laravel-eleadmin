<?php

use App\Http\Middleware\Admin\UniqueRequestLogId;

return [
    'enabled' => true,

    'directories' => [
        // api
        app_path('Http/Controllers/Admin') => [
            'prefix' => 'api/admin',
            'middleware' => [UniqueRequestLogId::class],
        ],
    ],

    'middleware' => [],
];
