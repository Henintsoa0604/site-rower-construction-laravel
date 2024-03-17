<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $fillable = ['dimension','chambre','toilette','salleDeBain','cuisineSepare','garage'];

    public function Modeles(){
        return $this->belongsTo('App\Models\Modele');
    }
}
