<?php

namespace App\Data\Admin\Dictionart;

use Spatie\LaravelData\Data;

class DictionaryData extends Data
{
    public function __construct(
        public string $code,
    ) {}
}
