<?php

namespace App\Http\Requests\Stuff\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'avatar' => ['file', 'image'], //jpeg, png, bmp, gif, svg, webpのみ承認
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
