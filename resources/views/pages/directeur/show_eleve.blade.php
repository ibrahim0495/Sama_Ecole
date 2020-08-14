@extends('pages.directeur.master_directeur', ['title' => ' |Eleve'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Elèves</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Directeur/Info_eleve</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="card mb-12">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Détails de l'élève </h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        @foreach ($eleve as $el)
        <form method="POST" action="#">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header">
                        <div class="row">
                        <h4 class="mb-0">Informations personnelles</h4>

                        </div>
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
                        <input type="text" value="{{$el->prenom}}" name="prenom" class="form-control" placeholder="Saisir le(s) prénom(s)" disabled>
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
                            <input type="text" name="nom" value="{{$el->nom}}" class="form-control" placeholder="Saisir le nom" disabled>
                        </div>
                    </div>
                </div>

                {{-- Date Naissance --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputPrénom">Date Naissance</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        <input type="text" value="{{$el->dateNaissance}}" name="dateNaissance" class="form-control" disabled>
                        </div>
                    </div>
                </div>

                {{-- Lieu Naissance --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputPrénom">Lieu Naissance</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                        <input type="text" value="{{$el->lieuNaissance}}" name="lieuNaissance" class="form-control" disabled>
                        </div>
                    </div>
                </div>

                {{-- sexe --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputPrénom">Sexe</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-child"></i></span>
                            </div>
                        <input type="text" value="{{$el->sexe}}" name="sexe" class="form-control"  disabled>
                        </div>
                    </div>
                </div>

                {{-- Matricule --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputPrénom">Matricule</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-code"></i></span>
                            </div>
                        <input type="text" value="{{$el->code}}" name="matricule" class="form-control"  disabled>
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
                            <input class="form-control" name="telephone" value="{{$el->telephone}}" placeholder="Numéro de téléphone" type="text" disabled>
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
                            <input class="form-control" value="{{$el->email}}" placeholder="Email address" type="email" name="email" disabled>
                        </div>
                    </div>
                </div>

                {{-- Adresse --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputAdresse">Adresse</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                            <input class="form-control" placeholder="Adresse" name="adresse" type="text" value="{{$el->adresse}}" disabled>
                        </div>
                    </div>
                </div>
        </div>
        <a class="btn btn-outline-danger btn-lg btn-block" href=javascript:history.go(-1)>
            Retour
        </a>
        </form>
        @endforeach
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
