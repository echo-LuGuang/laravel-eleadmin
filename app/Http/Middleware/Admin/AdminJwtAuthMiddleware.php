<?php

namespace App\Http\Middleware\Admin;

use App\Enums\Response\StatusCodeEnum;
use App\Tools\JsonTool;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

final class AdminJwtAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // 检查令牌是否有效
            JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException) {
            try {
                // 尝试刷新令牌
                $newToken = JWTAuth::parseToken()->refresh();
                $newToken = 'Bearer '.$newToken;
            } catch (JWTException) {
                // 刷新令牌失败
                return JsonTool::error(message: '登录状态失效，请重新登录', statusCodeEnum: StatusCodeEnum::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException) {
            return JsonTool::error(message: '请先登录', statusCodeEnum: StatusCodeEnum::HTTP_UNAUTHORIZED);
        }

        $response = $next($request);

        // 如果刷新了令牌，把新令牌放到响应头
        if (isset($newToken)) {
            $response->header('Authorization', $newToken);
        }

        return $response;
    }
}
