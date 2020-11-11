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
            <h3 class="mb-0">Enregistrer son établissement</h3>
            <div class="text-md-left text-warning mb-4">
                <small>Les champs (<strong>*</strong>) sont obligatoires</small>
            </div>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('etablissement.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h4 class="mb-0">Informations de l'établissement</h4>
                        </div>
                    </div>

                    {{-- Nom --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Nom <strong class="text-warning">*</strong></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupNom">
                                        <i class="ni ni-hat-3"></i>
                                    </span>
                                </div>
                                <input 
                                    type="text" class="form-control @error('nom') is-invalid @enderror"
                                    placeholder="Nom de l'établissement" name="nom" value="{{ old('nom') }}" 
                                    aria-describedby="inputGroupNom"/>
                            </div>
                            @error('nom')
                                <div class="text-danger text-small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Adresse --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputAdresse">
                                Adresse <strong class="text-warning">*</strong>
                            </label>
                            <div class="input-group">
                                <input 
                                    class="form-control @error('adresse') is-invalid @enderror" placeholder="Adresse" type="text" name="adresse" value="{{ old('adresse') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                </div>
                            </div>
                            @error('adresse')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputEmail">
                                E-mail <strong class="text-warning">*</strong>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input 
                                    class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" type="email" 
                                    name="email" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Téléphone --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputTéléphone">
                                Téléphone <strong class="text-warning">*</strong>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                </div>
                                <input 
                                class="form-control @error('telephone') is-invalid @enderror" 
                                placeholder="Numéro de téléphone" type="text" name="telephone" value="{{ old('telephone') }}"
                                onKeypress="if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                                            if(event.which < 45 || event.which > 57) return false;" maxlength="9"/>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            @error('telephone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- logo --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputLogo">Logo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="logo" value="{{ old('logo') }}">
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
                            <div class="input-group">
                                <input class="form-control" placeholder="Saisir l'acronyme" type="text" name="acronyme" value="{{ old('acronyme') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
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
