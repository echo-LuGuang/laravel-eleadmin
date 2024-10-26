<?php

namespace App\Tools;

use App\Enums\Response\StatusCodeEnum;
use Illuminate\Http\JsonResponse;

final class JsonTool
{
    public static function encode(mixed $data, int $flags = JSON_UNESCAPED_UNICODE, int $depth = 512): string
    {
        return json_encode($data, $flags, $depth);
    }

    public static function decode(string $json, bool $assoc = true, int $depth = 512, int $flags = 0)
    {
        return json_decode($json, $assoc, $depth, $flags);
    }

    /**
     * 返回正确的json响应
     */
    public static function success(mixed $data = [], string $message = '操作成功', StatusCodeEnum $statusCodeEnum = StatusCodeEnum::HTTP_OK, array $header = []): JsonResponse
    {
        return self::json($data, $message, $statusCodeEnum, $header);
    }

    /**
     * 返回错误的json响应
     */
    public static function error(mixed $message = '操作失败', array $data = [], StatusCodeEnum $statusCodeEnum = StatusCodeEnum::HTTP_BAD_REQUEST, array $header = []): JsonResponse
    {
        return self::json($message, $data, $statusCodeEnum, $header);
    }

    /**
     * 返回失败的json响应
     */
    public static function fail(mixed $message = '系统错误', array $data = [], StatusCodeEnum $statusCodeEnum = StatusCodeEnum::HTTP_INTERNAL_SERVER_ERROR, array $header = []): JsonResponse
    {
        return self::json($message, $data, $statusCodeEnum, $header);
    }

    /**
     * 返回json响应
     */
    private static function json(mixed $data, mixed $message, StatusCodeEnum $statusCodeEnum, array $header): JsonResponse
    {
        $result = [
            'code' => $statusCodeEnum,
            'data' => $data,
            'message' => $message,
        ];

        if (is_string($data)) {
            $result['message'] = $data;
            $result['data'] = $message;
        }

        return response()->json($result, 200, $header, JSON_UNESCAPED_UNICODE);
    }
}
