<?php

namespace App\Http\Requests\Admin\AdminRole;

use App\Models\Admin\AdminRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class AdminRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $roleId = $this->route('roleId');

        return [
            'name' => ['required', 'string', 'max:20'],
            'code' => ['required', 'string', 'max:20', Rule::unique(AdminRole::class)->ignore($roleId)],
            'notes' => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '角色名称',
            'code' => '角色标识',
            'notes' => '备注',
        ];
    }
}
