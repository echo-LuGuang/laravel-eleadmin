<?php

namespace App\Attributes;

use App\Enums\Common\PermissionConditionEnum;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class AdminPermissionAttribute
{
    public function __construct(
        public string|array $code,
        public PermissionConditionEnum $condition = PermissionConditionEnum::CONTAINS,
    ) {}
}
