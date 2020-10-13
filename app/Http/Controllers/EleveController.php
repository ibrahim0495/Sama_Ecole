<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\AnneeScolaire;
use App\models\Classe;
use App\models\Eleve;
use App\models\Personne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nom_page = "eleve_create";
        $liste_annee_sco = AnneeScolaire::liste_annee_sco();

        $liste_classe = Classe::where('isDeleted', 0)->get();

        return view('pages.comptable.show_classe', compact('nom_page', 'liste_classe', 'liste_annee_sco'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nom_classe = Str::afterLast($request->classe_id, '::');
        $classe_id = Str::beforeLast($request->classe_id, '::');

        $nom_annee_sco = Str::afterLast($request->anneeScolaire_id, '::');
        $anneeScolaire_id = Str::beforeLast($request->anneeScolaire_id, '::');

        $this->validate($request, [
            'anneeScolaire_id' => 'required',
            'classe_id' => 'required'
        ]);

        $liste_classe = Personne::liste_des_eleves_classe_annesco($anneeScolaire_id, $classe_id);

        $nom_page = "info_eleve";
        return view(
            'pages.comptable.show_eleve',
            compact('nom_page','liste_classe', 'nom_classe', 'nom_annee_sco'));

    }

    public function generer_carte_scolaire($loginEleve)
    {
        $show = 'Bonjour';
        /* $pdf = PDF::loadView('pdf', compact('show'));

        return $pdf->download('disney.pdf'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eleve = Eleve::info_eleve($id);

        $nomClasse = Classe::orderBy('nom')
                        ->where('isDeleted',0)
                        ->get();
        $anneeScolaire = DB::table('anneeScolaires')
                        ->where('isDeleted', 0)
                        ->get();

        $parent = Personne::infos_parent($eleve->login_parent, $id);

        $infos_enfant = Eleve::login_enfants_one_parent($parent->login);

        $nombre_enfants = count($infos_enfant);

        return view('pages.comptable.show_info_eleve ',
        compact('eleve','nomClasse','anneeScolaire', 'parent', 'nombre_enfants', 'infos_enfant'));

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
