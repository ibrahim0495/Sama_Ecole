<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable =
    [
        'inscription_id', 'loginEleve', 'code', 'anneeScolaire_id', 'montant',
        'reliquat', 'type_paiement'
    ];
}
