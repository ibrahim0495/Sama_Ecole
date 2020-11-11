<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonneRequest;
use App\Http\Requests\PersonneUpdateRequest;
use App\models\AnneeScolaire;
use App\models\Personne;
use App\models\Surveillant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use App\models\Classe;
use App\models\Eleve;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SurveillantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.surveillant.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profils = "Surveillant";
        return view('pages.directeur.create_surveillant', compact('profils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonneRequest $request)
    {
        $prenom = $request->prenom;
        $nom = $request->nom;
        $personne = new Personne();

        $login =  $personne->generateLogin($nom,$prenom); // le login est generer automatique d'apres son prenom nom;

        $etablissement_id = 1; //etablissement doit etre generer automatiquement d'apres le directeur connecter;

        $surveillant = Personne::where('login', $login)->first();

        $profils = "Surveillant";

        if(!$surveillant){
            $personne->create_personnel(
                $profils, $login, $etablissement_id, $prenom, $nom, $request->telephone, $request->adresse,
                $request->langue, $request->email
            );


            $request->session()->flash('notification.type','alert-success');

            $request->session()->flash('notification.message', " L'enregistrement a été bien effectué");
            return redirect(route('directeur.surveillant.liste'));
        }
        else{
            $request->session()->flash('notification.type','alert-danger');

            $request->session()->flash('notification.message', " Il se peut que le login existe déjà, veuillez réessayer d'enregistrer une nouvelle fois !");
            return redirect()->back()->withInput();
        }

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
    public function update(String $id, Request $request)
    {
        // code Datte
        $surveillant = Personne::where('login', '=', $id)->first();
        $newData = [];
        $error = false;

        if($request->action=='desactiver'){
            $newData['etatPers']=0;
            $affected = DB::table('personnes')
            ->where('login', $id)
            ->update($newData);
          session()->flash('message', "La modification s'est effectuée avec succes!");
          return redirect()->route('surveillant.liste');

        }

        if (isset($request->nom)) {
            //Gestion de erreurs
            if (Str::length($request->nom) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier le nom");
            } else {
                $newData['nom'] = $request->nom;
            }

        }
        if (isset($request->prenom)) {
            //Gestion de erreurs
            if (Str::length($request->prenom) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier le prenom");
            } else {
                $newData['prenom'] = $request->prenom;
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


        if (!$error && $surveillant) {
            $affected = DB::table('personnes')
              ->where('login', $id)
              ->update($newData);
            session()->flash('message', "La modification s'est effectuée avec succes!");
            return redirect()->route('surveillant.liste');
        }

        // fin code datte
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $login)
    {
        $delete = Personne::where('login', $login)->delete();
        if($delete){
            session()->flash('notification.type','alert-success');

            session()->flash('notification.message', " Le surveillant a été supprimé avec succés !");
            return redirect(route('directeur.surveillant.liste'));
        }else{
            session()->flash('notification.type','alert-danger');

            session()->flash('notification.message', " Le surveillant n'a pas pu etre supprimé !");
            return redirect(route('directeur.surveillant.liste'));
        }


    }

    public function lister_surveillant()
    {
        // liste des classes et des annees pour le menu directeur
        $nomClasse= Classe::orderBy('nom')->get();
        $anneeScolaire= DB::table('anneeScolaires')
                        ->select()
                        ->get();

        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur
        $surveillants = Personne::where('profil','=','Surveillant')->get();
        $status = 'Tout';
        return view('pages.directeur.index_surveillant',compact('surveillants', 'status'));

    }

    public function lister_surveillants_actifs(){
        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur

        $surveillants = Personne::where('profil', 'Surveillant')->where('etatPers', 1)->where('isDeleted',0)->get();
        $status = 'Actif(s)';

        return view('pages.directeur.index_surveillant',compact('surveillants', 'status'));
    }

    public function lister_surveillants_inactifs(){
        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur

        $surveillants = Personne::where('profil', 'Surveillant')->where('etatPers', 0)->get();

        $status = 'Inactif(s)';

        return view('pages.directeur.index_surveillant',compact('surveillants', 'status'));
    }

    public function show_surveillant(String $login)
    {

        $surveillantActif = Personne::where('profil','=','Surveillant')->where('login','=',$login)->first();

        //Ce liste de classes necessite aussi l'etablissement_id
        $classes = Classe::all();
        $classes_surveillant = Classe::where('login_surveillant', $login)->get();
        return view('pages.directeur.show_surveillant ',compact('surveillantActif', 'classes', 'classes_surveillant'));
    }

    public function update_surveillant(String $surveillantActif, PersonneUpdateRequest $request)
    {
        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        };
        Personne::where('login',$surveillantActif)
                ->update([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'adresse' => $request->adresse,
                    'telephone' => $request->telephone,
                    'email' => $request->email,
                    'etatPers' => $status,
                ]);
        $request->session()->flash('notification.type','alert-success');

        $request->session()->flash('notification.message', " Le surveillant #$surveillantActif a été bien modifié");

        return redirect()->route('directeur.surveillant.liste');

    }

    public function store_classes(Request $request){
        $classes = $request->classes;
        $login = $request->loginSurveillant;
        if($classes){
            foreach($classes as $classe){
                $update = Classe::where('nom', $classe)->update(['login_surveillant'=> $login]);

            }
            if($update){
                $request->session()->flash('notification.type','alert-success');

                $request->session()->flash('notification.message', " Le surveillant #$login a été bien modifié");

            }
        }

        return redirect(route('directeur.surveillant.liste'));



    }
    public function list_eleve_annee(){
        $anneeScolaire = AnneeScolaire::liste_annee_sco();

        $nomClasse = Classe::where('isDeleted', 0)->get();

        return view('pages.surveillant.show_annee_classe', compact('anneeScolaire','nomClasse'));
    }

    public function list_eleve(Request $request){

        $noteDevoir= DB::table('personnes')
                            ->join('eleves','eleves.loginEleve','=','personnes.login')
                            ->join('devoirs','eleves.loginEleve','=','devoirs.loginEleve')
                            ->join('eleveAnneeClasse','devoirs.loginEleve','=','eleveAnneeClasse.loginEleve')
                            ->join('anneeScolaires','anneeScolaires.anneeScolaire_id','=','eleveAnneeClasse.anneeScolaire_id')
                            ->join('classes','classes.classe_id','=','eleveAnneeClasse.classe_id')
                            ->join('matieres','matieres.matiere_id','=','devoirs.matiere_id')
                            ->where('classes.nom',$request->classe)
                            ->where('anneeScolaires.nom_anneesco',$request->annee)
                            ->select('personnes.prenom','personnes.nom','matieres.nom_matiere','devoirs.*')
                            ->get();

        $noteCompo= DB::table('personnes')
                            ->join('eleves','eleves.loginEleve','=','personnes.login')
                            ->join('compositions','eleves.loginEleve','=','compositions.loginEleve')
                            ->join('eleveAnneeClasse','compositions.loginEleve','=','eleveAnneeClasse.loginEleve')
                            ->join('anneeScolaires','anneeScolaires.anneeScolaire_id','=','eleveAnneeClasse.anneeScolaire_id')
                            ->join('classes','classes.classe_id','=','eleveAnneeClasse.classe_id')
                            ->join('matieres','matieres.matiere_id','=','compositions.matiere_id')
                            ->where('classes.nom',$request->classe)
                            ->where('anneeScolaires.nom_anneesco',$request->annee)
                            ->select('personnes.prenom','personnes.nom','matieres.nom_matiere','compositions.*')
                            ->get();
        $classe= $request->classe;
        $annee= $request->annee;

        return view('pages.surveillant.show_notes_eleves',compact('noteDevoir','noteCompo','classe','annee'));
    }

    public function show_eleve_annee(){
        $anneeScolaire = AnneeScolaire::liste_annee_sco();

        $nomClasse = Classe::where('isDeleted', 0)->get();

        return view('pages.surveillant.show_eleve_annee', compact('anneeScolaire','nomClasse'));
    }

    public function liste_eleve_classe(Request $request)
    {
        $nom_classe = Str::afterLast($request->classe, '::');
        $classe_id = Str::beforeLast($request->classe, '::');

        $nom_annee_sco = Str::afterLast($request->annee, '::');
        $anneeScolaire_id= Str::beforeLast($request->annee, '::');

        $this->validate($request, [
            'annee' => 'required',
            'classe' => 'required'
        ]);

        $liste_classe = Personne::liste_des_eleves_classe_annesco($anneeScolaire_id, $classe_id);

        $nom_page = "info_eleve";
        return view(
            'pages.surveillant.show_eleve', 
            compact('nom_page','liste_classe', 'nom_classe', 'nom_annee_sco'));
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

        return view('pages.surveillant.show_info_eleve ', 
        compact('eleve','nomClasse','anneeScolaire', 'parent', 'nombre_enfants', 'infos_enfant'));
    }
}
