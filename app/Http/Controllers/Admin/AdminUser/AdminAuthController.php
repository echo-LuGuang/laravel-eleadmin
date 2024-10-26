<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use App\Services\Admin\AdminUser\AdminUserService;
use Illuminate\Http\JsonResponse;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware([AdminJwtAuthMiddleware::class])]
final class AdminAuthController extends AdminBaseController
{
    public function __construct(
        public AdminUserService $adminUserService,
    ) {}

    /**
     * 获取当前登录用户的菜单、身份等信息
     */
    #[Get('auth/user')]
    public function user(): JsonResponse
    {
        $adminUser = $this->adminUser();

        // 获取用户所有的角色
        $roles = $this->adminUserService->getRoles($adminUser);

        // 获取用户可访问菜单
        $menus = $this->adminUserService->getMenus($adminUser);

        $data = [
            'roles' => $roles,
            'authorities' => $menus,
            ...$adminUser->setHidden(['password'])->toArray(),
        ];

        return $this->success($data);
    }

    /**
     * 退出登录
     */
    #[Get('auth/logout')]
    public function logout(): JsonResponse
    {
        auth()->logout();

        return $this->success();
    }
}
