<?php

namespace App\Http\Controllers;

use App\models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnneeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anneeScolaire= DB::table('anneeScolaires')
                        ->where('isDeleted',0)
                        ->select()
                        ->get();
        return view('pages.directeur.show_annee_scolaire', compact('anneeScolaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.directeur.create_annee_scolaire');
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
            'nom'=> 'required|min:9|unique:anneeScolaires,nom_anneesco',
        ]);

        $splitAnnee = explode('-', $request->nom, 2);
        $first_annee = (int)$splitAnnee[0];
        $last_annee= (int)$splitAnnee[1];
        if(($first_annee==$last_annee) || ($first_annee>$last_annee)){
            $request->session()->flash('notification.type','alert-danger');

            $request->session()->flash('notification.message', "veuillez vérifier l'année saisie !");
            return redirect()->back()->withInput();
        }


        $anneeScolaire= DB::table('anneeScolaires')
                        ->insert([
                            'nom_anneesco'=> $request->nom
                        ]);
                        $request->session()->flash('notification.type','alert-success');
                        $request->session()->flash('notification.message', " Enregistrement effectuée avec succés!");
        return redirect()->route('annee-scolaire.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anneeScolaire= DB::table('anneeScolaires')
                        ->select()
                        ->where('anneeScolaire_id',$id)
                        ->where('isDeleted',0)
                        ->get();
        return view('pages.directeur.update_annee', compact('anneeScolaire'));
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
            'nom'=> 'required|min:9|unique:anneeScolaires,nom_anneesco',
        ]);
        $splitAnnee = explode('-', $request->nom, 2);
        $first_annee = (int)$splitAnnee[0];
        $last_annee= (int)$splitAnnee[1];
        if(($first_annee==$last_annee) || ($first_annee>$last_annee)){
            $request->session()->flash('notification.type','alert-danger');

            $request->session()->flash('notification.message', "veuillez vérifier l'année saisie !");
            return redirect()->back()->withInput();
        }

        $anneeScolaire = DB::table('anneeScolaires')
                            -> where('anneeScolaire_id', '=', $id)
                            ->first();
        $newData = [];
        $error = false;

        if (isset($request->nom)) {
            //Gestion de erreurs
            if (Str::length($request->nom) <= 2) {
                $error = true;
                session()->flash('message', "Vérifier le nom");
            } else {
                $newData['nom_anneesco'] = $request->nom;
            }

            if (!$error && $anneeScolaire) {
                //$etablissement->update($newData);
                $affected = DB::table('anneeScolaires')
                  ->where('anneeScolaire_id', $id)
                  ->update($newData);
                  $request->session()->flash('notification.type','alert-success');
                  $request->session()->flash('notification.message', " Modification effectuée avec succés!");
                return redirect()->route('annee-scolaire.index');
            }


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
        $affected = DB::table('anneeScolaires')
              ->where('anneeScolaire_id', $id)
              ->update($newData);

        session()->flash('message', "La suppression s'est effectuee avec succes");
        return redirect()->route('annee-scolaire.index');
    }

}
