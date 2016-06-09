<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
