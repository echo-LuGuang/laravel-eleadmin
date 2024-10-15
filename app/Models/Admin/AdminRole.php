<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class AdminRole extends BaseModel
{
    use Cachable;

    protected $fillable = ['code', 'name', 'notes'];

    /**
     * 关联菜单
     */
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(AdminMenu::class, AdminRoleMenu::class);
    }

    /**
     * 关联用户
     */
    public function adminUsers(): BelongsToMany
    {
        return $this->belongsToMany(AdminUser::class, AdminUserRole::class);
    }
}
