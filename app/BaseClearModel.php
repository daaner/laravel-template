<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class BaseClearModel extends Model
{


  //scopes
  public function scopeActive($query) {
    return $query->where('active', true);
  }

  

  public function creator() {
    return $this->belongsTo(User::class,'created_by','id')
      ->withDefault(['name' => 'None']);
  }

  public function editor() {
    return $this->belongsTo(User::class,'modifed_by','id')
      ->withDefault(['name' => 'None']);
  }


  //observers
  public static function boot() {
    parent::boot();

    self::creating(function($model) {
      if(Auth()->check()) {
        $model->created_by = Auth()->user()->id;
      }
    });

    self::updating(function($model) {
      if(Auth()->check()) {
        $model->modifed_by = Auth()->user()->id;
      }
    });
  }


}
