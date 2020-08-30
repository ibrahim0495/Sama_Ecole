<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonneRequest;
use App\models\Comptable;
use App\models\Personne;
use Illuminate\Http\Request;

class ComptableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nom_page = "comptable_index";
        return view('pages.comptable.dashboard', compact('nom_page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.directeur.create_comptable');
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

        $comptable = Personne::where('login', $login)->first();

        if(!$comptable){
            $personne = Personne::create([
                'login' => $login,
                'etablissement_id' => $etablissement_id,
                'prenom' => $prenom,
                'nom' => $nom,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'motDePasse' => bcrypt('Comptable'),
                'profil' => 'Comptable',
                'langue' => $request->langue,
                'email' => $request->email
            ]);



            $request->session()->flash('notification.type','alert-success');

            $request->session()->flash('notification.message', " L'enregistrement a été bien effectué");
            return redirect(route('directeur.comptable.liste'));
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

        return redirect(route('directeur.comptable.liste'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $login)
    {
        $delete = Personne::where('login', $login)->delete();
        if($delete){
            session()->flash('notification.type','alert-success');

            session()->flash('notification.message', " Le Comptable a été supprimé avec succés !");
            return redirect(route('directeur.comptable.liste'));
        }else{
            session()->flash('notification.type','alert-danger');

            session()->flash('notification.message', " Le Comptable n'a pas pu etre supprimé !");
            return redirect(route('directeur.comptable.liste'));
        }

    }

    public function lister_comptables(){
        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur

        $comptables = Personne::where('profil', 'Comptable')->get();
        $status = 'Tout';
        return view('pages.directeur.index_comptable', compact('comptables', 'status'));
    }

    public function lister_comptables_actifs(){
        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur

        $comptables = Personne::where('profil', 'Comptable')->where('etatPers', 1)->get();
        $status = 'Actif(s)';

        return view('pages.directeur.index_comptable', compact('comptables', 'status'));
    }

    public function lister_comptables_inactifs(){
        //devra etre afficher selon id_etablissement de l'ajouteur ctd le directeur

        $comptables = Personne::where('profil', 'Comptable')->where('etatPers', 0)->get();

        $status = 'Inactif(s)';

        return view('pages.directeur.index_comptable', compact('comptables', 'status'));
    }

    public function show_comptable(String $login){
        $comptable = Personne::where('profil','=','Comptable')->where('login','=',$login)->first();

        return view('pages.directeur.show_comptable ',compact('comptable'));
    }
}
