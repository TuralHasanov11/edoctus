<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'profile_image'
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

    use HasApiTokens, Notifiable;

    public function doctorInfo(){
        return $this->hasOne('App\DoctorInfo');
    }

    public function doctorType()
    {
        return $this->belongsToMany('App\DoctorType', 'doctor_info', 'user_id', 'doctor_type_id');
    }


    public function isAdmin(){
        return $this->role==='a';
    }

    public function posts(){
        $this->hasMany('App\Post');
    }

    public function comments(){
        $this->hasMany('App\Comment');
    }
}
