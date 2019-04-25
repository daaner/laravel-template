<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory;
use View;

use App\Http\ViewComposers\DefaultComposer;


class ViewComposerServiceProvider extends ServiceProvider
{

  private $views;

  public function boot(Factory $viewFactory) {

    $this->views = $viewFactory;

    $this->compose('*', DefaultComposer::class);

  }


  private function compose($views, string $viewComposer){
    $this->app->singleton($viewComposer);
    $this->views->composer($views, $viewComposer);
  }

}
