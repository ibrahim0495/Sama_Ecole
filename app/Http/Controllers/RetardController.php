<?php

namespace App\Http\Controllers;

use App\models\Retard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retard = Retard::get();
        return view('pages.surveillant.show_retard',compact('retard',$retard));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_code = DB::select('select code from eleves');

        return view('pages.surveillant.create_retard',compact('list_code',$list_code));
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
            'duree_retard'=> 'required',

        ]);

        $loginEleve= DB::table('eleves')->where('code','=',$request->code)->select('loginEleve')->first();
        $login= $loginEleve->loginEleve;
        $retard= Retard::create([
            'loginEleve'=> $login,
            'code'=> $request->code,
            'duree_retard'=> $request->duree_retard,
        ]);

        $request->session()->flash('notification.type','alert-success');
        $request->session()->flash('notification.message', " Enregistrement effectué avec succés!");
         return redirect()->route('retard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $retard= Retard::where('code',$id)->get();

        return view('pages.surveillant.update_retard',compact('retard',$retard));
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
            'duree_retard'=> 'required',
        ]);
        $absence = Retard::where('code', '=', $id)->first();
        $newData = [];
        $error = false;

        if (isset($request->duree_retard)) {

                $newData['duree_retard'] = $request->duree_retard;

        }
        if (!$error && $absence) {
            $affected = DB::table('retards')
              ->where('code', $id)
              ->update($newData);

            $request->session()->flash('notification.type','alert-success');
            $request->session()->flash('notification.message', " Modification effectuée avec succés!");
            return redirect()->route('retard.index');
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
        //
    }
}
