<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable =
    [
        'loginEleve', 'code', 'dateNaissance', 'lieuNaissance', 'sexe','login_parent'
    ];
}
