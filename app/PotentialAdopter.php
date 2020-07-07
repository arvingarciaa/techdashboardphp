<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PotentialAdopter extends Model
{
    public function adopter_type(){
        return $this->belongsTo('App\AdopterType');
    }

    public function technologies(){
        return $this->hasMany('App\Technology');
    }
}
