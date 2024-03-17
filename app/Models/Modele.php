<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    protected $fillable = ['nomModele','montantDeOperation','descriptionModele','imageIllustration','construction_id'];

    public function Type_Constructions(){
        return $this->belongsTo('App\Models\Type_Construction');
    }

    public function Distributions(){
        return $this->hasMany('App\Models\Modele');
    }
}
