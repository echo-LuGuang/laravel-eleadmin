<?php

namespace App\Http\Middleware\Admin;

use App\Tools\JsonTool;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class UniqueRequestLogId
{
    public function handle(Request $request, Closure $next): Response
    {
        $logId = Str::uuid()->toString();
        $request->merge(['logid' => $logId]);

        $response = $next($request);

        // 设置响应头
        $response->headers->set('X-Log-Id', $logId);
        // 获取响应内容
        $content = $response->getContent();

        // 如果响应内容是json格式
        if ($request->acceptsJson()) {
            $content = JsonTool::decode($response->getContent());
            $content['logid'] = $logId;
            $content = JsonTool::encode($content);
        }

        $response->setContent($content);

        return $response;
    }
}
