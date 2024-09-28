<?php

namespace App\Http\Controllers;

use App\Enums\Response\StatusCodeEnum;
use App\Tools\JsonTool;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * 返回正确的json响应
     */
    protected function success($data = [], string $message = '操作成功', StatusCodeEnum $statusCodeEnum = StatusCodeEnum::HTTP_OK, array $header = []): JsonResponse
    {
        return JsonTool::success($data, $message, $statusCodeEnum, $header);
    }

    /**
     * 返回错误的json响应
     */
    protected function error(string $message = '操作失败', array $data = [], StatusCodeEnum $statusCodeEnum = StatusCodeEnum::HTTP_BAD_REQUEST, array $header = []): JsonResponse
    {
        return JsonTool::error($message, $data, $statusCodeEnum, $header);
    }
}
