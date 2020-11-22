<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRec extends FormRequest
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
            'name' => 'required|unique:products|min:3|max:255',
            'price' => 'required|numeric',
            'main_image' =>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'multiple_image.*' =>'image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ];
    }
}
