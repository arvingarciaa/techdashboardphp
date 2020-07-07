<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
    public function technology(){
        return $this->belongsTo('App\Technology');
    }

}
