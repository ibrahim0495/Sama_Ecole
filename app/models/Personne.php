<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Personne extends Model
{
    protected $table = 'personnes';

    protected $fillable =
    [
        'login', 'etablissement_id', 'prenom', 'nom', 'telephone', 'adresse',
        'motDePasse', 'nomImgPers', 'etatPers', 'profil', 'langue', 'email'
    ];


    public static function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function generateLogin(String $prenom, String $nom) {
        $length = 3;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $prenom1 = substr(Str::lower($prenom),0,3);
        $nom1 = substr(Str::lower($nom),0,2);
        $login = $prenom1."".$nom1;
        $date = substr(date('Y'), 2, 4);
        for ($i = 0; $i < $length; $i++) {
            $login .= $characters[rand(0, $charactersLength - 1)];
        }
        return $login .= $date;
    }

    public static function generateMatricule($sexe,$etablissement_id,$anneeNaissance)
    {
        if (Str::lower($sexe) == 'fille') {
            $sexe = 2;
        }else{
            $sexe = 1;
        }
        $code = $sexe.''.$etablissement_id.''.$anneeNaissance;
        $length = 4;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $date = substr(date('Y'), 2, 4);
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }
        return $code .= $date;
    }



}
