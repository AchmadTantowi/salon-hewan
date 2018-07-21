<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'customer_id', 'name', 'email', 'password','phone','address','role', 'verified', 'position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function testimoni()
    {
        return $this->hasOne('App\Testimoni', 'user_id');
    }

    public function confirmPayment()
    {
        return $this->hasOne('App\ConfirmPayment', 'user_id');
    }
    

    

    
}
