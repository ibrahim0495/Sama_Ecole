@extends('pages.directeur.master_directeur', ['title' => 'liste Comptable'])

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Comptable</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Directeur/Lister Comptables</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')

<!-- Table -->
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Comptable</h3>
                <br>
            <div class="row">
                <div class="col-md-10">
                <a class="btn btn-primary" href="{{ route('directeur.comptable.create') }}">Ajouter nouveau Comptable</a>
                </div>
                <div class="col-auto btn-group">
                    <button type="button" class="btn btn-sm btn-vimeo h-75" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$status}}
                    </button>
                    <button type="button" class="btn btn-lg btn-vimeo btn-sm dropdown-toggle h-75" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('directeur.comptable.liste') }}">Tout</a>
                        <a class="dropdown-item" href="{{route('directeur.comptable.listeActif') }}">Actif(s)</a>
                        <a class="dropdown-item" href="{{ route('directeur.comptable.listeInactif') }}">Inactif(s)</a>
                    </div>

                    
                </div>
                <div class="table-responsive py-4"> 
                    @include('layouts.table_users', ['personnes' => $comptables, 'user' => 'comptable', 'admin' => 'directeur'])
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection