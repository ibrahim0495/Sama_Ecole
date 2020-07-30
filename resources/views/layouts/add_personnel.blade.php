@extends('pages.'.$profils.'.master_'.$profils.'', ['title' => ' | Enregistrer {{ $personnel }}'])

@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">{{ $personnel }}</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item">
                <a href="{{ route(''.$profils.'.index') }}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route(''.$profils.'.index') }}">{{ $profils }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Enregistrer {{ $personnel }}</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Enregistrer un {{ $personnel }}</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form method="POST" action="{{ route(''.$personnel.'.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h4 class="mb-0">Informations personnelles du {{ $personnel }}</h4>
                        </div>
                    </div>
                    {{-- Prénoms --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputPrénom">Prénom</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Saisir le(s) prénom(s)">
                            </div>
                        </div>
                    </div>

                    {{-- Nom --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputNom">Nom</label>
                             <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Saisir le nom">
                            </div>
                        </div>
                    </div>

                    {{-- Téléphone --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputTéléphone">Téléphone</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                </div>
                                <input class="form-control" placeholder="Numéro de téléphone" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputEmail">Email</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input class="form-control" placeholder="Email address" type="email" name="email">
                        </div>
                        </div>
                    </div>

                    {{-- Adresse --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputAdresse">Adresse</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" placeholder="Adresse" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection
