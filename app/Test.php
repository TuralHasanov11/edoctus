<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['title', 'treshold'];

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function userTest()
    {
        return $this->hasMany('App\UserTest');
    }

    // public function regions(){
    //     return $this->belongsToMany('App\Region', 'user_test', 'test_id', 'region_id');
    // }

    // public function ageGroups(){
    //     return $this->belongsToMany('App\AgeGroup', 'user_test', 'test_id', 'age_group_id');
    // }
}
