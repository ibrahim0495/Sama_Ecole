<?php

namespace App\Http\Controllers;

use App\models\AnneeScolaire;
use App\models\Classe;
use App\models\Eleve;
use App\models\EleveAnneeSco;
use App\models\Inscription;
use App\models\Personne;
use App\models\Paarent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class InscriptionController extends Controller
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
        $nom_page = "inscription_create";
        $liste_classe = Classe::where('isDeleted', 0)->orderBy('nom', 'desc')->get();
        $liste_annee_sco = DB::table('anneeScolaires')
                            ->where('isDeleted', '=', '0')
                            ->where('enCours', '=', '1')->get();
        return view('pages.comptable.inscription', compact('nom_page', 'liste_classe', 'liste_annee_sco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $montant_inscription = Str::afterLast($request->classe_id, '::');
        $classe_id = Str::beforeLast($request->classe_id, '::');
        $this->validate($request, [
            'classe_id' => 'required',
            'anneeScolaire_id' => 'required',
            'prenom' => 'required|min:2|max:50',
            'nom' => 'required|min:2|max:30',
            'dateNaissance' => 'required|date|before:'.date('m/d/Y'),
            'lieuNaissance' => 'required|min:2|max:30',
            'adresse' => 'required|min:2|max:30',
            'sexe' => 'required',
            'telephone' => 'nullable|starts_with:30,33,70,75,76,77,78|numeric|digits:9|unique:personnes',
            'montant' => 'required|numeric|lte:'.$montant_inscription,
            'type_parent' => 'required',
        ]);

        //Formatage des entrées
        //Eleves
        $prenom = Str::ucfirst($request->prenom);
        $nom = Str::upper($request->nom);
        $telephone = $request->telephone;
        $lieuNaissance = Str::ucfirst($request->lieuNaissance);
        $adresse = Str::ucfirst($request->adresse);
        $login_eleve = Personne::generateLogin($prenom, $nom);
        $matricule_eleve = Personne::generateMatricule($request->sexe,1, date('Y', strtotime($request->dateNaissance)));
        $dateNaissance = date('Y/m/d' , strtotime($request->dateNaissance));

        //Vérification si l'élève s'est déjà inscrit
        $info_eleve = DB::table('personnes')
                        ->join('eleves', 'personnes.login', '=', 'eleves.loginEleve')
                        ->join('eleveanneeclasse', 'eleveanneeclasse.loginEleve', '=', 'eleves.loginEleve')
                        ->where('prenom', '=', $prenom)
                        ->where('nom', '=', $nom)
                        ->where('dateNaissance', '=', $dateNaissance)
                        ->where('lieuNaissance', '=', $lieuNaissance)
                        ->where('adresse', '=', $adresse)
                        ->where('sexe', '=', $request->sexe)
                        ->where('classe_id', '=', $classe_id)
                        ->where('anneeScolaire_id', '=', $request->anneeScolaire_id)
                        ->count();

        if ($info_eleve > 0) {
            return redirect()
                    ->back()
                    ->with('error_info_eleve', 'Il semble que cet élève s\'est déjà incrit');
        }

        if ($request->type_parent == 'new') {
            //Inscription d'un élève avec un nouveau parent
            $validator = Validator::make($request->all(), [
                'prenom_parent' => 'required|min:2|max:50',
                'nom_parent' => 'required|min:2|max:30',
                'telephone_parent' => 'required|starts_with:30,33,70,75,76,77,78|numeric|digits:9|unique:personnes,telephone',
                'adresse_parent' => 'required|min:2|max:30',
            ])->validate();

            //Parent
            $prenom_parent = Str::ucfirst($request->prenom_parent);
            $nom_parent = Str::ucfirst($request->nom_parent);
            $telephone_parent = Str::of($request->telephone_parent)->trim();
            $adresse_parent = Str::ucfirst($request->adresse_parent);
            $login_parent = Personne::generateLogin($prenom_parent, $nom_parent);

            try {
                //Insertion dans la base
                //1- Enregistrement du  nouveau parent
                $new_parent = Personne::create([
                    'login' => $login_parent,
                    'etablissement_id' => 1,
                    'prenom' => $prenom_parent,
                    'nom' => $nom_parent,
                    'telephone' => $telephone_parent,
                    'adresse' => $adresse_parent,
                    'motDePasse' => bcrypt('parent'),
                    'profil' => 'Parent',
                    'langue' => 'FR'
                ]);
                if ($new_parent) {
                    //2- Enregistrement de l'élève
                    $new_eleve = Personne::create([
                        'login' => $login_eleve,
                        'etablissement_id' => 1,
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'telephone' => $telephone,
                        'adresse' => $adresse,
                        'motDePasse' => bcrypt('eleve'),
                        'profil' => 'Eleve',
                        'langue' => 'FR'
                    ]);
                        if ($new_eleve) {
                            $new_eleve_eleve = Eleve::create([
                                'loginEleve' => $login_eleve,
                                'code' => $matricule_eleve,
                                'dateNaissance' => $dateNaissance,
                                'lieuNaissance' => $lieuNaissance,
                                'sexe' => $request->sexe,
                                'login_parent' => $login_parent
                            ]);
                            if ($new_eleve_eleve) {
                                $eleveAnneScoClasse = DB::table('eleveanneeclasse')->insert([
                                    'loginEleve' => $login_eleve,
                                    'classe_id' => $classe_id,
                                    'anneeScolaire_id' =>$request->anneeScolaire_id
                                ]);
                                if ($eleveAnneScoClasse) {
                                    $reliquat = $montant_inscription - $request->montant;
                                    $inscription = Inscription::create([
                                        'loginEleve' => $login_eleve,
                                        'code' => $matricule_eleve,
                                        'anneeScolaire_id' => $request->anneeScolaire_id,
                                        'montant' => $request->montant,
                                        'reliquat' => $reliquat
                                    ]);
                                }
                                if ($inscription) {
                                    return redirect()
                                    ->route('comptable.index');
                                }
                            }
                    }
                } else {
                }
            } catch (\Throwable $th) {
                DB::table('personnes')->where('login', '=', $login_parent)->delete();
                DB::table('personnes')->where('login', '=', $login_eleve)->delete();
                return redirect()
                    ->back()
                    ->with('error_sql', 'Une erreur s\'est produite veuillez réessayer');
            }

        } else {
            $validator = Validator::make($request->all(), [
                'info_ancien_parent' => 'required'
            ]);

            //Vérification si l'info de l'ancien parent existe
            $info_old_parent = Personne::where('telephone', Str::of($request->info_ancien_parent))
                                ->orWhere('login', Str::of($request->info_ancien_parent))
                                ->select('login')
                                ->first();

            if ($info_old_parent == null) {
                session()->flash('erreur_old_parent','Erreur ancien parent');
                return redirect()
                        ->back()
                        ->with('error_info_anc_par', 'Information du parent incorrect');
            }else{
                $login_old_parent = $info_old_parent->login;
                //Inscription Eleve avec un ancien parent
                try {
                    $new_eleve_old = Personne::create([
                        'login' => $login_eleve,
                        'etablissement_id' => 1,
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'telephone' => $telephone,
                        'adresse' => $adresse,
                        'motDePasse' => bcrypt('eleve'),
                        'profil' => 'Eleve',
                        'langue' => 'FR'
                    ]);
                    if ($new_eleve_old) {
                        $new_eleve_eleves = Eleve::create([
                            'loginEleve' => $login_eleve,
                            'code' => $matricule_eleve,
                            'dateNaissance' => $dateNaissance,
                            'lieuNaissance' => $lieuNaissance,
                            'sexe' => $request->sexe,
                            'login_parent' => $login_old_parent
                        ]);
                        if ($new_eleve_eleves) {
                            $eleveAnneScos = DB::table('eleveanneeclasse')->insert([
                                'loginEleve' => $login_eleve,
                                'classe_id' => $classe_id,
                                'anneeScolaire_id' =>$request->anneeScolaire_id
                            ]);
                            if ($eleveAnneScos) {
                                $reliquat = $montant_inscription - $request->montant;
                                $inscriptions = Inscription::create([
                                    'loginEleve' => $login_eleve,
                                    'code' => $matricule_eleve,
                                    'anneeScolaire_id' => $request->anneeScolaire_id,
                                    'montant' => $request->montant,
                                    'reliquat' => $reliquat
                                ]);
                            }
                            if ($inscriptions) {
                                return redirect()
                                ->route('comptable.index');
                                //->with('error_info_eleve', 'Il semble que cet élève s\'est déjà incrit');
                            }
                        }
                    }
                } catch (\Throwable $th) {
                    DB::table('personnes')->where('login', '=', $login_eleve)->delete();
                    return redirect()
                    ->back()
                    ->with('error_sql', 'Une erreur s\'est produite veuillez réessayer');
                }
            }

        }


        //Formatage date
        //dd(date('d/m/Y' , strtotime($request->dateNaissance)));



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
