<?php

use SleepingOwl\Admin\Navigation\Page;

return [
  [
    'title'    => 'Панель',
    'icon'     => 'fas fa-tachometer-alt',
    'url'      => route('admin.dashboard'),
    'priority' => 50,
  ],

  // [
  //   'title' => 'name cat',
  //   'icon' => 'fa fa-users',
  //   'priority' => 100,
  //   'pages' =>
  //   [
  //     (new Page(\App\Models\Model::class))
  //     ->setTitle('name')
  //     ->setPriority(100),
  //   ],
  // ],

  // [
  //   'title' => 'Менеджер файлов',
  //   'icon'  => 'fa fa-files-o',
  //   'url'   => route('admin.filemanager'),
  //   'priority' => 3800,
  // ],

  [
    'title'    => 'Настройки',
    'icon'     => 'fas fa-cogs',
    'priority' => 5000,
    'pages'    => [
      (new Page(\App\Setting::class))
        ->setPriority(100),
      (new Page(\App\Models\Script::class))
        ->setPriority(800),
      (new Page(\App\User::class))
        ->setPriority(900),
      (new Page(\App\Role::class))
        ->setPriority(1000),
    ],
  ],

];
