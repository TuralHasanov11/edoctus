<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    protected $table='user_test';

    protected $fillable=['result','test_id','region_id','age_group_id'];

    public function test()
    {
        return $this->belongsTo('App\Test');
    }

    public function region()
    {
        return $this->belongsTo('App\Region','region_id');
    }

    public function ageGroup()
    {
        return $this->belongsTo('App\AgeGroup','age_group_id');
    }
}
