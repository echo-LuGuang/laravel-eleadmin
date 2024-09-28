<?php

use App\Enums\Response\StatusCodeEnum;
use App\Tools\JsonTool;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // 验证异常
        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api/*')) {
                return JsonTool::error($e->validator->errors()->first());
            }

            return false;
        });

        // 运行时异常
        $exceptions->render(function (RuntimeException $e, Request $request) {
            if ($request->is('api/*')) {
                return JsonTool::fail();
            }

            return false;
        });

        // 404
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return JsonTool::error('请求的内容不存在', [], StatusCodeEnum::HTTP_NOT_FOUND);
            }

            return false;
        });

        // 405
        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return JsonTool::error('请求方式不允许', [], StatusCodeEnum::HTTP_METHOD_NOT_ALLOWED);
            }

            return false;
        });

        // 429
        $exceptions->render(function (TooManyRequestsHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return JsonTool::error('请求太频繁，请稍后再试', [], StatusCodeEnum::HTTP_TOO_MANY_REQUESTS);
            }

            return false;
        });

        // 未捕获的异常
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                return JsonTool::fail();
            }

            return false;
        });

    })->create();
