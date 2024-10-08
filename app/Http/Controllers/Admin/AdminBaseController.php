<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminUser;

abstract class AdminBaseController extends Controller
{
    /**
     * 获取当前登录的admin用户
     */
    protected function adminUser(): ?AdminUser
    {
        /** @var AdminUser $adminUser */
        $adminUser = auth()->user();

        return $adminUser;
    }

    /**
     * 获取当前登录的admin用户Id
     */
    public function adminId(): int|string|null
    {
        return auth()->id();
    }
}
