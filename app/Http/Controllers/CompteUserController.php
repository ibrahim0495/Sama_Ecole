<?php

namespace App\Http\Controllers;

use App\models\Personne;
use Illuminate\Http\Request;

class CompteUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    function login_store(Request $request){

        $this->validate($request, [
            'password' => 'required',
            'email' => 'required'
        ]);
        $personne = Personne::where('email',$request->email)->where('motDePasse', $request->password)->first();
        if(($personne != null) && ($personne->profil=='directeur')){
            session(['user'=> $personne]);
            return view('pages.directeur.home');
        }
        else if(($personne != null) && ($personne->profil=='parent')){
            session(['user'=> $personne]);
            return view('pages.parent.master_par');
        }
        else{
            session()->flash('erreur', 'Veuillez revoir vos parametres de connexion, elle a echoue!');
            return redirect()->route('login');
        }
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
