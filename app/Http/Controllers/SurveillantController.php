<?php

namespace App\Http\Controllers;

use App\models\Directeur;
use App\models\Personne;
use App\models\Surveillant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SurveillantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.surveillant.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnel = "surveillant";
        $profils = "directeur";
        return view('layouts.add_personnel', compact('personnel', 'profils'));
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
            'prenom'=> 'required',
            'nom'=> 'required',
            'telephone'=> 'required',
            'email' => 'required','email',
            'adresse'=> 'required',
        ]);

        $directeur= DB::table('personnes')
                        ->join('directeurs','personnes.login','=','directeurs.login')
                        ->join('etablissements','personnes.etablissement_id','=','etablissements.etablissement_id')
                        ->select('etablissements.etablissement_id')
                        ->pluck('etablissement_id')
                        ->first();


        if($directeur){
            $personne= Personne::create([
                'login'=> $request->email,
                'etablissement_id'=> $directeur,
                'prenom'=> $request->prenom,
                'nom'=> $request->nom,
                'telephone'=> $request->telephone,
                'adresse'=> $request->adresse,
                'motDePasse'=> "1234",
                'profil'=> "surveillant",
                'langue' => $request->langue,
                'email'=> $request->email,
                'nomImgPers' => "image"
            ]);
        }

        if($personne){
            $surveillant= Surveillant::create([
                'login'=> $personne->login
            ]);
        }

        session()->flash('Surveillant enregistré avec succès');
        return redirect()->route('surveillant.liste');
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
        $surveillant = Personne::where('login', '=', $id)->first();
        $newData = [];
        $error = false;

        if (isset($request->nom)) {
            //Gestion de erreurs
            if (Str::length($request->nom) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier le nom");
            } else {
                $newData['nom'] = $request->nom;
            }

        }
        if (isset($request->prenom)) {
            //Gestion de erreurs
            if (Str::length($request->prenom) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier le prenom");
            } else {
                $newData['prenom'] = $request->prenom;
            }

        }

        //Apres tu fais les autres gestion d'erreurs

        if (isset($request->telephone)) {
            $newData['telephone'] = $request->telephone;
        }

        if (isset($request->email)) {
            $newData['email'] = $request->email;
        }

        if (isset($request->adresse)) {
            $newData['adresse'] = $request->adresse;
        }


        if (!$error && $surveillant) {
            $affected = DB::table('personnes')
              ->where('login', $id)
              ->update($newData);
            session()->flash('message', "La modification s'est effectuée avec succes!");
            return redirect()->route('surveillant.liste');
        }
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

    public function lister_surveillant()
    {
        $surveillant= DB::table('personnes')
                        ->join('surveillants','personnes.login','=','surveillants.login')
                        -> orderBy('nom', 'desc')
                        ->get();

        return view('pages.directeur.show_surveillant', compact('surveillant'));
    }

}
