<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonneRequest;
use App\Http\Requests\PersonneUpdateRequest;
use App\models\Personne;
use App\models\Surveillant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use App\models\Classe;
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

        return view('pages.directeur.create_surveillant');
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

        if(!$surveillant){
            $personne = Personne::create([
                'login' => $login,
                'etablissement_id' => $etablissement_id,
                'prenom' => $prenom,
                'nom' => $nom,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'motDePasse' => bcrypt('Surveillant'),
                'profil' => 'Surveillant',
                'langue' => $request->langue,
                'email' => $request->email
            ]);


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

        $surveillants = Personne::where('profil', 'Surveillant')->where('etatPers', 1)->get();
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

        return redirect(route('directeur.surveillant.liste'));

    }

    public function store_classes(Request $request){
        $classes = $request->classes;
        $login = $request->loginSurveillant;

        //$delete = Classe::where('login', $login)->delete();

        /*foreach($classes as $classe){
            Classe::where('login', $login)->delete();
        }*/
        return "J'atends de voir! Je pense cette modification devrait se faire au niveau du module classe";
        


    }

}
