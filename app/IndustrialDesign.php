<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustrialDesign extends Model
{
    public function technology(){
        return $this->belongsTo('App\Technology');
    }
}
