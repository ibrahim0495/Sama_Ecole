<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $fillable = ['etablissement_id','nom','telephone','email','adresse','logo','acronyme'];
}
