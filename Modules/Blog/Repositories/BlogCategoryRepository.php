<?php

namespace Modules\Blog\Repositories;

use App\Repositories\InitRepository;
use Cache;
use Modules\Blog\Models\BlogCategory as Model;

class BlogCategoryRepository extends InitRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getBlogCategory($lang = null, $id = null)
    {
        $columns = [
      'id',
      'name',
      'lang',
      'active',
    ];

        $query = $this->startConditions()
      ->active()
      ->select($columns);

        if ($lang) {
            // $query->whereLang($lang);
        }

        if ($id) {
            $query->where('id', '!=', $id);
        }

        $result = $query->get();

        // $blogCat = $result
        //   ->values()
        //   ->keyBy('id')
        //   ->toArray()
        //   ;

        $blogCat = $result->mapWithKeys(function ($item) {
            return [
        $item['id'] => '('.config('app.locales')[$item['lang']].') '.$item['name'],
      ];
        });

        $blogCat->prepend(__('Blog::blog.empty_category'), 0);
        $blogCat = $blogCat->toArray();

        // dd($blogCat);
        return $blogCat;
    }

    public function getCacheSetting()
    {
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
