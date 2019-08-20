<?php

namespace App\Repositories;

use App\BaseModel as Model;
use Cache;

class LocaleRepository extends InitRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getLng($lang)
    {
        if (!isset($lang)) {
            $lang = config('app.locale');
        }

        $files = glob(resource_path('lang/'.$lang.'/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name = basename($file, '.php');
            $strings[$name] = require $file;
        }

        //=== from modules
        $modules = config('module.modules');
        foreach ($modules as $module) {
            $module_files = glob(base_path('Modules/'.$module.'/resources/lang/'.$lang.'/*.php'));

            //add
            foreach ($module_files as $mfile) {
                $name = basename($mfile, '.php');
                $strings[$name] = require $mfile;
            }
        }
        //=== end modules

        $lng = 'window.i18n = '.json_encode($strings).';';

        return $lng;
    }

    public function getCacheLng($lang)
    {
        $cache_name = 'lng_'.$lang;

        if (Cache::has($cache_name) && !empty(Cache::get($cache_name))) {
            $data_cache = Cache::get($cache_name);
        } else {
            $data_cache = Cache::remember($cache_name, $this->cache_time_forever, function () use ($lang) {
                return $this->getLng($lang);
            });
        }

        return $data_cache;
    }
}
