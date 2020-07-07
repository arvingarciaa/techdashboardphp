<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    public function adopter_type(){
        return $this->belongsTo('App\AdopterType');
    }
    
    public function technologies(){
        return $this->hasMany('App\Technology');
    }
}
