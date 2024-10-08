<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Data\Admin\AdminUser\AdminLoginData;
use Spatie\RouteAttributes\Attributes\Post;

final readonly class AdminLoginController
{
    #[Post('login')]
    public function login(AdminLoginData $adminLoginData)
    {
        dump($adminLoginData->username);
    }
}
