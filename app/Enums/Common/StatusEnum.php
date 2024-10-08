<?php

namespace App\Enums\Common;

enum StatusEnum: int
{
    /**
     * 禁用
     */
    case STATUS_DISABLE = 0;

    /**
     * 正常
     */
    case STATUS_NORMAL = 1;

    public static function label(self $enum): string
    {
        return match ($enum) {
            self::STATUS_DISABLE => '禁用',
            self::STATUS_NORMAL => '正常',
        };
    }
}
