<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class societe extends Model
{
    protected $fillable = ['nom','logo','siege','date','description','mail','telephone'];
}
