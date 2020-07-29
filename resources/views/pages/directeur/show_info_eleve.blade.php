@extends('pages.directeur.master_dir', ['title' => ' |Eleve'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('contenu_page')

<div class="container">
    <div class="container">
        <div class="card-header bg-transparent pb-5">
            <div class="btn-wrapper text-center">
            </div>
          </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Pénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Lieu de naissance</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>
        </div>
     </div>

@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection
