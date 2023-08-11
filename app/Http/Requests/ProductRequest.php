<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_name'=> 'required|unique:products',
            'price'=> 'required',
            'quantity'=> 'required',
            'product_short_des'=> 'required',
            'product_long_des'=> 'required',
            'product_category_id'=> 'required',
            'product_subcategory_id'=> 'required',
            'product_img'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
