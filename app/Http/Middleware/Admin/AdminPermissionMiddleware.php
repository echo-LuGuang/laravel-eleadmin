<?php

namespace App\Http\Middleware\Admin;

use App\Attributes\AdminPermissionAttribute;
use App\Enums\Common\PermissionConditionEnum;
use App\Models\Admin\AdminUser;
use App\Tools\JsonTool;
use Closure;
use Illuminate\Http\Request;
use ReflectionMethod;
use Symfony\Component\HttpFoundation\Response;

final class AdminPermissionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 获取当前控制器和方法
        $controller = $request->route()->getController();
        $action = $request->route()->getActionMethod();

        $methodReflection = new ReflectionMethod($controller, $action);
        $attributes = $methodReflection->getAttributes(AdminPermissionAttribute::class);
        if (! empty($attributes)) {
            $code = $attributes[0]->newInstance()->code;
            $condition = $attributes[0]->newInstance()->condition;
            if (! $this->checkPermission($code, $condition)) {
                return JsonTool::error('没有访问权限');
            }
        }

        return $next($request);
    }

    /**
     * 检查权限
     */
    private function checkPermission(string|array $code, PermissionConditionEnum $permissionConditionEnum): bool
    {
        /** @var AdminUser $admin */
        $adminUser = auth()->user();

        // 如果是超级管理员 直接返回true
        if ($adminUser->hasRole('admin')) {
            return true;
        }

        if ($permissionConditionEnum == PermissionConditionEnum::ANY_CONTAINS && is_array($code)) {
            return $adminUser->hasAnyPermission($code);
        }

        return $adminUser->hasPermission($code);
    }
}
