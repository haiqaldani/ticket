<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'number_phone', 'address', 'about_us', 'twitter', 'facebook', 'instagram', 'slug', 'roles', 'status', 'profile_picture', 'cover', 'verification_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function verification_data(){
        return $this->hasOne(VerificationData::class, 'id', 'verification_id');
    }
    public function account(){
        return $this->hasOne(Account::class, 'user_id', 'id');
    }

    public function event(){
        return $this->hasMany(Event::class, 'user_id', 'id');
    }

    public function cart(){
        return $this->belongsTo( Cart::class, 'users_id', 'id');
    }
    
}
