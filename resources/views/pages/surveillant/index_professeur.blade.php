@extends('pages.surveillant.master_surveillant', ['title' => 'Liste professeur'])

@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Professeur</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item">
                <a href="{{ route('surveillant.index') }}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('surveillant.professeur.liste') }}">Professeur liste</a></li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Professeur</h3>
                <br>
            <div class="row">
                <div class="col-md-10">
                <a class="btn btn-primary" href="{{ route('surveillant.professeur.create') }}">Ajouter nouveau Professeur</a>
                </div>
                <div class="col-auto btn-group">
                    <button type="button" class="btn btn-sm btn-vimeo h-75" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$status}}
                    </button>
                    <button type="button" class="btn btn-lg btn-vimeo btn-sm dropdown-toggle h-75" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('surveillant.professeur.liste') }}">Tout</a>
                        <a class="dropdown-item" href="{{route('surveillant.professeur.listeActif') }}">Actif(s)</a>
                        <a class="dropdown-item" href="{{ route('surveillant.professeur.listeInactif') }}">Inactif(s)</a>
                    </div>

                    
                </div>
                <div class="table-responsive py-4"> 
                    @include('layouts.table_users', ['personnes' => $professeurs, 'user' => 'professeur','admin' => 'surveillant'])
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