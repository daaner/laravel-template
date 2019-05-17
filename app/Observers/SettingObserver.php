<?php

namespace App\Observers;

use App\Setting as Model;


class SettingObserver
{


  public function __construct() {
  }


  public function updated(Model $result) {
    cache()->forget('setting');
  }

}
