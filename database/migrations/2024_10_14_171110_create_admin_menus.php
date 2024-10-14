<?php

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
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('菜单标题');
            $table->string('icon')->nullable()->comment('菜单图标');
            $table->smallInteger('menu_type')->unsigned()->default(0)->comment('0:目录 1:菜单 2:按钮');
            $table->bigInteger('parent_id')->unsigned()->default(0)->comment('父级菜单');
            $table->string('authority_code')->nullable()->comment('权限标识');
            $table->boolean('is_hide')->default(false)->comment('是否隐藏');
            $table->string('path')->nullable()->comment('路由地址');
            $table->string('component')->nullable()->comment('组件地址');
            $table->smallInteger('open_type')->unsigned()->default(0)->comment('打开方式 0组件 1内链 2外链');
            $table->integer('sort')->default(0)->comment('排序 大-小');
            $table->text('meta')->nullable()->comment('路由元数据');
            $table->timestamps();

            $table->unique('path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_menus');
    }
};
