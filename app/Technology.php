<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $table = 'technologies';
    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function commodities(){
        return $this->belongsToMany('App\Commodity');
    }

    public function protection_types(){
        return $this->belongsTo('App\ProtectionType');
    }

    public function technology_categories(){
        return $this->belongsToMany('App\TechnologyCategory');
    }
}
