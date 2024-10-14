<?php

namespace App\Http\Middleware\Admin;

use App\Attributes\AdminPermissionAttribute;
use App\Enums\Common\PermissionConditionEnum;
use App\Exceptions\ApiException;
use App\Models\Admin\AdminUser;
use App\Tools\JsonTool;
use Closure;
use Illuminate\Http\Request;
use ReflectionMethod;
use Symfony\Component\HttpFoundation\Response;

class AdminPermissionMiddleware extends AdminJwtAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // 获取当前控制器和方法
            $controller = $request->route()->getController();
            $action = $request->route()->getActionMethod();

            $methodReflection = new ReflectionMethod($controller, $action);
            $attributes = $methodReflection->getAttributes(AdminPermissionAttribute::class);
            if (! empty($attributes)) {
                $code = $attributes[0]->newInstance()->code;
                $condition = $attributes[0]->newInstance()->condition;
                if (! $this->checkPermission($code, $condition)) {
                    throw new ApiException('没有访问权限');
                }
            }

        } catch (\Exception $exception) {
            return JsonTool::error($exception->getMessage());
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
        if ($permissionConditionEnum == PermissionConditionEnum::ANY_CONTAINS && is_array($code)) {
            return $adminUser->canAny($code);
        }

        return $adminUser->can($code);
    }
}
