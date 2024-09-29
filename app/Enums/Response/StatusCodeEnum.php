<?php

namespace App\Enums\Response;

use Symfony\Component\HttpFoundation\Response;

enum StatusCodeEnum: int
{
    /**
     * 请求成功
     */
    case HTTP_OK = 200;

    /**
     * 请求失败
     */
    case HTTP_BAD_REQUEST = 400;

    /**
     * 未登录
     */
    case HTTP_UNAUTHORIZED = 401;

    /**
     * 请求内容不存在
     */
    case HTTP_NOT_FOUND = 404;

    /**
     * 请求方式不允许
     */
    case HTTP_METHOD_NOT_ALLOWED = 405;

    /**
     * 请求频繁
     */
    case HTTP_TOO_MANY_REQUESTS = 429;

    /**
     * 内部错误
     */
    case HTTP_INTERNAL_SERVER_ERROR = 500;
}
