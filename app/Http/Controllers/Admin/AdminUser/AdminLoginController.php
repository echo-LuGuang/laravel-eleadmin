<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Data\Admin\AdminUser\AdminLoginData;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Services\Admin\AdminUser\AdminUserService;
use Illuminate\Http\JsonResponse;
use Spatie\RouteAttributes\Attributes\Post;

final class AdminLoginController extends AdminBaseController
{
    public function __construct(
        public AdminUserService $adminUserService,
    ) {}

    /**
     * 登录
     */
    #[Post('login')]
    public function login(AdminLoginData $adminLoginData): JsonResponse
    {
        $token = $this->adminUserService->login($adminLoginData);

        return $this->success([
            'token' => $token,
        ], '登录成功');
    }
}
