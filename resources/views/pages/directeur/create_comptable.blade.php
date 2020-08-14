@extends('pages.directeur.master_directeur', ['title' => ' | Enregistrement Comptable'])

@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Comptable</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item">
                <a href="{{ route('directeur.index') }}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.comptable.liste') }}">Comptable liste</a></li>
            <li class="breadcrumb-item active" aria-current="page">Enregistrer Comptable</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    
        
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Enregistrer un Comptable</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('comptable.store') }}">
                @include('layouts/add_personnel')
            </form>
        </div>
    </div>
@endsection
