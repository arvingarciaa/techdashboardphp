<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdopterType extends Model
{
    public function adopters(){
        return $this->hasMany('App\Adopter');
    }

    public function potentialAdopters(){
        return $this->hasMany('App\PotentialAdopter');
    }
}
