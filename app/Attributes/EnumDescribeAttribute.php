<?php

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class EnumDescribeAttribute
{
    public function __construct(
        public string $code,
    ) {}
}
