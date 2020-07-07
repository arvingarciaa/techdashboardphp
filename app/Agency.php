<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    public function agency_type(){
        return $this->belongsTo('App\AgencyType');
    }

    public function generator(){
        return $this->hasMany('App\Generator');
    }

    public function technologies(){
        return $this->hasMany('App\Technology');
    }
}
