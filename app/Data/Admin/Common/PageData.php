<?php

namespace App\Data\Admin\Common;

use Spatie\LaravelData\Data;

final class PageData extends Data
{
    public function __construct(
        public int $page,
        public int $limit,
    ) {}
}
