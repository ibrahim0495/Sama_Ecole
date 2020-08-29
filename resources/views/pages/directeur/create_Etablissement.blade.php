@extends('pages.directeur.master_directeur', ['title' => ' |Etablissement'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Directeur</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Enregistrer établissement</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Enregistrer un Etablissement</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('etablissement.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h4 class="mb-0">Informations d'un établissement</h4>
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
                                <input type="text" class="form-control" placeholder="Saisir le nom" name="nom">
                            </div>
                        </div>
                        @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Adresse --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputAdresse">Adresse</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" placeholder="Adresse" type="text" name="adresse">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                </div>
                            </div>
                        </div>
                        @error('adresse')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        @error('email')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Téléphone --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputTéléphone">Téléphone</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                </div>
                                <input class="form-control" placeholder="Numéro de téléphone" type="text" name="telephone"
                                onKeypress="  if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                                            if(event.which < 45 || event.which > 57) return false;" maxlength="9">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                        </div>
                        @error('telephone')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- logo --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputLogo">Logo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="logo">
                                <label class="custom-file-label" for="customFile">Choisir une photo</label>
                            </div>
                        </div>
                        @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Acronyme --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputTéléphone">Acronyme</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" placeholder="Saisir l'acronyme" type="text" name="acronyme">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                        @error('acronyme')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
@endsection


{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

    {{--
    Cette importation doit toujours être en derniere lieu
    car c'est elle qui appelle les autres fonction Javascript
     --}}
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
