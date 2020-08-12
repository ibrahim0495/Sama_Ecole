<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

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

    public static function generateLogin(String $nom, String $prenom, $length = 5) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $prenom = substr($prenom,0,2);
        $login = $nom."".$prenom;
        for ($i = 0; $i < $length; $i++) {
            $login .= $characters[rand(0, $charactersLength - 1)];
        }
        return $login;
    }

    

}
