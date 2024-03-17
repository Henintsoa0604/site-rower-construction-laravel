<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{
    protected $fillable = ['nomRealisation',
                           'imageRealisation',
                           'montantRealisation',
                           'descriptionRealisation',
                           'societeColaborateur',
                           'maitreOuvrage',
                           'architecte',
                           'province',
                           'region',
                           'district',
                           'ville',
                           'type_id'
                        ];

    public function Types(){
        return $this->belongsTo('App\Models\Type_Construction');
    }

    public function Gallerie(){
        return $this->hasMany('App\Models\Gallery');
    }
}
