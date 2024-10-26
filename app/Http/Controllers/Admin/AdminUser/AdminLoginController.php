<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Data\Admin\AdminUser\LoginData;
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
    public function login(LoginData $loginData): JsonResponse
    {
        $token = $this->adminUserService->login($loginData);

        return $this->success([
            'token' => $token,
        ], '登录成功');
    }
}
