<?php

namespace App\Http\Controllers;

use App\models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalleClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salle= Salle::orderBy('nom_salle', 'desc')->get();
        return view('pages.directeur.show_salle', compact('salle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.directeur.create_SalleClasse');
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
            'capacite'=> 'required'
        ]);

        $salle= Salle::create([
            'nom_salle'=> $request->nom,
            'capacite'=> $request->capacite
        ]);

        session()->flash('Salle enregistrée avec succès');
        return redirect()->route('salle_classe.index');
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
        $salle = Salle::where('nom_salle', '=', $id)->first();
        $newData = [];
        $error = false;

        //Apres tu fais les autres gestion d'erreurs

        if (isset($request->capacite)) {
            $newData['capacite'] = $request->capacite;
        }

        if (!$error && $salle) {
            $affected = DB::table('salles')
              ->where('nom_salle', $id)
              ->update($newData);
            session()->flash('message', "La modification s'est effectuée avec succes!");
            return redirect()->route('salle_classe.index');
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
