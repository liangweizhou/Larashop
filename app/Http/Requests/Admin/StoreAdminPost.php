<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminPost extends FormRequest
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
            'email' => 'required',
            'password' => 'required|between:6,20',
        ];
    }

    public function messages()
    {
        return
            [
                'email.required' => '邮箱不能为空',
                'password.required' => '密码不能为空',
                'password.between' => '密码不满足要求'

            ]; // TODO: Change the autogenerated stub
    }
}
