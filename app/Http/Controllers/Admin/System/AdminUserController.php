<?php

namespace App\Http\Controllers\Admin\System;

use App\Attributes\AdminAuthorize;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix('system')]
#[Middleware(AdminJwtAuthMiddleware::class)]
class AdminUserController extends AdminBaseController
{
    #[Get('adminUser')]
    #[AdminAuthorize('admin.admin.index')]
    public function index() {}
}
