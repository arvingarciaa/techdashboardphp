<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function commodities(){
        return $this->hasMany('App\Commodity');
    }

    public function industry(){
        return $this->belongsTo('App\Industry');
    }
}
