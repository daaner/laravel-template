<?php

namespace App\Admin\Policies;

use App\User;

use App\Admin\Sections\Settings as Section;
use App\Setting as Model;

use Illuminate\Auth\Access\HandlesAuthorization;

class SettingsSectionModelPolicy
{

  use HandlesAuthorization;

  public function before(User $user, $ability, Section $section, Model $item = null)
  {
    // if ($user->isAdmin()) {
    //   return true;
    // }
  }


  public function display(User $user, Section $section, Model $item) {
    if ($user->isAdmin()) {
      return true;
    }
    return true;
  }


  public function edit(User $user, Section $section, Model $item) {
    if ($user->isAdmin()) {
      return true;
    }
    return false;
  }

}
