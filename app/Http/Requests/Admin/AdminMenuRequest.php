<?php

namespace App\Http\Requests\Admin;

use App\Enums\AdminMenu\AdminMenuOpenTypeEnum;
use App\Enums\AdminMenu\AdminMenuTypeEnum;
use App\Models\Admin\AdminMenu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class AdminMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $menuId = $this->route('menuId');

        return [
            'title' => ['required', 'string', 'max:20'],
            'authority' => ['nullable', 'string'],
            'component' => ['nullable', 'string'],
            'is_hide' => ['required', 'integer', 'in:0,1'],
            'icon' => ['nullable', 'string'],
            'menu_type' => ['required', 'integer', Rule::in(AdminMenuTypeEnum::cases())],
            'open_type' => ['nullable', 'integer', Rule::in(AdminMenuOpenTypeEnum::cases())],
            'parent_id' => ['required', 'integer'],
            'sort' => ['nullable', 'integer'],
            'path' => ['nullable', 'string', Rule::unique(AdminMenu::class)->ignore($menuId)],
            'meta' => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => '菜单名称',
            'authority_code' => '权限标识',
            'component' => '组件路径',
            'is_hide' => '是否展示',
            'icon' => '菜单图标',
            'menu_type' => '菜单类型',
            'open_type' => '打开方式',
            'parent_id' => '上级菜单',
            'sort' => '排序号',
            'path' => '组件路径',
            'meta' => '路由元数据',
        ];
    }
}
