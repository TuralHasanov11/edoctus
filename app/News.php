<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';
    
    protected $fillable=['title', 'body', 'cover_image'];

    public function createdDate(){
        $date=date_create($this->created_at);
        return $date;
    }
}
