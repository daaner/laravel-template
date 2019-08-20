<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

// ======= Base model with SoftDeletes

class BaseModel extends BaseClearModel
{
    use SoftDeletes;

    //Global scopes
    public function scopeActive($query)
    {
        return $query->where('active', true)->where('deleted_at', null);
    }

    public function scopeDraft($query)
    {
        return $query->where('active', false)->where('deleted_at', null);
    }

    public function scopeDeleted($query)
    {
        return $query->whereNotNull('deleted_at');
    }
}
