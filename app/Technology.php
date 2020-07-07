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

    public function patents(){
        return $this->hasMany('App\Patent');
    }

    public function utility_models(){
        return $this->hasMany('App\UtilityModel');
    }

    public function industrial_designs(){
        return $this->hasMany('App\IndustrialDesign');
    }

    public function copyrights(){
        return $this->hasMany('App\Copyright');
    }

    public function plant_variety_protections(){
        return $this->hasMany('App\PlantVarietyProtection');
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

    public function agencies(){
        return $this->belongsToMany('App\Agency');
    }

    public function generators(){
        return $this->belongsToMany('App\Generator');
    }

    public function potential_adopters(){
        return $this->belongsToMany('App\PotentialAdopter');
    }

    public function adopters(){
        return $this->belongsToMany('App\Adopter');
    }

}
