<?php

namespace App\Http\Controllers;

use App\models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $classe= DB::table('classes')
                    ->join('personnes','personnes.login','=','classes.login_surveillant')
                    ->where('classes.isDeleted',0)
                    ->where('personnes.isDeleted',0)
                    ->select('classes.*','personnes.prenom','personnes.nom as nom_per')
                    ->get();

        return view('pages.directeur.show_classe',compact('classe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surveillant= DB::table('personnes')
                        ->where('profil','surveillant')
                        ->where('isDeleted',0)
                        ->select('login','prenom','nom')
                        ->orderBy('nom', 'asc')
                        ->get();

        return view('pages.directeur.create_Classe', compact('surveillant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=> 'required|unique:classes|min:2',
            'montant_inscription'=> 'required|numeric',
            'montant_mensuel'=> 'required|numeric|lt:'.$request->montant_inscription,
            'loginSurveillant'=> 'required'
        ]);

        $classe = Classe::create([
            'nom'=> $request->nom,
            'montant_inscription'=> $request->montant_inscription,
            'montant_mensuel'=> $request->montant_mensuel,
            'login_surveillant'=> $request->loginSurveillant
        ]);

        $request->session()->flash('notification.type','alert-success');
        $request->session()->flash('notification.message', " Enregistrement effectuée avec succés!");
        return redirect()->route('classe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nomClasse= Classe::orderBy('nom')
                            ->where('isDeleted',0)
                            ->get();
        $anneeScolaire= DB::table('anneeScolaires')
                        ->where('isDeleted',0)
                        ->select()
                        ->get();

        $surveillant= DB::table('personnes')
                        ->where('profil','surveillant')
                        ->where('isDeleted',0)
                        ->select('login','prenom','nom')
                        ->orderBy('nom', 'asc')
                        ->get();

        $classe= DB::table('classes')
                    ->join('personnes','personnes.login','=','classes.login_surveillant')
                    ->where('profil',"surveillant")
                    ->where('classe_id',$id)
                    ->where('classes.isDeleted',0)
                    ->select('classes.*','personnes.prenom','personnes.nom as nom_per')
                    ->get();

        return view("pages.directeur.update_Classe",compact('classe','nomClasse','anneeScolaire','surveillant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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
        $this->validate($request, [
            'nom'=> 'required|min:2',
            'montant_inscription'=> 'required|numeric',
            'montant_mensuel'=> 'required|numeric',
            'loginSurveillant'=> 'required'
        ]);
        if($request->montant_mensuel > $request->montant_inscription){
            $request->session()->flash('notification.type','alert-danger');

            $request->session()->flash('notification.message', " Le montant de l'inscription doit etre supérieur à celui de la mensualité !");
            return redirect()->back()->withInput();
        }

        $classe = Classe::where('classe_id', '=', $id)->first();
        $newData = [];
        $error = false;

        if (isset($request->nom)) {
            //Gestion de erreurs
            if (Str::length($request->nom) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier le nom");
            } else {
                $newData['nom'] = $request->nom;
            }

        }
        //Apres tu fais les autres gestion d'erreurs

        if (isset($request->montant_inscription)) {
            $newData['montant_inscription'] = $request->montant_inscription;
        }
        if (isset($request->montant_mensuel)) {
            $newData['montant_mensuel'] = $request->montant_mensuel;
        }
        if (isset($request->loginSurveillant)) {
            $newData['login_surveillant'] = $request->loginSurveillant;
        }

        if (!$error && $classe) {
            $affected = DB::table('classes')
              ->where('classe_id', $id)
              ->update($newData);
              $request->session()->flash('notification.type','alert-success');
              $request->session()->flash('notification.message', " Modification effectuée avec succés!");
            return redirect()->route('classe.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newData = [];
        $newData['isDeleted'] = 1;
        $affected = DB::table('classes')
              ->where('classe_id', $id)
              ->update($newData);

        session()->flash('message', "La suppression s'est effectuee avec succes");
        return redirect()->route('classe.index');
    }
}
