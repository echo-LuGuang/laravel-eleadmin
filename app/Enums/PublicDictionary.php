<?php

namespace App\Enums;

use App\Enums\AdminMenu\AdminMenuOpenTypeEnum;
use App\Enums\AdminMenu\AdminMenuTypeEnum;
use App\Enums\Common\StatusEnum;

/**
 * 公开的枚举字典类 将对应的枚举转字典给前端使用
 */
final readonly class PublicDictionary
{
    /**
     * 状态
     */
    const STATUS_ENUM = StatusEnum::class;

    /**
     * 菜单类型
     */
    const ADMIN_MENU_TYPE = AdminMenuTypeEnum::class;

    /**
     * 菜单打开类型
     */
    const ADMIN_MENU_OPEN_TYPE = AdminMenuOpenTypeEnum::class;
}
