<?php

namespace App\Http\Controllers\Admin\AdminMenu;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use App\Http\Middleware\Admin\AdminPermissionMiddleware;
use App\Http\Requests\Admin\AdminMenuRequest;
use App\Models\Admin\AdminMenu;
use App\Tools\WhereTool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Put;
use Spatie\RouteAttributes\Attributes\WhereNumber;

#[Middleware([AdminJwtAuthMiddleware::class, AdminPermissionMiddleware::class])]
final class AdminMenuController extends AdminBaseController
{
    /**
     * 获取所有的菜单
     */
    #[Get('menu')]
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
     * 修改菜单
     */
    #[Put('menu/{menuId}')]
    #[WhereNumber('menuId')]
    public function update(int $menuId, AdminMenuRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $adminMenu = AdminMenu::query()->findOrFail($menuId);
        $adminMenu->update($validated);

        return $this->success();
    }
}
