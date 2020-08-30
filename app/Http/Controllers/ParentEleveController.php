<?php

namespace App\Http\Controllers;

use App\models\AnneeScolaire;
use App\models\Classe;
use App\models\Personne;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ParentEleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $classe= Classe::first();
       //  $anneeScolaire = AnneeScolaire::first();
        $eleve= DB::table('eleves')
                    ->join('parents','parents.login','=','eleves.login_parent')
                    ->join('personnes','personnes.login','=','eleves.loginEleve')
                    ->select('personnes.prenom','personnes.nom','personnes.adresse','personnes.telephone','eleves.loginEleve')
                    ->where('login_parent','lamine@gmail.com')
                    ->where('personnes.isDeleted',1)
                    ->get();


       return view('pages.parent.show_enfant',compact('eleve'));
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

    public function voir_note(Request $request)
    {
        $eleve = Personne::where('login', '=', $request->login)
                            ->where('isDeleted',1)
                            ->first();

        if($eleve){
            $noteDevoir=DB::table('eleves')
                    ->join('devoirs','devoirs.loginEleve','=','eleves.loginEleve')
                    ->join('matieres','matieres.matiere_id','=','devoirs.matiere_id')
                    ->where('eleves.loginEleve',$request->login)
                    ->select('matieres.nom_matiere','devoirs.note','devoirs.loginEleve','devoirs.semestre')
                    ->distinct()
                    ->get();

            $noteCompo=DB::table('eleves')
                    ->join('compositions','compositions.loginEleve','=','eleves.loginEleve')
                    ->join('matieres','matieres.matiere_id','=','compositions.matiere_id')
                    ->where('eleves.loginEleve',$request->login)
                    ->select('matieres.nom_matiere','compositions.note','compositions.loginEleve','compositions.semestre')
                    ->distinct()
                    ->get();

        }

        return view('pages.parent.show_noteEnfant',compact('noteDevoir','noteCompo'));
    }
}
