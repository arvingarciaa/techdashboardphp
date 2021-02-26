<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class ApplicabilityIndustry extends Model
{
    use Approvable;
    public function technologies(){
        return $this->belongsToMany('App\Technology');
    }
}
