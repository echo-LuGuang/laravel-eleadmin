<?php

namespace App\Enums\Common;

use App\Attributes\EnumDescribeAttribute;

enum StatusEnum: int
{
    #[EnumDescribeAttribute('正常')]
    case STATUS_NORMAL = 1;

    #[EnumDescribeAttribute('禁用')]
    case STATUS_DISABLE = 0;
}
