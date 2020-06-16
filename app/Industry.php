<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    public function sectors(){
        return $this->hasMany('App\Sector');
    }

    public function commodities(){
        return $this->hasManyThrough('App\Commodity','App\User');
    }
}
