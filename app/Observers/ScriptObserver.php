<?php

namespace App\Observers;

// use App\Models\Script as Model;

class ScriptObserver
{
    public function __construct()
    {
    }

    // public function creating(Model $result) {
    // }

    public function created()
    {
        cache()->forget('scripts');
    }

    // public function updating(Model) {
    // }

    public function updated()
    {
        cache()->forget('scripts');
    }

    public function deleted()
    {
        cache()->forget('scripts');
    }

    // public function restoring(Model $result) {
  //   cache()->forget('scripts');
  // }
  // public function restored(Model $result) {
  //   cache()->forget('scripts');
  // }
}
