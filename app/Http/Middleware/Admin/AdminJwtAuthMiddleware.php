<?php

namespace App\Http\Middleware\Admin;

use App\Enums\Response\StatusCodeEnum;
use App\Tools\JsonTool;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class AdminJwtAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return JsonTool::error(message: '请先登录', statusCodeEnum: StatusCodeEnum::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
