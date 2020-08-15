<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\AnneeScolaire;
use App\models\Classe;
use App\models\Eleve;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Puisque la fonction lister classe c'est à dire les élèves d'une classe
        //Il faut qu'on le crée une seule fois
        $nom_page = "eleve_create";
        $profils = "Surveillant";
        $liste_classe = Classe::orderBy('nom', 'desc')->get();
        $liste_annee_sco = DB::table('anneescolaires')->get();
        return view('layouts.show_classe', compact('nom_page','profils', 'liste_classe', 'liste_annee_sco'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'anneeScolaire_id' => 'required',
            'classe_id' => 'required'
        ]);

        $nom_classe = Str::afterLast($request->classe_id, '::');
        $classe_id = Str::beforeLast($request->classe_id, '::');

        $nom_annee_sco = Str::afterLast($request->anneeScolaire_id, '::');
        $anneeScolaire_id = Str::beforeLast($request->anneeScolaire_id, '::');
        $liste_eleve = DB::table('eleves')
            ->join('personnes', 'personnes.login', '=', 'eleves.loginEleve')
            ->join('eleveanneescos', 'eleveanneescos.loginEleve', '=', 'eleves.loginEleve')
            ->where('eleveanneescos.anneeScolaire_id', '=', $anneeScolaire_id)
            ->where('eleves.classe_id', '=', $classe_id)
            ->orderBy('nom', 'asc')
            ->get();
        //La variable $profils va récupérer le profils de l'utilisateur connecter
        //Pour le momment on le définit manuellement car la connexion n'est pas encore faite
        $profils = "Surveillant";
        if($profils === 'directeur'){
            $nom_page = "info_eleve";
            return view('pages.directeur.show_info_eleve', compact('nom_page'));
        }else if ($profils === "Comptable") {
            $nom_page = "eleve_store";
            return view('pages.comptable.nos_eleves', compact('nom_page'));
        }elseif ($profils === 'Surveillant') {
            $nom_page = "eleve_store";
            return view('pages.surveillant.show_eleve', compact('profils','nom_page', 'liste_eleve', 'nom_classe', 'nom_annee_sco'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
