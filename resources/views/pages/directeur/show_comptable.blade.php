@extends('pages.directeur.master_directeur', ['title' => ' |Comptable'])

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Comptable</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Directeur/Comptable {{$comptable->login}}</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="card mb-12">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Modification du Surveillant : {{$comptable->login}}</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <form method="POST" action="{{ route('comptable.update', $comptable->login) }}">
            @method('PUT')
            @include('layouts.show_personnel', ['personne' => $comptable]);
            <div class="col-md-4">
                <a class="btn btn-outline-danger btn-lg btn-block" href="{{route('directeur.comptable.liste')}}">
                    Annuler
                </a>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-success btn-lg btn-block">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection