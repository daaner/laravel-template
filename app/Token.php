<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'user_tokens';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'api_token',
        'last_ip',
        'login_at',
    ];

    protected $dates = [
        'login_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
