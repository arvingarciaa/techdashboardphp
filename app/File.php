<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['filename', 'filesize', 'category', 'filetype', 'technology_id']; 
    public function technology(){
        return $this->belongsTo('App\Technology');
    }
}
