<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    protected $fillable = [
        'classe_id', 'matiere_id', 'nom_salle', 'jour', 'heureDeb', 'heureFin', 'isDeleted'
    ];

    public static function liste_heure()
    {
        $liste_heure = 
        [
            '08:00 - 09:00', '09:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00',
            '12:00 - 13:00', '13:00 - 14:00', '14:00 - 15:00', '15:00 -16:00', 
            '16:00 - 17:00', '17:00 - 18:00', '18:00 - 19:00'
        ];
        return $liste_heure;
    }

    public static function liste_jour()
    {
        $liste_jour = [
            'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'
        ];
        return $liste_jour;
    }

}
