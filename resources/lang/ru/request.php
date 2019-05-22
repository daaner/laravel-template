<?php

return [

  'max' => 'Слишком длинное значение',

  'name' => [
    'required' => 'Нужно указать имя',
    'between' => 'Нужно минимум 3 символа',
  ],

  'email' => [
    'required' => 'Почта должна быть указана',
    'email' => 'Почта должна быть действительна',
    'unique' => 'Такая почта уже используется',
  ],

  'password' => [
    'required' => 'Нужно указать пароль',
    'between' => 'Пароль должен быть от 8 до 50 символов',
    'confirmed' => 'Пароли не совпадают',
  ],


];
