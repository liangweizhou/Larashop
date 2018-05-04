<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoicePost extends FormRequest
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
            'org_name' => 'required|string',
            'tax_id' => 'required|string',
            'org_addr' => 'required|string',
            'org_tel' => 'required|string',
            'org_bank' => 'required|string',
            'org_account' => 'required|string'
        ];
    }

    public function messages()
    {
        return [

            'org_name.required' => '需要公司名',
            'tax_id.required' => '需要税号',
            'org_addr.required' => '需要公司地址',
            'org_tel.required' => '需要公司电话',
            'org_bank.required' => '需要银行名',
            'org_account.required' => '需要账户名',
        ];
    }
}
