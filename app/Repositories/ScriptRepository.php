<?php

namespace App\Repositories;

use App\Models\Script as Model;
use App\Repositories\InitRepository;

use Cache;

class ScriptRepository extends InitRepository
{

  public function __construct() {
    parent::__construct();
  }

  protected function getModelClass() {
    return Model::class;
  }


  public function getScripts() {
    $columns = [
      // 'id',
      // 'name',
      'data',
      'top',
    ];

    $result = $this->startConditions()
      ->active()
      ->select($columns)
      ->toBase()
      ->get();

    $result = $result->groupBy('top');
    // dd($result);
    return $result;
  }


  public function getCacheScripts() {
    $cache_name = 'scripts';

    if (Cache::has($cache_name) && !Cache::get($cache_name)->isEmpty()) {
      $data_cache = Cache::get($cache_name);
    } else {
      $data_cache = Cache::remember($cache_name, $this->cache_time_forever, function () {
        return $this->getScripts();
      });
    }

    return $data_cache;
  }

}
