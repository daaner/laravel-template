<?php

namespace App\Http\ViewComposers;

use App\Repositories\SettingRepository;
use Illuminate\View\View;

class SettingComposer
{
    private $settings;

    public function __construct()
    {
        $this->settings = collect();

        $set_data = new SettingRepository();
        $this->settings = $set_data->getCacheSetting();

        // use App\Repositories\SettingRepository;
    // $set_data = new SettingRepository;
    // $settings = $set_data->getCacheSetting();
    }

    public function compose(View $view)
    {
        $view->with([
      'settings' => $this->settings,
    ]);
    }
}
