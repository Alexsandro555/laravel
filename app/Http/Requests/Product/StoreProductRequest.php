<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    /**
     * Determine if the user is authorized
     *
     * @return bool
     */
    /**
     * @param string $pathInfo
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => '',
            'qty' => 'numeric',
            'active' => '',
            'sort' => 'numeric',
            'onsale' => '',
            'special' => '',
            'need_order' => '',
            'category_id' => 'required',
            'type_product_id' => 'required',
            'article' => 'required'
        ];
    }

}