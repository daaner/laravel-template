<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Token extends Model
{

  protected $table = 'user_tokens';
  protected $primaryKey = 'api_token';
  public $timestamps = false;

  protected $fillable = [
      'user_id',
      'api_token',
      'sync_at',
      'last_ip',
      'sync_at',
  ];

  public function users() {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

}
