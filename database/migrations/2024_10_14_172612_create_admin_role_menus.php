<?php

use App\Models\Admin\AdminMenu;
use App\Models\Admin\AdminRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_role_menus', function (Blueprint $table) {
            $table->foreignIdFor(AdminRole::class)->comment('角色ID');
            $table->foreignIdFor(AdminMenu::class)->comment('菜单ID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_role_menus');
    }
};
