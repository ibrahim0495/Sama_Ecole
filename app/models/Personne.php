<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        $login = Str::of($prenom1)->replace(' ', '')."".Str::of($nom1)->replace(' ', '');
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

    public static function liste_des_eleves_classe_annesco($anneesco, $classe)
    {   
        $liste_classe = DB::table('personnes as p')
            ->join('eleves', 'eleves.loginEleve', '=', 'p.login')
            ->join('eleveAnneeClasse as eac', 'eac.loginEleve', '=', 'p.login')
            ->where([
                ['eac.anneeScolaire_id', $anneesco],
                ['eac.classe_id', $classe],
                ['p.etatPers', 1],
                ['p.isDeleted', 0]
            ])
            ->orderBy('p.nom', 'desc')
            ->get();

        return $liste_classe;
    }

    public static function infos_parent($login_parent, $loginEleve)
    {
        $parent = DB::table('personnes')
            ->join('eleves','eleves.login_parent', '=', 'personnes.login')
            ->where([
                ['eleves.login_parent', $login_parent],
                ['eleves.loginEleve', $loginEleve],
                ['personnes.isDeleted', 0]
            ])
            ->first();
        
        return $parent;
    }

    public static function create_personnel(
        $profils, $login, $etablissement_id, $prenom, $nom,$telephone, $adresse, $langue, $email
    )
    {
        Personne::create([
            'login' => $login,
            'etablissement_id' => $etablissement_id,
            'prenom' => $prenom,
            'nom' => $nom,
            'telephone' => $telephone,
            'adresse' => $adresse,
            'motDePasse' => bcrypt($profils),
            'profil' => $profils,
            'langue' => $langue,
            'email' => $email
        ]);
    }

}
