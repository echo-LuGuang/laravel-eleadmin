<?php

namespace App\Enums\Common;

enum PermissionConditionEnum: string
{
    /**
     * 包含
     */
    case CONTAINS = 'contains';

    /**
     * 任何一个
     */
    case ANY_CONTAINS = 'any_contains';
}
