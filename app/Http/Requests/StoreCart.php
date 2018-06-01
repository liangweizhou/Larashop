<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCart extends FormRequest
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
            'item_id' => 'required|exists:items,id',
            'amount' => 'required|numeric'
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
            'item_id.required' => '单品ID必填',
            'item_id.exists' => '单品ID不存在',
            'amount.required' => '数量必填',
            'amount.numeric' => '数量必须是整数'
        ];
    }
}
