<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
      'email'     => 'required|email|max:255',
      'password'  => 'required|between:8,50',
    ];
    }

    public function messages()
    {
        return [
      'email.required' => __('request.email.required'),
      'email.email'    => __('request.email.email'),
      'email.max'      => __('request.max'),

      'password.required' => __('request.password.required'),
      'password.between'  => __('request.password.between'),
    ];
    }
}
