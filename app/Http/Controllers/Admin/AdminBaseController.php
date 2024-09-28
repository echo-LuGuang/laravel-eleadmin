<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

abstract class AdminBaseController extends Controller
{
    private string $guard = 'admin';

    /**
     * 获取当前登录的admin用户
     */
    protected function admin()
    {
        return auth()->guard($this->guard);
    }

    /**
     * 获取当前登录的admin用户Id
     */
    public function adminId(): int
    {
        return auth($this->guard)->id();
    }

}
