<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function schools()
    {
        return $this->hasMany('App\School');
    }
}
