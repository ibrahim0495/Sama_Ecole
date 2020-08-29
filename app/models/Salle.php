<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable =
    [
        'nom_salle','capacite','isDeleted'
    ];
}
