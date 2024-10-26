<?php

namespace App\Http\Controllers\Admin\AdminDictionary;

use App\Attributes\EnumDescribeAttribute;
use App\Enums\PublicDictionary;
use App\Exceptions\RuntimeException;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use ReflectionClass;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware([AdminJwtAuthMiddleware::class])]
final class AdminDictionaryController extends AdminBaseController
{
    /**
     * 获取字典数据
     */
    #[Get('dictionary')]
    public function dictionary(Request $request): JsonResponse
    {
        $code = $request->input('code');

        $publicDictionaryClass = new ReflectionClass(PublicDictionary::class);
        if (! $publicDictionaryClass->hasConstant($code)) {
            throw new RuntimeException("枚举 $code 未定义");
        }

        $enumClassName = $publicDictionaryClass->getConstant($code);
        if (! enum_exists($enumClassName)) {
            throw new RuntimeException("枚举类 $enumClassName 不存在");
        }

        $enumClass = $enumClassName::cases();

        $data = [];
        foreach ($enumClass as $enum) {
            $classConstantReflection = new \ReflectionClassConstant($enumClassName, $enum->name);

            $enumDescribeAttribute = $classConstantReflection->getAttributes(EnumDescribeAttribute::class)[0] ?? null;

            if ($enumDescribeAttribute) {
                $data[] = [
                    'name' => $enumDescribeAttribute->getArguments()[0],
                    'value' => $enum->value,
                    'code' => $enum->name,
                ];
            }
        }

        return $this->success($data);
    }
}
