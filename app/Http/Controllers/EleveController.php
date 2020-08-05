<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\AnneeScolaire;
use App\models\Classe;

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
        //Puisque la fonction lister classe c'est à direles élèves d'une classe
        //Il faut qu'on le crée une seule fois
        $nom_page = "classe_create";
        $profils = "comptable";
        return view('layouts.show_classe', compact('nom_page', 'profils'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->profils=='directeur'){
            $nom_page = "info_eleve";
            return view('pages.directeur.show_info_eleve', compact('nom_page'));
        }
        $profils = "comptable";
        if ($profils == "comptable") {
            $nom_page = "eleve_store";
            return view('pages.comptable.nos_eleves', compact('nom_page'));
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
