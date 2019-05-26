<?php

namespace Modules;

use \Illuminate\Support\ServiceProvider;


class ModulesServiceProvider extends ServiceProvider
{

  public function boot() {
    //list modules
    $modules = config("module.modules");

    if($modules) {
      foreach ($modules as $module) {
        //routes
        if(file_exists( base_path('Modules/'.$module.'/Routes/routes.php') )) {
          $this->loadRoutesFrom(base_path('Modules/'.$module.'/Routes/routes.php'));
        }

        //load View
        if(is_dir( base_path('Modules/'.$module.'/resources/views') )) {
          $this->loadViewsFrom(base_path('Modules/'.$module.'/resources/views'), $module);
        }

        //Подгружаем миграции
        if(is_dir( base_path('Modules/'.$module.'/database/migrations') )) {
          $this->loadMigrationsFrom( base_path('Modules/'.$module.'/database/migrations') );
        }

        //load locales
        //__('Test::messages.welcome')
        if(is_dir( base_path('Modules/'.$module.'/resources/lang') )) {
          $this->loadTranslationsFrom(base_path('Modules/'.$module.'/resources/lang'), $module);
        }
      }

    }
  }

  public function register() {

  }

 }
