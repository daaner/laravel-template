<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }


  public function rules() {
    return [
      'name'      => 'required|between:3,250',
      // 'login'      => 'required|between:3,250|unique:users',
      'email'     => 'required|email|max:255|unique:users',
      'password'  => 'required|between:8,50|confirmed'
    ];
  }


  public function messages() {
    return [
      'name.required' => "Нужно имя",
      'name.between' => "Нужно минимум 3 символа",

      'email.required' => "Такой логин уже используется",
      'email.unique' => "Такой логин уже используется",
    ];
  }


  // public function filters() {
  //   return [
  //     'email' => 'trim|lowercase',
  //   ];
  // }



}
