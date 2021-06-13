<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'name'                   => ['required', 'string', 'max:255'],
            'description'            => ['required', 'string', 'max:2000'],
            'processing_date'        => ['required', 'date'],
            'expiration_date'        => ['required', 'date'],
            'category'               => ['required', 'integer'],
            'condition'              => ['required', 'integer'],
            'kind'                   => ['required', 'integer'],
            'place_of_origin'        => ['required', 'integer'],
            'price'                  => ['required', 'integer', 'min:100', 'max:9999999'],
            'stock_quantity'         => ['required', 'integer', 'min:1', 'max:100'],
        ];
    }

    public function attributes()
    {
        return [
            'name'                   => '商品名',
            'description'            => '商品説明',
            'processing_date'        => '加工日',
            'expiration_date'        => '消費期限',
            'category'               => 'カテゴリ',
            'condition'              => '等級',
            'kind'                   => '品種',
            'place_of_origin'        => '原産地',
            'price'                  => '販売価格',
            'stock_quantity'         => '在庫数',
        ];
    }
}
