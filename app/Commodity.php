<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    public function sector(){
        return $this->belongsTo('App\Sector');
    }

    public function technologies(){
        return $this->hasMany('App\Technology');
    }

}
    