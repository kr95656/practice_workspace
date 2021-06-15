<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'tel'         => ['required', 'string'],
            'prefecture'  => ['required', 'string'],
            'city'        => ['required', 'string'],
            'street'      => ['required', 'string'],
            'employee_id' => ['required', 'integer'],
        ];
    }

    public function attributes()
    {
        return [
            'name'         => '顧客名',
            'email'        => 'メールアドレス',
            'tel'          => '電話番号',
            'prefecture'   => '都道府県',
            'city'         => '市町村',
            'street'       => '番地',
            'employee_id'  => '担当者',
        ];
    }
}
