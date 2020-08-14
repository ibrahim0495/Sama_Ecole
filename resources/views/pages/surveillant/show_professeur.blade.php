@extends('pages.surveillant.master_surveillant', ['title' => 'Enregistrement Professeur'])

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Accueil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('surveillant.professeur.liste')}}">Professeur</a></li>
        <li class="breadcrumb-item active" aria-current="page">Surveillant/ professeur {{$professeur->login}}</li>
        </ol>
    </nav>
@endsection
@section('contenu_page')
<div class="card mb-12">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Modification du Surveillant : {{$professeur->login}}</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <form method="POST" action="{{ route('professeur.update', $professeur->login) }}">
            @method('PUT')
            @include('layouts.show_personnel', ['personne' => $professeur]);
            <div class="col-md-4">
                <a class="btn btn-outline-danger btn-lg btn-block" href="{{route('surveillant.professeur.liste')}}">
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