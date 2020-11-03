<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class Industry extends Model
{
    use Approvable;
    public function sectors(){
        return $this->hasMany('App\Sector');
    }

    public function commodities(){
        return $this->hasManyThrough('App\Commodity','App\User');
    }
}
