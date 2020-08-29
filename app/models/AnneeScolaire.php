<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    protected $fillable = ['anneeScolaire_id', 'nom_anneesco', 'isDeleted', 'enCours'];
}
