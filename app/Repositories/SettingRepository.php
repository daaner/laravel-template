<?php

namespace App\Repositories;

use App\Setting as Model;
use App\Repositories\InitRepository;

use Cache;

class SettingRepository extends InitRepository
{

  public function __construct() {
    parent::__construct();
  }

  protected function getModelClass() {
    return Model::class;
  }


  public function getSsetting() {
    $columns = [
      // 'id',
      'name',
      'value',
    ];

    $result = $this->startConditions()
      ->select($columns)
      ->get();

    $setting = $result->mapWithKeys(function ($item) {
      return [$item['name'] => $item['value']];
    });

    // dd($setting);
    return $setting;
  }


  public function getCacheSetting() {
    $cache_name = 'setting';

    if (Cache::has($cache_name) && !Cache::get($cache_name)->isEmpty()) {
      $data_cache = Cache::get($cache_name);
    } else {
      $data_cache = Cache::remember($cache_name, $this->cache_time_forever, function () {
        return $this->getSsetting();
      });
    }

    return $data_cache;
  }

}
