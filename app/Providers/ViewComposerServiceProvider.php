<?php

namespace App\Providers;

use App\Http\ViewComposers\DefaultComposer;
use App\Http\ViewComposers\ScriptComposer;
use App\Http\ViewComposers\SettingComposer;
use Illuminate\Contracts\View\Factory;
//dev
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    private $views;

    public function boot(Factory $viewFactory)
    {
        $this->views = $viewFactory;

        $this->compose('layouts.template', ScriptComposer::class);
        $this->compose('*', SettingComposer::class);

        //dev
        $this->compose('*', DefaultComposer::class);
    }

    private function compose($views, string $viewComposer)
    {
        $this->app->singleton($viewComposer);
        $this->views->composer($views, $viewComposer);
    }
}
