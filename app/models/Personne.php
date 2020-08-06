<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $fillable =
    [
        'login', 'etablissement_id', 'prenom', 'nom', 'telephone', 'adresse',
        'motDePasse', 'nomImgPers', 'etatPers', 'profil', 'langue', 'email'
    ];
}
