<?php

namespace App\Http\Controllers\Admin\AdminDictionary;

use App\Attributes\EnumDescribeAttribute;
use App\Data\Admin\Dictionart\DictionaryData;
use App\Enums\PublicDictionary;
use App\Exceptions\ApiException;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Middleware\Admin\AdminJwtAuthMiddleware;
use Illuminate\Http\JsonResponse;
use ReflectionClass;
use ReflectionClassConstant;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware([AdminJwtAuthMiddleware::class])]
final class AdminDictionaryController extends AdminBaseController
{
    /**
     * 获取字典数据
     */
    #[Get('dictionary')]
    public function dictionary(DictionaryData $dictionaryData): JsonResponse
    {
        $code = $dictionaryData->code;

        // 反射获取类
        $publicDictionaryClass = new ReflectionClass(PublicDictionary::class);
        if (! $publicDictionaryClass->hasConstant($code)) {
            throw new ApiException("枚举 $code 未定义");
        }

        // 获取对应的枚举类名
        $enumClassName = $publicDictionaryClass->getConstant($code);
        if (! enum_exists($enumClassName)) {
            throw new ApiException("枚举类 $enumClassName 不存在");
        }

        $enumClass = $enumClassName::cases();

        $data = [];
        foreach ($enumClass as $enum) {
            // 反射获取枚举属性的注解
            $classConstantReflection = new ReflectionClassConstant($enumClassName, $enum->name);

            $enumDescribeAttribute = $classConstantReflection->getAttributes(EnumDescribeAttribute::class)[0] ?? null;

            if (! empty($enumDescribeAttribute)) {
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
