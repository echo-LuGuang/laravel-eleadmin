<?php

namespace App\Enums\AdminMenu;

use App\Attributes\EnumDescribeAttribute;

enum AdminMenuOpenTypeEnum: int
{
    #[EnumDescribeAttribute('组件')]
    case COMPONENT = 0;

    #[EnumDescribeAttribute('内嵌')]
    case IFRAME = 1;

    #[EnumDescribeAttribute('外链')]
    case LINK = 2;
}
