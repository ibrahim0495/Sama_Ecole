<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EregistrerMatiereController extends Controller
{
    public function index()
    {
        return view('pages.directeur.ajouterMatiere', compact('Matiere'));
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
