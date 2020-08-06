<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable =
    [
        'loginEleve', 'code', 'classe_id', 'dateNaissance', 'lieuNaissance', 'sexe'
    ];
}
