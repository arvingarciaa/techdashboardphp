<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProtectionType extends Model
{
    public function technologies(){
        return $this->hasMany('App\Technology');
    }
}
