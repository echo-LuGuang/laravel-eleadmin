<?php

namespace App\Tools;

final class WhereTool
{
    public static function buildWhere(array $where): array
    {
        return array_filter($where, fn ($item) => $item !== '' && $item !== null);
    }
}
