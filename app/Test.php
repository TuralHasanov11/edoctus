<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['title', 'treshold'];

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function users()
    {
        return $this->belongsToMany('App\User',  'user_test', 'test_id', 'user_id')
            ->as('user_test')
            ->withPivot('result')
            ->withTimestamps();;
    }
}
