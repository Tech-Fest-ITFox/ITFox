<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function category()
    {
       return $this->belongsTo('App\Category');
    }

    public function exercises()
    {
        return $this->hasMany('App\Exercise');
    }

    public function user()
    {
       return $this->belongsTo('App\User');
    }
}
