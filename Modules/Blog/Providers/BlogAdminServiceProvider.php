<?php

namespace Modules\Blog\Providers;

use Modules\Blog\Models\Blog;
use Modules\Blog\Models\BlogCategory;
use SleepingOwl\Admin\Navigation\Page;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class BlogAdminServiceProvider extends ServiceProvider
{
    protected $sections = [
    Blog::class          => 'Modules\Blog\Admin\Sections\Blogs',
    BlogCategory::class  => 'Modules\Blog\Admin\Sections\BlogCategories',
  ];

    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        $this->registerPolicies('Modules\\Blog\\Admin\\Policies\\');

        parent::boot($admin);
        $this->registerNavigation();
    }

    private function registerNavigation()
    {
        \AdminNavigation::setFromArray([
      [
        'title'    => __('adm.modules.blog'),
        'icon'     => 'fab fa-blogger-b',
        'priority' => 100,
        'pages'    => [
          (new Page(BlogCategory::class))->setPriority(100),
          (new Page(Blog::class))->setPriority(200),
        ],
      ],
    ]);
    }
}
