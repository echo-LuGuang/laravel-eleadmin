<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => ['required', 'integer', 'min:1'],
            'limit' => ['required', 'integer', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'page.required' => '页码不能为空',
            'page.integer' => '页码必须为整数',
            'page.min' => '页码最小值为1',
            'limit.required' => '每页数量不能为空',
            'limit.integer' => '每页数量必须为整数',
            'limit.min' => '每页数量最小值为10',
            'limit.max' => '每页数量最大值为100',
        ];
    }
}
