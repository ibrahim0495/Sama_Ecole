<?php

namespace App\Http\Controllers;

use App\models\Matiere;
use App\models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MatiereController extends Controller
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

        $matiere = Matiere::orderBy('nom_matiere', 'desc')->get();

        return view('pages.directeur.show_matiere', compact('matiere','nomClasse','anneeScolaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.directeur.create_Matiere');
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
            'langue'=> 'required'
        ]);
        $matiere = Matiere::create([
            'nom_matiere'=> $request->nom,
            'langue'=> $request->langue
        ]);

        session()->flash('Matière enregistrée avec succès');
        return redirect()->route('matiere.index');
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
        $matiere = Matiere::where('matiere_id', '=', $id)->first();
        $newData = [];
        $error = false;

        if (isset($request->nom)) {
            //Gestion de erreurs
            if (Str::length($request->nom) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier le nom");
            } else {
                $newData['nom_matiere'] = $request->nom;
            }

        }
        //Apres tu fais les autres gestion d'erreurs

        if (isset($request->langue)) {
            $newData['langue'] = $request->langue;
        }

        if (!$error && $matiere) {
            //$etablissement->update($newData);
            $affected = DB::table('matieres')
              ->where('matiere_id', $id)
              ->update($newData);
            session()->flash('message', "La modification s'est effectuée avec succes!");
            return redirect()->route('matiere.index');
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
        DB::table('matieres')
                ->where('matiere_id',$id)
                -> delete();

        session()->flash('message', "La suppression s'est effectuee avec succes");
        return redirect()->route('matiere.index');
    }
}
