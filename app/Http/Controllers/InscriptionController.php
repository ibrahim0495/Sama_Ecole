<?php

namespace App\Http\Controllers;

use App\models\AnneeScolaire;
use App\models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class InscriptionController extends Controller
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
        $nom_page = "inscription_create";
        $liste_classe = Classe::orderBy('nom', 'desc')->get();
        $liste_annee_sco = DB::table('anneescolaires')->get();
        return view('pages.comptable.inscription', compact('nom_page', 'liste_classe', 'liste_annee_sco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $montant_inscription = Str::afterLast($request->classe_id, '::');
        $classe_id = Str::beforeLast($request->classe_id, '::');
        $this->validate($request, [
            'classe_id' => 'required',
            'anneeScolaire_id' => 'required',
            'prenom' => 'required|min:2|max:50',
            'nom' => 'required|min:2|max:30',
            'dateNaissance' => 'required|date|before:'.date('m/d/Y'),
            'lieuNaissance' => 'required|min:2|max:30',
            'adresse' => 'required|min:2|max:30',
            'sexe' => 'required',
            'telephone' => 'required|starts_with:30,33,70,75,76,77,78|numeric|digits:9|unique:personnes',
            'montant' => 'required|numeric|lte:'.$montant_inscription,
            'type_parent' => 'required',
        ]);

        if ($request->type_parent == 'new') {
            $validator = Validator::make($request->all(), [
                'prenom_parent' => 'required|min:2|max:50',
                'nom_parent' => 'required|min:2|max:30',
                'telephone_parent' => 'required|starts_with:30,33,70,75,76,77,78|numeric|digits:9|unique:personnes',
                'adresse_parent' => 'required|min:2|max:30',
            ])->validate();
        } else {
            $validator = Validator::make($request->all(), [
                'info_ancien_parent' => 'required'
            ]);
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
