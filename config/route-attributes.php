<?php

use App\Http\Middleware\Admin\UniqueRequestLogId;

return [
    'enabled' => true,

    'directories' => [
        // eleadmin接口
        app_path('Http/Controllers/Admin') => [
            'prefix' => 'api/admin',
            'middleware' => [UniqueRequestLogId::class],
        ],
    ],

    'middleware' => [],
];
