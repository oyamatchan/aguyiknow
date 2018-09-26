<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','lastName','address','contactNumber', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
// every user can have only one profile picture
    public function profilePicture()
    {
        return $this->hasOne('App\Picture','user_fk','id');
    }

    // every user uploads more than 1 quote
    public function quote()
    {
        return $this->hasMany('App\Quote','user_fk','id');
    }
}
