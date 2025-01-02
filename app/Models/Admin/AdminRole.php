<?php

namespace App\Models\Admin;

use App\Events\AdminRole\AdminRoleDeletingEvent;
use App\Models\BaseModel;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperAdminRole
 */
final class AdminRole extends BaseModel
{
    use Cachable;

    protected $fillable = ['code', 'name', 'notes'];

    protected $dispatchesEvents = [
        'deleting' => AdminRoleDeletingEvent::class
    ];

    /**
     * 关联菜单
     */
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(AdminMenu::class, 'admin_role_menus');
    }

    /**
     * 关联用户
     */
    public function adminUsers(): BelongsToMany
    {
        return $this->belongsToMany(AdminUser::class, 'admin_user_roles');
    }
}
