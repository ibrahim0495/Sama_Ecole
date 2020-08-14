<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonneRequest;
use App\models\Personne;
use App\models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{

    public function lister_professeur(){
        $professeurs = Personne::where('profil','Professeur')->get();

        $status = 'Tout';

        return view('pages.surveillant.index_professeur', compact('professeurs', 'status'));
    }
    public function lister_professeurs_actifs(){
        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur

        $professeurs = Personne::where('profil', 'Professeur')->where('etatPers', 1)->get();
        $status = 'Actif(s)';

        return view('pages.surveillant.index_professeur', compact('professeurs', 'status'));
    }

    public function lister_professeurs_inactifs(){
        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur

        $professeurs = Personne::where('profil', 'Professeur')->where('etatPers', 0)->get();

        $status = 'Inactif(s)';

        return view('pages.surveillant.index_professeur', compact('professeurs', 'status'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.professeur.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnel = "professeur";
        $profils = "surveillant";
        return view('pages.surveillant.create_professeur', compact('personnel', 'profils'));
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
        
        $password = $personne->generateRandomString(); //ceci genere le mot de passe par defaut

        $image = "avatarWin10.png";  // elle est l'avatar photo profils par defaut
        
        $etablissement_id = 1; //etablissement doit etre generer automatiquement d'apres le directeur connecter;

        $professeur = Personne::where('login', $login)->first();

        if(!$professeur){
            $personne = Personne::create([
                'login' => $login,
                'etablissement_id' => $etablissement_id,
                'prenom' => $prenom,
                'nom' => $nom,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'motDePasse' => $password,
                'nomImgPers' => $image,
                'etatPers' => 1,
                'profil' => 'Professeur',
                'langue' => $request->langue,
                'email' => $request->email
            ]);

            if($personne){
                Professeur::create([
                    'login' => $login
                ]);
            }
            
            $request->session()->flash('notification.type','alert-success');

            $request->session()->flash('notification.message', " L'enregistrement a été bien effectué");
            return redirect(route('surveillant.professeur.liste'));
        }
        else{
            $request->session()->flash('notification.type','alert-danger');

            $request->session()->flash('notification.message', " Il se peut que le login existe déjà, veuillez réessayer d'enregistrer une nouvelle fois !");
            return redirect()->back()->withInput();
        }
    }

    public function show_professeur(string $login){
        $professeur = Personne::where('profil','=','Professeur')->where('login','=',$login)->first();

        return view('pages.surveillant.show_professeur',compact('professeur'));
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
    public function update(PersonneRequest $request, string $login)
    {
        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        };
        Personne::where('login',$login)
                ->update([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'adresse' => $request->adresse,
                    'telephone' => $request->telephone,
                    'email' => $request->email,
                    'etatPers' => $status,
                ]);
        $request->session()->flash('notification.type','alert-success');

        $request->session()->flash('notification.message', " Le surveillant #$login a été bien modifié");

        return redirect(route('surveillant.professeur.liste'));
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

            session()->flash('notification.message', " Le Comptable a été supprimé avec succés !");
            return redirect(route('surveillant.professeur.liste'));
        }else{
            session()->flash('notification.type','alert-danger');

            session()->flash('notification.message', " Le Comptable n'a pas pu etre supprimé !");
            return redirect(route('surveillant.professeur.liste'));
        }
    }

    public function messages(){
        return view('pages.professeur.message');
    }

    public function post_classe(Request $request){
       return redirect()->route('professeurs.classes');
    }

    public function index_classe(){
        return view('pages.professeur.classes');
    }

}

