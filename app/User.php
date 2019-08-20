<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\GravatarTrait;

class User extends Authenticatable
{
    use Notifiable;
    use GravatarTrait;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'role_id',
        'email',
        'password',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'active',
        'role_id',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'email_verified_at' => 'datetime',
    ];



    public function isAdmin() {
      return $this->role_id == 3;
    }
    public function isModerator() {
      return $this->role_id == 2;
    }


    public function roles() {
      return $this->belongsTo(Role::class, 'role_id', 'id');
    }


    //admin password
    public function setNewPasswordAttribute($value){
      if($value) {
        $this->attributes['password'] = bcrypt($value);
      }
    }

}
