<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

final class AdminUser extends Authenticatable implements JWTSubject
{
    /**
     * 关联角色
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(AdminRole::class, 'admin_user_roles');
    }

    /**
     * 检查是否具有指定的角色
     */
    public function hasRole(string $code): bool
    {
        return $this->roles()->where('code', $code)->exists();
    }

    /**
     * 检查是否拥有指定的权限
     */
    public function hasPermission(string|array $authority_codes): bool
    {
        // 兼容单个权限的判断
        if (is_string($authority_codes)) {
            $authority_codes = [$authority_codes];
        }

        return $this->roles()->whereHas('menus', function ($query) use ($authority_codes) {
            $query->whereIn('authority_code', $authority_codes);
        })->count() === count($authority_codes);
    }

    /**
     * 检查是否拥有任何一个权限
     */
    public function hasAnyPermission(array $authority_codes): bool
    {
        return $this->roles()->whereHas('menus', function ($query) use ($authority_codes) {
            $query->whereIn('authority_code', $authority_codes);
        })->exists();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
