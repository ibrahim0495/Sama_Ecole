<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\models\Personne;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
        'password' => 'required',
        'email' => 'required|email'
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
            session()->flash('erreur', 'Veuillez revoir vos parametres de connexion !');
            return redirect()->route('login');
        }
    }
}
