<?php

namespace App\Http\Controllers;

use App\models\Classe;
use App\models\Eleve;
use App\models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function list_eleve_annee(){
        $anneeScolaire= DB::table('anneeScolaires')
                        ->where('isDeleted',0)
                        ->select()
                        ->get();
        $nomClasse= DB::table('classes')
                        ->where('isDeleted',0)
                        ->get();

        return view('pages.directeur.show_annees_classes', compact('anneeScolaire','nomClasse'));
    }
    public function list_eleve(Request $request)
    {
        $nom_classe = Str::afterLast($request->classe, '::');
        $classe_id = Str::beforeLast($request->classe, '::');

        $nom_annee_sco = Str::afterLast($request->annee, '::');
        $anneeScolaire_id= Str::beforeLast($request->annee, '::');

        $this->validate($request, [
            'classe'=> 'required',
            'annee'=> 'required'
        ]);

        $liste_classe = Personne::liste_des_eleves_classe_annesco($anneeScolaire_id, $classe_id);

        $nom_page = "info_eleve";
        return view(
            'pages.directeur.show_info_eleve', 
            compact('nom_page','liste_classe', 'nom_classe', 'nom_annee_sco'));
    }

    public function show_Det_eleve(String $login)
    {

        $eleve = Eleve::info_eleve($login);

        $nomClasse = Classe::orderBy('nom')
                        ->where('isDeleted',0)
                        ->get();
        $anneeScolaire = DB::table('anneeScolaires')
                        ->where('isDeleted', 0)
                        ->get();

        $parent = Personne::infos_parent($eleve->login_parent, $login);

        $infos_enfant = Eleve::login_enfants_one_parent($parent->login);

        $nombre_enfants = count($infos_enfant);

        return view('pages.directeur.show_eleve ', 
        compact('eleve','nomClasse','anneeScolaire', 'parent', 'nombre_enfants', 'infos_enfant'));
    }

}
