<?php

namespace App\Admin\Policies;

use App\Admin\Sections\Users;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersSectionModelPolicy
{

  use HandlesAuthorization;

  public function before(User $user, $ability, Users $section, User $item = null)
  {
    // if ($user->isAdmin()) {
    //   return true;
    // }
  }


  public function display(User $user, Users $section, User $item) {
    if ($user->isAdmin()) {
      return true;
    }
    return false;
  }

  public function create(User $user, Users $section, User $item) {
    if ($user->isAdmin()) {
      return true;
    }
    return false;
  }

  public function edit(User $user, Users $section, User $item) {
    if ($user->isAdmin()) {
      return true;
    }
    return false;
  }

  public function delete(User $user, Users $section, User $item) {
    if ($user->isAdmin()) {
      return $item->id > 3;
    }
    return false;
  }

  public function restore(User $user, Users $section, User $item) {
    if ($user->isAdmin()) {
      return true;
    }
    return false;
  }

}
