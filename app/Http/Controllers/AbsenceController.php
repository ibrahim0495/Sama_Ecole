<?php

namespace App\Http\Controllers;

use App\models\Absence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absence = Absence::where('isDeleted',0)->where('justificatif',0)->get();
        return view('pages.surveillant.show_absence',compact('absence',$absence));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_code = DB::select('select code from eleves');

        return view('pages.surveillant.create_absence',compact('list_code',$list_code));
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
            'code'=> 'required',
            'duree_abs'=> 'required',
            'motif' => 'required',
        ]);

        $loginEleve= DB::table('eleves')->where('code','=',$request->code)->select('loginEleve')->first();
        $login= $loginEleve->loginEleve;
        $absence= Absence::create([
            'loginEleve'=> $login,
            'code'=> $request->code,
            'duree_abs'=> $request->duree_abs,
            'motif'=> $request->motif
        ]);

        $request->session()->flash('notification.type','alert-success');
        $request->session()->flash('notification.message', " Enregistrement effectué avec succés!");
         return redirect()->route('absence.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absence= Absence::where('code',$id)->get();

        return view('pages.surveillant.update_absence',compact('absence',$absence));
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
            'duree_abs'=> 'required',
            'motif' => 'required',
        ]);
        $absence = Absence::where('code', '=', $id)->first();
        $newData = [];
        $error = false;

        if (isset($request->duree_abs)) {

                $newData['duree_abs'] = $request->duree_abs;

        }
        if (isset($request->motif)) {

                $newData['motif'] = $request->motif;

        }
        if (isset($request->justificatif)) {
                if($request->justificatif=='on'){
                    $newData['justificatif'] = 1;
                }
                else{
                    $newData['justificatif'] = 0;
                }

                dd($request->justificatif);

        }
        if (!$error && $absence) {
            $affected = DB::table('absences')
              ->where('code', $id)
              ->update($newData);

            $request->session()->flash('notification.type','alert-success');
            $request->session()->flash('notification.message', " Modification effectuée avec succés!");
            return redirect()->route('absence.index');
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
        $affected = DB::table('absences')
              ->where('code', $id)
              ->update($newData);

        session()->flash('notification.type','alert-success');
        session()->flash('notification.message', " Suppression effectuée avec succés!");
        return redirect()->route('absence.index');
    }
}
