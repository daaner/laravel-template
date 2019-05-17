<?php

use SleepingOwl\Admin\Navigation\Page;

return [
  [
    'title' => 'Панель',
    'icon'  => 'fa fa-dashboard',
    'url'   => route('admin.dashboard'),
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

];
