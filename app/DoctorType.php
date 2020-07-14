<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorType extends Model
{
    protected $fillable = ['name'];

    protected $table='doctor_types';

    public function doctorInfo(){
        return $this->hasMany('App\DoctorInfo');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'doctor_info', 'doctor_type_id', 'user_id');
    }
}
