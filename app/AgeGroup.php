<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    protected $fillable=['name'];

    protected $table='age_groups';

    // public function tests()
    // {
    //     return $this->belongsToMany('App\Test', 'user_test', 'age_group_id', 'test_id')
    //         ->as('user_test')
    //         ->withPivot('result')
    //         ->withTimestamps();
    // }
    
    public function userTest()
    {
        return $this->hasMany('App\UserTest');
    }

    // public function tests(){
    //     return $this->belongsToMany('App\Test', 'user_test', 'age_group_id', 'test_id');
    // }
}
