<?php

namespace App\Enums\AdminMenu;

use App\Attributes\EnumDescribeAttribute;

enum AdminMenuTypeEnum: int
{
    #[EnumDescribeAttribute('目录')]
    case DIRECTORY = 0;

    #[EnumDescribeAttribute('菜单')]
    case MENU = 1;

    #[EnumDescribeAttribute('按钮')]
    case BUTTON = 2;
}
