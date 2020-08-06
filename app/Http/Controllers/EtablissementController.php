<?php

namespace App\Http\Controllers;

use App\models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etablissement= Etablissement::orderBy('nom', 'desc')->get();

        return view('pages.directeur.show_etablissement', compact('etablissement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.directeur.create_Etablissement');
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
            'nom'=> 'required',
            'telephone'=> 'required',
            'email' => 'required',
            'adresse'=> 'required'
        ]);

        $etablissement= Etablissement::create([
            'nom'=> $request->nom,
            'telephone'=> $request->telephone,
            'email'=> $request->email,
            'adresse'=> $request->adresse
        ]);

        session()->flash('Etablissement enregistré avec succès');
        return redirect()->route('etablissement.index');
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
        $etablissement = Etablissement::where('etablissement_id', '=', $id)->first();
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


        if (!$error && $etablissement) {
            //$etablissement->update($newData);
            $affected = DB::table('etablissements')
              ->where('etablissement_id', $id)
              ->update($newData);
            session()->flash('message', "La modification s'est effectuée avec succes!");
            return redirect()->route('etablissement.index');
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
}
