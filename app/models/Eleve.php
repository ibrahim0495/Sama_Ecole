<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Eleve extends Model
{
    protected $fillable =
    [
        'loginEleve', 'code', 'dateNaissance', 'lieuNaissance', 'sexe', 'login_parent'
    ];

    public static function info_eleve($login)
    {
        $eleve = DB::table('personnes')
            ->join('eleves', 'eleves.loginEleve', '=', 'personnes.login')
            ->where([
                ['login', '=', $login],
                ['isDeleted', 0]
            ])
            ->first();
        return $eleve;
    }

    public static function login_enfants_one_parent($login_parent)
    {
        $infos_enfant = DB::table('eleves')
            ->where('login_parent', $login_parent)
            ->select('loginEleve')
            ->get();

        return $infos_enfant;
    }
}
