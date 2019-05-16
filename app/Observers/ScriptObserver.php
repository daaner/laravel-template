<?php

namespace App\Observers;

use App\Models\Script as Model;


class ScriptObserver
{


  public function __construct() {
  }


  public function creating(Model $result) {
  }


  public function created(Model $result) {
    cache()->forget('scripts');
  }

  public function updating(Model $result) {
  }


  public function updated(Model $result) {
    cache()->forget('scripts');
  }


  public function deleted(Model $result) {
    cache()->forget('scripts');
  }

}
