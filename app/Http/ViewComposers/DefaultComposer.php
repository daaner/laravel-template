<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class DefaultComposer
{
    private $test;

    public function __construct()
    {
        $this->test = 'test';
    }

    public function compose(View $view)
    {
        $view->with('test', $this->test);
    }
}
