<?php

namespace App\Services\Admin\AdminUser;

use App\Data\Admin\AdminUser\AdminLoginData;
use App\Exceptions\ApiException;
use App\Models\Admin\AdminMenu;
use App\Models\Admin\AdminUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

final class AdminUserService
{
    /**
     * 账号密码登录
     */
    public function login(AdminLoginData $adminLoginData): string
    {
        $token = Auth::attempt([
            'username' => $adminLoginData->username,
            'password' => $adminLoginData->password,
        ]);

        if (! $token) {
            throw new ApiException('账号或密码错误');
        }

        return $token;
    }

    /**
     * 通过用户获取token
     */
    public function getToken(AdminUser $adminUser): string
    {
        return Auth::login($adminUser);
    }

    /**
     * 获取所有的角色
     */
    public function getRoles(AdminUser $adminUser): Collection
    {
        return $adminUser->roles->setHidden(['pivot', 'created_at', 'updated_at', 'menus']);
    }

    /**
     * 获取菜单
     */
    public function getMenus(AdminUser $adminUser): Collection
    {
        // 如果包含admin角色，直接返回全部的菜单
        if ($adminUser->hasRole('admin')) {
            return AdminMenu::query()->orderBy('sort')->orderBy('id')->get();
        }

        // 加载关联
        $adminUser->loadMissing('roles.menus');

        $menus = new Collection;
        foreach ($adminUser->roles as $role) {
            foreach ($role->menus as $menu) {
                $menus->push($menu->setHidden(['pivot', 'created_at', 'updated_at']));
            }
        }

        return $menus;
    }
}
