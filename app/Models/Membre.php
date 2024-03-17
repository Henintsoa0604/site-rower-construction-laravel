<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    protected $fillable = ['identifiant','nomMembre','prenom','poste','descriptionMembre','imageMembre'];
}
