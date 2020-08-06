<?php

namespace App\Http\Controllers;

use App\models\Etablissement;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        return redirect()->route('etablissement.create');
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
        $this->validate($request, [
            'nom'=> 'required',
            'telephone'=> 'required',
            'email' => 'required',
            'adresse'=> 'required'
        ]);
        $etablissement= Etablissement::find($id);
        Etablissement::where('etablissement_id', $id)
                        ->update([
                            'nom'=> $request->nom,
                            'telephone'=> $request->telephone,
                            'email'=> $request->email,
                            'adresse'=> $request->adresse
                        ]);
        session()->flash('message', "La modification s'est effectuee avec succes!");
        return redirect()->route('directeur.index');
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

    public function lister_etablissement()
    {
        $etablissement= Etablissement::all();

        return view('pages.directeur.show_etablissement', compact('etablissement'));
    }
}
