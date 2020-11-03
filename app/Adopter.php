<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class Adopter extends Model
{
    use Approvable;
    public function adopter_type(){
        return $this->belongsTo('App\AdopterType');
    }
    
    public function technologies(){
        return $this->belongsToMany('App\Technology');
    }
}
