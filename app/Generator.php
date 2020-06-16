<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generator extends Model
{
    public function agency(){
        return $this->belongsTo('App\Agency');
    }
}
