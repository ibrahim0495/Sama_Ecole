<?php

namespace App\Http\Controllers;

use App\models\Eleve;
use App\models\Mensualite;
use App\models\Mois;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PayementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $info_eleve = $request->info_eleve;
        return view('pages.comptable.info_eleve', compact('info_eleve'));
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
            ->select('*')
            ->where([
                ['eleves.code', '=', $request->matricule],
                ['eleveAnneeClasse.anneeScolaire_id', '=', $anneeScolaire_id]
                ])
            ->get();
        
        //Liste des mois de l'annee
        $mois = DB::table('mois')
            ->join('mensualites', 'mensualites.mois_id', '=', 'mois.mois_id')
            ->where([
                ['mois.isDeleted', '=', 0],
                ['mensualites.code', '=', $request->matricule],
                ['mensualites.anneeScolaire_id', '=', $anneeScolaire_id]
            ])
            ->orderBy('mois.mois_id','asc')
            ->get();
        //Infos sur la mensualité et l'inscription
        //dd($info_eleve);
        foreach ($info_eleve as $key ) {
            $code = $key->code;
            $loginEleve = $key->loginEleve;
            $classe_id = $key->classe_id;
            $inscription = $key->montant_inscription;
            $mensualite = $key->montant_mensuel;
        }
        return view('pages.comptable.info_eleve',
        compact(
            'nom_page', 'info_eleve', 'anneeScolaire_id', 'nom_annee_sco' , 'etablissement', 'mois',
            'mensualite', 'loginEleve', 'code'
        ));
    }

    public function effectuer_payement($mensualite_id, $mois_id, $login, $code, $anneesco, $montant)
    {
        return view('pages.comptable.payer_mensuel', 
        compact('mensualite_id','mois_id', 'login', 'code', 'anneesco', 'montant'));
    }

    public function payement_mensuel(Request $request)
    {
        $this->validate($request, [
            'montant' => 'required|numeric|lte:'.$request->mensualite,
            'login' => 'required|exists:mensualites,loginEleve',
            'code' => 'required|exists:mensualites,code',
            'anneesco' => 'required|exists:mensualites,anneeScolaire_id',
            'mensualite_id' => 'required|exists:mensualites,mensualite_id',
            'mois_id' => 'required|exists:mensualites,mois_id',
            'mensualite' => 'required'
        ]);
        if (Str::length($request->montant) <= 3) {
            return redirect()->back()->with('error_min_montant', 'Le montant saisi est trop petit');
        }
        else if ($request->montant <= 0) {
            return redirect()->back()->with('error_montant', 'Le montant ne peut être null ou négatif');
        } else {

            $newData = [];
            $reliquat = $request->mensualite - $request->montant;
            $newData['reliquat'] = $reliquat;
            $newData['montant'] = $request->montant;

            $payement = DB::table('mensualites')
            ->where('mensualite_id', '=', $request->mensualite_id)
            ->update($newData);
            
            return redirect()->route('payement.show', $request->code)
            ->with('success_payement', 'Le payement effectué avec succès');
            
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
            ->select('*')
            ->where([
                ['eleves.code', '=', $id],
                ['eleveAnneeClasse.anneeScolaire_id', '=', $anneeScolaire_id]
                ])
            ->get();
        
        //Liste des mois de l'annee
        $mois = DB::table('mois')
            ->join('mensualites', 'mensualites.mois_id', '=', 'mois.mois_id')
            ->where([
                ['mois.isDeleted', '=', 0],
                ['mensualites.code', '=', $id],
                ['mensualites.anneeScolaire_id', '=', $anneeScolaire_id]
            ])
            ->orderBy('mois.mois_id','asc')
            ->get();
        //Infos sur la mensualité et l'inscription
        //dd($info_eleve);
        foreach ($info_eleve as $key ) {
            $code = $key->code;
            $loginEleve = $key->loginEleve;
            $classe_id = $key->classe_id;
            $inscription = $key->montant_inscription;
            $mensualite = $key->montant_mensuel;
        }
        return view('pages.comptable.info_eleve',
        compact(
            'nom_page', 'info_eleve', 'anneeScolaire_id', 'nom_annee_sco' , 'etablissement', 'mois',
            'mensualite', 'loginEleve', 'code'
        ));
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
