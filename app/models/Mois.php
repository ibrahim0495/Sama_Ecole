<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Mois extends Model
{
    protected $fillable = ['mois_id', 'nom_mois'];


    //Appelez cette fonction pour générer la liste des mois de l'année
    public static function create_mois_annesco()
    {
        $liste_mois = [
            'Octobre', 'Novembre', 'Décembre', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai',
            'Juin', 'Juillet'
        ];
        for ($i=0; $i < 10; $i++) { 
            Mois::create([
                'nom_mois' => $liste_mois[$i]
            ]);
        }
    }
}
