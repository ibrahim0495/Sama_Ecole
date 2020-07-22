<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    use AuthenticatesUsers;

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
            session()->flash('erreur', 'Veuillez revoir vos parametres de connexion, elle a echoue!');
            return redirect()->route('login');
        } */
    }
}
