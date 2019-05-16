<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\Script;
use App\Observers\ScriptObserver;

class AppServiceProvider extends ServiceProvider
{
  /**
    * Register any application services.
    *
    * @return void
    */
  public function register()
  {
    //
  }

  /**
    * Bootstrap any application services.
    *
    * @return void
    */
  public function boot()
  {
    Schema::defaultStringLength(191);

    //Observers
    Script::observe(ScriptObserver::class);

  }
}
