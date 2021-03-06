<?php

namespace App\Http\Requests\Stuff\Customer;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
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
            'log'              => ['required', 'string', 'max:2000'],
        ];
    }

    public function attributes()
    {
        return [
            'log'            => 'メモ',
        ];
    }
}
