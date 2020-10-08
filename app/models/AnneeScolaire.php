<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnneeScolaire extends Model
{
    protected $fillable = ['anneeScolaire_id', 'nom_anneesco', 'isDeleted', 'enCours'];


    public static function liste_annee_sco()
    {
        $anneeScolaire = DB::table('anneeScolaires')
            ->where([
                ['isDeleted',0],
                ['enCours', 1]
            ])->get();
        
        return $anneeScolaire;
    }
}
