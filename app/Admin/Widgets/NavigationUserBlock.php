<?php

namespace App\Admin\Widgets;

use AdminTemplate;
use SleepingOwl\Admin\Widgets\Widget;

class NavigationUserBlock extends Widget
{
    public function toHtml()
    {
        return view('admin::auth.navbar', [
      'user' => auth()->user(),
    ])->render();
    }

    public function template()
    {
        return AdminTemplate::getViewPath('_partials.header');
    }

    public function block()
    {
        return 'navbar.right';
    }
}
