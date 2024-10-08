<?php

namespace Database\Seeders;

use App\Models\Admin\AdminUser;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::query()->create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'nickname' => 'admin',
        ]);
    }
}
