<?php

namespace App\Http\ViewComposers;

use App\Repositories\ScriptRepository;
use Illuminate\View\View;

class ScriptComposer
{
    private $scripts_top;
    private $scripts_bottom;

    public function __construct()
    {
        $this->scripts_top = collect();
        $this->scripts_bottom = collect();

        $data = new ScriptRepository();
        // $scripts = $data->getScripts();
        $scripts = $data->getCacheScripts();

        if (isset($scripts[1])) {
            $this->scripts_top = $scripts[1];
        }
        if (isset($scripts[0])) {
            $this->scripts_top = $scripts[0];
        }
    }

    public function compose(View $view)
    {
        $view->with([
            'scripts_top'    => $this->scripts_top,
            'scripts_bottom' => $this->scripts_bottom,
        ]);
    }
}
