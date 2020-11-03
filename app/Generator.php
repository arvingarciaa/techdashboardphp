<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class Generator extends Model
{
    use Approvable;
    public function agency(){
        return $this->belongsTo('App\Agency');
    }

    public function technologies(){
        return $this->belongsToMany('App\Technology');
    }
}
