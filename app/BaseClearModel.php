<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class BaseClearModel extends Model
{


  public function users() {
    return $this->belongsTo(User::class,'user_id','id');
  }


  // public function setModifiedIdAttribute($value) {
  //   if(empty($value)) {
  //     $this->attributes['modified_id'] = auth()->user()->id;
  //   }
  // }

}
