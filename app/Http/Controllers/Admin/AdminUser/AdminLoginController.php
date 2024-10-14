<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Data\Admin\AdminUser\AdminLoginData;
use App\Exceptions\ApiException;
use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\RouteAttributes\Attributes\Post;

final class AdminLoginController extends AdminBaseController
{
    #[Post('login')]
    public function login(AdminLoginData $adminLoginData): JsonResponse
    {
        $token = Auth::attempt([
            'username' => $adminLoginData->username,
            'password' => $adminLoginData->password,
        ]);

        if (! $token) {
            throw new ApiException('账号或密码错误');
        }

        return $this->success([
            'token' => $token,
        ], '登录成功');
    }
}
