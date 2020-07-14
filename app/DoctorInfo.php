<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
    // Table Name
    protected $table='doctor_info';
    // Primary Key
    
    protected $fillable=array('user_id','doctor_type_id','bio');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function doctorType()
    {
        return $this->belongsTo('App\DoctorType');
    }
}
