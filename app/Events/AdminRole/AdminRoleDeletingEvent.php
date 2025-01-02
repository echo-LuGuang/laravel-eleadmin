<?php

namespace App\Events\AdminRole;

use App\Models\Admin\AdminRole;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdminRoleDeletingEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(AdminRole $adminRole)
    {
        // 删除角色菜单关联数据
        $adminRole->menus()->detach();
    }
}
