<?php

namespace App\Http\Controllers;

use App\models\Eleve;
use App\models\Mois;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayementController extends Controller
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
        $nom_page = "payement_create";
        return view('pages.comptable.payement', compact('nom_page'));
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
            'matricule' => 'required|exists:eleves,code'
        ]);

        $anneeScolaire = [];
        $anneeScolaire = DB::table('anneeScolaires')
                            ->where('isDeleted', '=', '0')
                            ->where('enCours', '=', '1')->first();

        $anneeScolaire_id = $anneeScolaire->anneeScolaire_id;
        $nom_annee_sco = $anneeScolaire->nom_anneesco;
        $nom_page = "calendier_payement";
        $etablissement = "Les Praticiens";

        //Tous les infos de l'eleve (classe, annee_sco, login)
        $info_eleve = DB::table('eleves')
            ->join('personnes', 'login', '=', 'eleves.loginEleve')
            ->join('eleveAnneeClasse', 'eleveAnneeClasse.loginEleve', '=', 'eleves.loginEleve')
            ->join('anneeScolaires', 'anneeScolaires.anneeScolaire_id', '=', 'eleveAnneeClasse.anneeScolaire_id')
            ->join('classes', 'classes.classe_id', '=', 'eleveAnneeClasse.classe_id')
            ->where([
                ['eleves.code', '=', $request->matricule],
                ['eleveAnneeClasse.anneeScolaire_id', '=', $anneeScolaire_id]
                ])
            ->get();
        
        //Liste des mois de l'annee
        $mois = DB::table('mois')
            ->join('mensualites', 'mensualites.mois_id', '=', 'mois.mois_id')
            ->where('mois.isDeleted', '=', 0)
            ->orderBy('mois.mois_id','asc')
            ->get();

        //dd($mois);

        //dd($info_eleve);
        //Infos sur la mensualité et l'inscription
        foreach ($info_eleve as $key ) {
            $classe_id = $key->classe_id;
            $inscription = $key->montant_inscription;
            $mensualite = $key->montant_mensuel;
        }
        return view('pages.comptable.info_eleve',
        compact(
            'nom_page', 'info_eleve', 'anneeScolaire_id', 'nom_annee_sco' , 'etablissement', 'mois',
            'mensualite',
        ));
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
