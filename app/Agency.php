<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class Agency extends Model
{
    use Approvable;
    public function generator(){
        return $this->hasMany('App\Generator');
    }

    public function technologies(){
        return $this->belongsToMany('App\Technology');
    }
}
