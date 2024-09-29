<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

abstract class AdminBaseController extends Controller
{
    /**
     * 获取当前登录的admin用户
     */
    protected function admin()
    {
        return auth()->guard();
    }

    /**
     * 获取当前登录的admin用户Id
     */
    public function adminId(): int|string|null
    {
        return auth()->id();
    }
}
