<?php

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class AdminAuthorize
{
    public function __construct(public string $code) {}
}
