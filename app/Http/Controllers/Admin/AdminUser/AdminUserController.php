<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Attributes\AdminAuthorize;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware(AdminJwtAuthMiddleware::class)]
final class AdminUserController extends AdminBaseController
{
    #[Get('admin_user')]
    #[AdminAuthorize('admin.adminUser.index')]
    public function index() {}
}
