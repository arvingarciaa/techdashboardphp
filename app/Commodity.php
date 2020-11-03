<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class Commodity extends Model
{
    use Approvable;
    public function sector(){
        return $this->belongsTo('App\Sector');
    }

    public function technologies(){
        return $this->belongsToMany('App\Technology', 'commodity_technology');
    }

}
    