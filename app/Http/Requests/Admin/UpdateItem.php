<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItem extends FormRequest
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
            'name' => 'required',
            // 'spu' => '',
            // 'sku' => '',
            'price' => 'required|numeric',
            'total_amount' => 'required|integer',
            'remaining_amount' => 'required|integer',
            'cover_img' => 'required'
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
            'name.required' => '单品名称必填',
            'price.required' => '单价必填',
            'price.numeric' => '单价必须是数字',
            'total_amount.required' => '总库存必填',
            'total_amount.integer' => '总库存必须为整数',
            'remaining_amount.required' => '总库存必填',
            'remaining_amount.integer' => '总库存必须为整数',
            'cover_img.required' => '封面图片必填'
        ];
    }
}
