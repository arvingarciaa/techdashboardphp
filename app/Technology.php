<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Victorlap\Approvable\Approvable;

class Technology extends Model
{
    use Approvable;
    protected $table = 'technologies';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'significance', 'target_users', 'approved'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function patents(){
        return $this->hasMany('App\Patent');
    }

    public function r_d_results(){
        return $this->hasMany('App\RDResult');
    }

    public function utility_models(){
        return $this->hasMany('App\UtilityModel');
    }

    public function files(){
        return $this->hasMany('App\File');
    }

    public function industrial_designs(){
        return $this->hasMany('App\IndustrialDesign');
    }

    public function copyrights(){
        return $this->hasMany('App\Copyright');
    }

    public function trademarks(){
        return $this->hasMany('App\Trademark');
    }

    public function plant_variety_protections(){
        return $this->hasMany('App\PlantVarietyProtection');
    }

    public function applicability_industries(){
        return $this->belongsTo('App\ApplicabilityIndustry');
    }

    public function commodities(){
        return $this->belongsToMany('App\Commodity', 'commodity_technology');
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
