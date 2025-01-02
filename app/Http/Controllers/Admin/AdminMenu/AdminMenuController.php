<?php

namespace App\Http\Controllers\Admin\AdminMenu;

use App\Attributes\AdminPermissionAttribute;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use App\Http\Middleware\Admin\AdminPermissionMiddleware;
use App\Http\Requests\Admin\AdminMenu\AdminMenuRequest;
use App\Models\Admin\AdminMenu;
use App\Tools\WhereTool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Delete;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Put;
use Spatie\RouteAttributes\Attributes\WhereNumber;

#[Middleware([AdminJwtAuthMiddleware::class, AdminPermissionMiddleware::class])]
final class AdminMenuController extends AdminBaseController
{
    /**
     * 获取所有的菜单
     */
    #[Get('menu')]
    #[AdminPermissionAttribute('admin.menu.index')]
    public function index(Request $request): JsonResponse
    {
        $params = $request->only(['title', 'path', 'authority']);

        // 构建where数组
        $where = WhereTool::buildWhere($params);

        // 获取所有的菜单
        $menus = AdminMenu::query()->where($where)->get();

        return $this->success($menus);
    }

    /**
     * 添加菜单
     */
    #[Post('menu')]
    #[AdminPermissionAttribute('admin.menu.store')]
    public function store(AdminMenuRequest $request): JsonResponse
    {
        $validated = $request->validated();

        AdminMenu::query()->create($validated);

        return $this->success();
    }

    /**
     * 修改菜单
     */
    #[Put('menu/{menuId}')]
    #[WhereNumber('menuId')]
    #[AdminPermissionAttribute('admin.menu.update')]
    public function update(int $menuId, AdminMenuRequest $request): JsonResponse
    {
        $validated = $request->validated();
        AdminMenu::query()->where('id', $menuId)->update($validated);

        return $this->success();
    }

    /**
     * 删除菜单
     */
    #[Delete('menu/{menuId}')]
    #[AdminPermissionAttribute('admin.menu.destroy')]
    public function destroy(int $menuId): JsonResponse
    {
        AdminMenu::query()->where('id', $menuId)->delete();

        return $this->success();
    }
}
