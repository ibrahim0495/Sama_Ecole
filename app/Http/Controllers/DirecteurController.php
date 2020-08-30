<?php

namespace App\Http\Controllers;

use App\models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomClasse= Classe::orderBy('nom')
                            ->where('isDeleted',1)
                            ->get();
        $anneeScolaire= DB::table('anneeScolaires')
                        ->where('isDeleted',1)
                        ->select()
                        ->get();
        return view('pages.directeur.home', compact('anneeScolaire','nomClasse'));
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

    public function create_surveillant($id)
    {
        return view('pages.directeur.create_Surveillant');
    }

    public function list_eleve(Request $request)
    {
        $this->validate($request, [
            'classe'=> 'required',
            'annee'=> 'required'
        ]);

        $class =$request->classe;

        $list_eleve= DB::table('personnes')
                        ->join('eleves','personnes.login','=','eleves.loginEleve')
                        ->join('eleveAnneeClasse','eleveAnneeClasse.loginEleve','=','eleves.loginEleve')
                        ->join('classes','classes.classe_id','=','eleveAnneeClasse.classe_id')
                        ->join('eleveAnneeClasse','eleveAnneeClasse.anneeScolaire_id','=','anneeScolaires.anneeScolaire_id')
                        ->where('personnes.profil','eleve')
                        ->where('classes.nom', $request->classe)
                        ->where('anneeScolaires.nom_anneesco', $request->annee)
                        ->where('personnes.isDeleted',1)
                        ->where('classes.isDeleted',1)
                        ->select('personnes.*','eleves.*')
                        ->get();

        $nomClasse= Classe::orderBy('nom')
                            ->where('isDeleted',1)
                            ->get();
        $anneeScolaire= DB::table('anneeScolaires')
                                        ->where('isDeleted',1)
                                        ->select()
                                        ->get();
        $nom_page = "info_eleve";
        return view('pages.directeur.show_info_eleve', compact('nom_page','list_eleve','class','nomClasse','anneeScolaire'));
    }

    public function show_Det_eleve(String $login)
    {

        $eleve = DB::table('personnes')
                                ->join('eleves','eleves.loginEleve','=','personnes.login')
                                ->where('login','=',$login)
                                ->where('isDeleted',1)
                                ->select('personnes.*','eleves.*')
                                ->get();

        $nomClasse= Classe::orderBy('nom')
                        ->where('isDeleted',1)
                        ->get();
        $anneeScolaire= DB::table('anneeScolaires')
                        ->where('isDeleted',1)
                        ->select()
                        ->get();

        return view('pages.directeur.show_eleve ',compact('eleve','nomClasse','anneeScolaire'));
    }

}
