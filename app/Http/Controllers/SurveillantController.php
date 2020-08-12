<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonneRequest;
use App\models\Personne;
use App\models\Surveillant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

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
        
        $password = $personne->generateRandomString(); //ceci genere le mot de passe par defaut

        $image = "avatarWin10.png";  // elle est l'avatar photo profils par defaut
        
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
                'motDePasse' => $password,
                'nomImgPers' => $image,
                'etatPers' => 1,
                'profil' => 'Surveillant',
                'langue' => 'fr',
                'email' => $request->email
            ]);

            if($personne){
                Surveillant::create([
                    'login' => $login
                ]);
            }
            
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
    public function update(String $surveillantActif, Request $request)
    {
        dd('djjdjd');
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

    public function lister_surveillant()
    {
        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur
        $surveillantsActifs = Personne::where('profil','=','Surveillant')->get();
        return view('pages.directeur.index_surveillant',compact('surveillantsActifs'));
    }

    public function show_surveillant(String $login)
    {
        
        $surveillantActif = Personne::where('profil','=','Surveillant')->where('login','=',$login)->first();

        return view('pages.directeur.show_surveillant ',compact('surveillantActif'));
    }

    public function update_surveillant(String $surveillantActif, PersonneRequest $request)
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

    public function destroy_surveillant(String $login)
    {
        $delete = Personne::where('login', $login)->delete();
        if($delete){
            session()->flash('notification.type','alert-success'); 

            session()->flash('notification.message', " Le surveillant a supprimé avec succés !");
            return redirect(route('directeur.surveillant.liste'));
        }else{
            session()->flash('notification.type','alert-danger');

            session()->flash('notification.message', " Le surveillant n'a pas pu etre supprimé !");
            return redirect(route('directeur.surveillant.liste'));
        }
       

    }
    
}
