<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'email' => 'required'
        ]);
     /*   $personne = Personne::where('email',$request->login)->where('password', $request->password)->first();
        if(($personne != null) & ($personne->profil=='directeur')){
            session(['user'=> $personne]);
           // dd(session('user'));
            return redirect()->route('/dashboard');
        }
        else{
            session()->flash('erreur', 'Veuillez revoir vos parametres de connexion !');
            return redirect()->route('/loginme');
        } */
    }
}
