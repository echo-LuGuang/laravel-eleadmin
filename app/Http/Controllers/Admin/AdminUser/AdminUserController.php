<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Attributes\AdminPermissionAttribute;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use App\Http\Middleware\Admin\AdminPermissionMiddleware;
use App\Http\Requests\PageRequest;
use App\Models\Admin\AdminUser;
use Illuminate\Http\JsonResponse;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware([AdminJwtAuthMiddleware::class, AdminPermissionMiddleware::class])]
final class AdminUserController extends AdminBaseController
{
    #[Get('admin_user')]
    #[AdminPermissionAttribute('admin.adminUser.index')]
    public function index(PageRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $params = $request->only(['nickname', 'username']);

        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');

        $where = [];
        foreach ($params as $key => $value) {
            if (! empty($value)) {
                $where[] = [$key, '=', $value];
            }
        }

        $data = AdminUser::with(['roles' => function ($query) {
            $query->select(['admin_roles.id', 'admin_roles.name']);
        }])->where($where)->orderBy($sort, $order)->paginate($validated['limit']);

        return $this->success($data);
    }
}
