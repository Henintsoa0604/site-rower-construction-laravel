<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $fillable = ['gallery','realisation_id'];

    public function Realisations(){
        return $this->belongsTo('App\Models\Realisation');
    }
}
