<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EleveAnneeClasse extends Model
{
    protected $fillable = ['loginEleve', 'anneeScolaire_id', 'classe_id'];
}
