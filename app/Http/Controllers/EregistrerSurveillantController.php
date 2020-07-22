<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EregistrerSurveillantController extends Controller
{
    public function index()
    {
        return view('pages.directeur.ajouterSurveillant', compact('Surveillant'));
    }

    public function create()
    {

    }
    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
