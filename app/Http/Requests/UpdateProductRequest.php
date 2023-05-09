<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'id_cate' => 'required',
            'id_manufact' => 'required',
            'price' => 'required|numeric|max:1000000000|min:10000',
            'mota' => 'required|max:500'
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Please enter product name',
            'id_cate.required' => 'Please select a category',
            'id_manufact.required' => 'Please select manufacturer',
            'price.required' => 'Please enter price',
            'price.numeric' => 'Please enter the price as numeric',
            'price.max:1000000000' => 'Please enter a maximum price of 1000000000',
            'price.min:10000' => 'Please enter the minimum price is 10000',
            'mota.max:500' => 'Please enter description up to 500 characters',
            'mota.required' => 'cannot be left blank',
        ];
    }
}
