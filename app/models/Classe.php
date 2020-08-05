<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = ['classe_id', 'login_surveillant', 'nom', 'montant_inscription', 'montant_mensuel'];

    public function getClasse()
    {
        $liste_classe = Classe::orderBy('nom', 'desc')->get();
        return $liste_classe;
    }

}
