<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $fillable = ['nomClient','prenomClient','emailClient','telephoneClient','message','status'];
}
