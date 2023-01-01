<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|between:3,255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|between:8,50|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('request.name.required'),
            'name.between'  => __('request.name.between'),

            'email.required' => __('request.email.required'),
            'email.email'    => __('request.email.email'),
            'email.unique'   => __('request.email.unique'),
            'email.max'      => __('request.max'),

            'password.required'  => __('request.password.required'),
            'password.between'   => __('request.password.between'),
            'password.confirmed' => __('request.password.confirmed'),
        ];
    }
}
