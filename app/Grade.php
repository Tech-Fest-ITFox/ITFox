<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

}
