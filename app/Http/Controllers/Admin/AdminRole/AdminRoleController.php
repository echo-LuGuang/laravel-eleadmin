<?php

namespace App\Http\Controllers\Admin\AdminRole;

use App\Attributes\AdminPermissionAttribute;
use App\Data\Admin\Common\PageData;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use App\Http\Middleware\Admin\AdminPermissionMiddleware;
use App\Http\Requests\Admin\AdminRole\AdminRoleRequest;
use App\Models\Admin\AdminRole;
use App\Traits\PageListTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Delete;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Put;
use Spatie\RouteAttributes\Attributes\WhereNumber;

#[Middleware([AdminJwtAuthMiddleware::class, AdminPermissionMiddleware::class])]
final class AdminRoleController extends AdminBaseController
{
    use PageListTrait;

    /**
     * 获取角色
     */
    #[Get('role')]
    #[AdminPermissionAttribute('admin.role.index')]
    public function index(PageData $pageData, Request $request): JsonResponse
    {
        $params = $request->only(['name', 'code']);
        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');

        $roleModel = AdminRole::query()->orderBy($sort, $order);
        $data = $this->pageList($roleModel, $pageData, $params);

        return $this->success($data);
    }

    /**
     * 添加角色
     */
    #[Post('role')]
    #[AdminPermissionAttribute('admin.role.store')]
    public function store(AdminRoleRequest $request): JsonResponse
    {
        $validated = $request->validated();

        AdminRole::query()->create($validated);

        return $this->success();
    }

    /**
     * 修改角色
     */
    #[Put('role/{roleId}')]
    #[WhereNumber('roleId')]
    #[AdminPermissionAttribute('admin.role.update')]
    public function update(int $roleId, AdminRoleRequest $request): JsonResponse
    {
        $validated = $request->validated();

        AdminRole::query()->where('id', $roleId)->update($validated);

        return $this->success();
    }

    /**
     * 删除角色
     */
    #[Delete('role/{roleId}')]
    #[WhereNumber('roleId')]
    #[AdminPermissionAttribute('admin.role.destroy')]
    public function destroy(int $roleId): JsonResponse
    {
        $adminRole = AdminRole::query()->findOrFail($roleId);

        if ($adminRole->code == 'admin') {
            return $this->error('超级管理员身份无法删除');
        }

        $adminRole->delete();

        return $this->success();
    }
}
