<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable=['name'];

    
    // public function tests()
    // {
    //     return $this->belongsToMany('App\Test', 'user_test', 'region_id', 'test_id')
    //         ->as('user_test')
    //         ->withPivot('result')
    //         ->withTimestamps();
    // }

    
    public function userTest()
    {
        return $this->hasMany('App\UserTest');
    }

    // public function tests(){
    //     return $this->belongsToMany('App\Test', 'user_test', 'region_id', 'test_id');
    // }
}
