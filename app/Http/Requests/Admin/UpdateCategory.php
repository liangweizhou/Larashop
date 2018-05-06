<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|between:1,10',
            'spu_conf' => 'required|json',
            'sku_conf' => 'required|json'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '品类名称必填',
            'name.size' => '品类名称长度须在1-10个字符之间',
            'spu_conf.required' => 'SPU配置必填',
            'spu_conf.json' => 'SPU配置须为合法的json格式',
            'sku_conf.required' => 'SKU配置必填',
            'sku_conf.json' => 'SPU配置须为合法的json格式'
        ];
    }
}
