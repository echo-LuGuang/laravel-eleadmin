<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class TestData extends Data
{
    public function __construct(
        public ?string $title,
        public ?string $content,
    ) {}
}
