<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Construction extends Model
{
    protected $fillable = ['nom'];

    public function modeles(){
        return $this->hasMany('App\Models\Modele');
    }

    public function realisations(){
        return $this->hasMany('App\Models\Realisation');
    }
}
