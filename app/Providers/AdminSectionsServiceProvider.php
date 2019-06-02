<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;

class AdminSectionsServiceProvider extends ServiceProvider
{

  protected $sections = [
    \App\User::class              => 'App\Admin\Sections\Users',
    \App\Role::class              => 'App\Admin\Sections\Roles',
    \App\Models\Script::class     => 'App\Admin\Sections\Scripts',
    \App\Setting::class           => 'App\Admin\Sections\Settings',

  ];


  protected $widgets = [
    \App\Admin\Widgets\NavigationUserBlock::class,
  ];


  public function boot(\SleepingOwl\Admin\Admin $admin) {
    $this->loadViewsFrom(base_path("resources/views/admin"), 'admin');
    $this->registerPolicies('App\\Admin\\Policies\\');

    parent::boot($admin);

    $this->app->call([$this, 'registerViews']);
  }


  public function registerViews(WidgetsRegistryInterface $widgetsRegistry) {
    foreach ($this->widgets as $widget) {
      $widgetsRegistry->registerWidget($widget);
    }
  }

}
