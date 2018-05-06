<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'parent_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|between:1,10|unique:categories,name',
        ];
    }


    /**
     * 自定义错误信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'parent_id.required' => '父品类必填',
            'parent_id.exists' => '父品类不存在',
            'name.required' => '品类名称必填',
            'name.size' => '品类名称长度须在1-10个字符之间',
            'name.unique' => '品类名称已存在',
            'spu_conf.required' => 'SPU配置必填',
            'spu_conf.json' => 'SPU配置须为合法的json格式',
            'sku_conf.required' => 'SKU配置必填',
            'sku_conf.json' => 'SPU配置须为合法的json格式'
        ];
    }
}
