<?php

namespace App\Enums\Response;

use Symfony\Component\HttpFoundation\Response;

enum StatusCodeEnum: int
{
    /**
     * 请求成功
     */
    case HTTP_OK = Response::HTTP_OK;

    /**
     * 请求失败
     */
    case HTTP_BAD_REQUEST = Response::HTTP_BAD_REQUEST;

    /**
     * 未登录
     */
    case HTTP_UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;

    /**
     * 请求内容不存在
     */
    case HTTP_NOT_FOUND = Response::HTTP_NOT_FOUND;

    /**
     * 请求方式不允许
     */
    case HTTP_METHOD_NOT_ALLOWED = Response::HTTP_METHOD_NOT_ALLOWED;

    /**
     * 请求频繁
     */
    case HTTP_TOO_MANY_REQUESTS = Response::HTTP_TOO_MANY_REQUESTS;

    /**
     * 内部错误
     */
    case HTTP_INTERNAL_SERVER_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR;
}
