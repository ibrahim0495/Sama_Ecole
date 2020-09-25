<?php

namespace App\Http\Controllers;

use App\models\Classe;
use App\models\EmploiDuTemps;
use Illuminate\Http\Request;

class EmploiDuTempsController extends Controller
{
    //Gestion Emploi du temps by @Ouzy012
    public function create_edt()
    {
        $liste_classe = Classe::orderBy('nom', 'asc')->get();
        return view('pages.surveillant.create_edt', compact('liste_classe'));
    }

    public function store_edt(Request $request)
    {
        $this->validate($request, [
            'classe_id' => 'required|exists:classes,classe_id'
        ]);

        return redirect()->route('edt.index', $request->classe_id);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $classe_id = $request->classe_id;
        $liste_heure = EmploiDuTemps::liste_heure();
        $liste_jour = EmploiDuTemps::liste_jour();
        $index = 1;
        //dd($liste_heure);
        
        return view('pages.surveillant.index_edt', compact('classe_id', 'liste_heure', 'liste_jour', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
