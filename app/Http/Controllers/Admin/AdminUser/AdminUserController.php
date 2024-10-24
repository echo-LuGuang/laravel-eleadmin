<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Attributes\AdminPermissionAttribute;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use App\Http\Middleware\Admin\AdminPermissionMiddleware;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware([AdminJwtAuthMiddleware::class, AdminPermissionMiddleware::class])]
final class AdminUserController extends AdminBaseController
{
    #[Get('admin_user')]
    #[AdminPermissionAttribute('admin.adminUser.index')]
    public function index()
    {
        dump($this->adminUser()->roles()->get());
        dump(1);
    }
}
