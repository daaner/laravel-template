<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// ======= Base model without SoftDeletes

class BaseClearModel extends Model
{
    //scopes
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeDraft($query)
    {
        return $query->where('active', false);
    }

    public function creators()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')
      ->withDefault(['name' => '-']);
    }

    public function editors()
    {
        return $this->belongsTo(User::class, 'modifed_by', 'id')
      ->withDefault(['name' => '-']);
    }

    //observers
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (Auth()->check()) {
                $model->created_by = Auth()->user()->id;
                $model->modifed_by = Auth()->user()->id;
            }
        });

        self::updating(function ($model) {
            if (Auth()->check()) {
                $model->modifed_by = Auth()->user()->id;
            }
        });
    }
}
