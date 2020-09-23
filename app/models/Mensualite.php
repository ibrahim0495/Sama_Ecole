<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Mensualite extends Model
{
    protected $fillable = ['
    mensualite_id', 'mois_id', 'loginEleve', 'code', 'anneeScolaire_id', 'montant',
    'reliquat', 'type_paiement', 'isDeleted'];
}
