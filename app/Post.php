<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function createdDate(){
        $date=date_create($this->created_at);
        return $date;
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
