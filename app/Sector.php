<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class Sector extends Model
{
    use Approvable;
    public function commodities(){
        return $this->hasMany('App\Commodity');
    }

    public function industry(){
        return $this->belongsTo('App\Industry');
    }
}
