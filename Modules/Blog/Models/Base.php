<?php

namespace Modules\Blog\Models;

use App\BaseModel;
use EasySlug\EasySlug;


class Base extends BaseModel
{

  use EasySlug;

  public function categories() {
    if($this->category_id) {
      $default_value = '<span class="text-muted">'. __('Blog::blog.deleted_category') .'</span>';
    } else {
      $default_value = __('Blog::blog.empty_category');
    }
    $cat = $this->belongsTo(BlogCategory::class,'category_id','id');
    return $cat->withDefault([
        'name' => $default_value,
      ]);
  }


  //setters
  public function setSlugAttribute($value) {
    $this->EasySlugCheck($value, 'slug', 'name');
  }

  public function setMetaTitleAttribute($value) {
    if(!$value) {
      $value = mb_strimwidth($this->name, 0, 60);
    }
    $this->attributes['meta_title'] = mb_strimwidth($value, 0, 60);
  }

}
