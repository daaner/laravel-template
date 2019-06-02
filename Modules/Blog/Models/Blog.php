<?php

namespace Modules\Blog\Models;


class Blog extends Base
{

  protected $table = 'blogs';


  protected $casts = [
    'published_at' => 'datetime',
    'published_to' => 'datetime',
  ];


  public function setSlugAttribute($value) {
    $this->EasySlugCheck($value, 'slug');
  }

}
