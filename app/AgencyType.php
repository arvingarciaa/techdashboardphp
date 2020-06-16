<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgencyType extends Model
{
    public function agencies(){
        return $this->hasMany('App\Agency');
    }
}
