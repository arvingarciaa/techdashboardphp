<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class AdopterType extends Model
{
    use Approvable;
    public function adopters(){
        return $this->hasMany('App\Adopter');
    }

    public function potentialAdopters(){
        return $this->hasMany('App\PotentialAdopter');
    }
}
