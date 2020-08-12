<?php

namespace App\Http\Controllers;

use App\models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnneeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomClasse= Classe::orderBy('nom')->get();
        $anneeScolaire= DB::table('anneeScolaires')
                        ->select()
                        ->get();
        return view('pages.directeur.show_annee_scolaire', compact('anneeScolaire','nomClasse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.directeur.create_annee_scolaire');
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
        ]);

        $anneeScolaire= DB::table('anneeScolaires')
                        ->insert([
                            'nom_anneesco'=> $request->nom
                        ]);
        session()->flash('Annee scolaire enregistrée avec succès');
        return redirect()->route('annee-scolaire.index');
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
        $anneeScolaire = DB::table('anneeScolaires')
                            -> where('anneeScolaire_id', '=', $id)
                            ->first();
        $newData = [];
        $error = false;

        if (isset($request->nom)) {
            //Gestion de erreurs
            if (Str::length($request->nom) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier le nom");
            } else {
                $newData['nom_anneesco'] = $request->nom;
            }

            if (!$error && $anneeScolaire) {
                //$etablissement->update($newData);
                $affected = DB::table('anneeScolaires')
                  ->where('anneeScolaire_id', $id)
                  ->update($newData);
                session()->flash('message', "La modification s'est effectuée avec succes!");
                return redirect()->route('annee-scolaire.index');
            }


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
        DB::table('anneeScolaires')
                ->where('anneeScolaire_id',$id)
                -> delete();

        session()->flash('message', "La suppression s'est effectuee avec succes");
        return redirect()->route('annee-scolaire.index');
    }

}
