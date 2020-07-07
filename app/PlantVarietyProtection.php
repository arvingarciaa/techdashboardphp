<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantVarietyProtection extends Model
{
    public function technology(){
        return $this->belongsTo('App\Technology');
    }
}
