<?php

namespace App\Data\Admin\AdminDictionart;

use Spatie\LaravelData\Data;

class AdminDictionaryData extends Data
{
    public function __construct(
        public string $code,
    ) {}
}
