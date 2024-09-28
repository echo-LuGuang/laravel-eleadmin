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

        $response->headers->set('X-Log-Id', $logId);
        $content = $response->getContent();

        if (json_validate($content)) {
            $content = JsonTool::decode($response->getContent());
            $content['logid'] = $logId;
            $content = JsonTool::encode($content);
        }

        $response->setContent($content);

        return $response;
    }
}
