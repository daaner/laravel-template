<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\BaseClearModel;

class BaseModel extends BaseClearModel
{

  use SoftDeletes;


  //Global scopes
  public function scopeActive($query) {
    return $query->where('deleted_at', null);
  }
  public function scopeDeleted($query) {
    return $query->whereNotNull('deleted_at');
  }


}
