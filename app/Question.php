<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'percentage' ,'test_id', 'type'];

    public function test()
    {
        return $this->belongsTo('App\Test');
    }

}
