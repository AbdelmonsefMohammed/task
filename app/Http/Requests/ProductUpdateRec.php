<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRec extends FormRequest
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
            'name' => 'sometimes|required|min:3|max:255|unique:products,id,'.$this->id,
            'price' => 'required|numeric',
            'main_image' =>'image|mimes:jpeg,png,jpg,gif,svg',
            'multiple_image.*' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ];
    }
}
