<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class TechnologyCategory extends Model
{
    use Approvable;

    protected $fillable = ['name'];
    public function technologies(){
        return $this->belongsToMany('App\Technology');
    }
}
