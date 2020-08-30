<?php

namespace App\Http\Controllers;

use App\models\Etablissement;
use App\models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomClasse= Classe::orderBy('nom')
                        ->where('isDeleted',1)
                        ->get();
        $anneeScolaire= DB::table('anneeScolaires')
                        ->where('isDeleted',1)
                        ->get();

        $etablissement= Etablissement::orderBy('nom', 'desc')
                        ->where('isDeleted',0)
                        ->get();

        return view('pages.directeur.show_etablissement', compact('etablissement','nomClasse','anneeScolaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.directeur.create_Etablissement');
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
            'nom'=> 'required|min:2|max:100',
            'telephone'=> 'digits:9|required|starts_with:30,33,70,75,76,77,78|numeric|unique:etablissements,telephone',
            'email' => 'required|email',
            'adresse'=> 'required|min:2|max:30',
            'acronyme'=>'nullable|min:2|max:9'
        ]);
        ($files = $request->file('logo'));
        $logo = NULL;
        if ($files !== null) {
            $destinationPath = public_path('logo/'); // upload path
            $logo = date('dmYHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $logo);
            $insert['image'] = "$logo";
        }
        $etablissement= Etablissement::create([
            'nom'=> $request->nom,
            'telephone'=> $request->telephone,
            'email'=> $request->email,
            'adresse'=> $request->adresse,
            'logo'=> $logo,
            'acronyme'=> $request->acronyme
        ]);
        session()->flash('Etablissement enregistré avec succès');
        return redirect()->route('etablissement.index');
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
                        ->where('isDeleted',1)
                        ->get();
        $anneeScolaire= DB::table('anneeScolaires')
                        ->where('isDeleted',1)
                        ->select()
                        ->get();

        $etablissement= Etablissement::where('etablissement_id',$id)
                                    ->where('isDeleted',1)
                                    ->get();

        return view('pages.directeur.update_Etablissement', compact('etablissement','nomClasse','anneeScolaire'));
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

        $this->validate($request, [
            'nom'=> 'required|min:2|max:100',
            'telephone'=> 'required|starts_with:30,33,70,75,76,77,78|numeric|digits:9|unique:etablissements,telephone',
            'email' => 'required|email',
            'adresse'=> 'required|min:2|max:30',
            'acronyme'=>'|min:2|max:9'
        ]);

        $etablissement = Etablissement::where('etablissement_id', '=', $id)->first();
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

        if (isset($request->adresse)) {
            //Gestion de erreurs
            if (Str::length($request->adresse) <= 4) {
                $error = true;
                session()->flash('message', "Vérifier l'adresse");
            } else {
                $newData['adresse'] = $request->adresse;
            }

        }

        if (isset($request->acronyme)) {
            //Gestion de erreurs
            if (Str::length($request->acronyme) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier l'acronyme");
            } else {
                $newData['acronyme'] = $request->acronyme;
            }

        }

        if ($request->file('logo')) {
            if($files = $request->file('logo')){
                $destinationPath = public_path('logo/'); // upload path
                $logo = date('dmYHis') . "." . $files->getClientOriginalExtension();

                $newData['logo'] = $logo;
            }
        }
        //Apres tu fais les autres gestion d'erreurs

        if (isset($request->telephone)) {
            $newData['telephone'] = $request->telephone;
        }

        if (isset($request->email)) {
            $newData['email'] = $request->email;
        }


        if (!$error && $etablissement) {
            //$etablissement->update($newData);
            $affected = DB::table('etablissements')
              ->where('etablissement_id', $id)
              ->update($newData);

            $files->move($destinationPath, $logo);
            $insert['image'] = "$logo";

            session()->flash('message', "La modification s'est effectuée avec succes!");
            return redirect()->route('etablissement.index');
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
        $newData['isDeleted'] = 0;
        $affected = DB::table('etablissements')
              ->where('etablissement_id', $id)
              ->update($newData);

        session()->flash('message', "La suppression s'est effectuee avec succes");
        return redirect()->route('etablissement.index');
    }
}
