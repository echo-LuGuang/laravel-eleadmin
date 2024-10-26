<?php

namespace App\Enums;

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
}
