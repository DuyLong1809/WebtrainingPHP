<?php

namespace App\Http\Requests;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'This box cannot be left blank',
            'name.max'=>'Up to 255 characters',
            'email.required'=>'This box cannot be left blank',
            'email.unique'=>'Email already exists',
            'password.required'=>'This box cannot be left blank',
            'password.confirmed'=>'password incorrect',
            'password_confirmation.required'=>'This box cannot be left blank',
        ];
    }
}
