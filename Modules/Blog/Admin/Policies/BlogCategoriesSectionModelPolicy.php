<?php

namespace Modules\Blog\Admin\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Blog\Admin\Sections\BlogCategories as Section;
use Modules\Blog\Models\BlogCategory as Model;

class BlogCategoriesSectionModelPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability, Section $section, Model $item = null)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function display(User $user, Section $section, Model $item)
    {
        // if ($user->isAdmin()) {
        //   return true;
        // }
        return true;
    }

    public function create(User $user, Section $section, Model $item)
    {
        // if ($user->isAdmin()) {
        //   return true;
        // }
        return true;
    }

    public function edit(User $user, Section $section, Model $item)
    {
        // if ($user->isAdmin()) {
        //   return true;
        // }
        return true;
    }

    public function delete(User $user, Section $section, Model $item)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function restore(User $user, Section $section, Model $item)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function destroy(User $user, Section $section, Model $item)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }
}
