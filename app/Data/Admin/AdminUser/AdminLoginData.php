<?php

namespace App\Data\Admin\AdminUser;

use Spatie\LaravelData\Data;

class AdminLoginData extends Data
{
    public function __construct(
        public string $username,
        public string $password,
        public bool $remember = false,
    ) {}

    public static function messages(...$args): array
    {
        return [
            'username.required' => '请输入账号',
            'password.required' => '请输入密码',
        ];
    }
}
