@extends('pages.surveillant.master_surveillant', ['title' => 'Enregistrement Professeur'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Accueil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('surveillant.professeur.liste')}}">Professeur</a></li>
            <li class="breadcrumb-item active" aria-current="page">Surveillant/enregistrer professeur</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Enregistrer un Professeur</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
    <form method="POST" action="{{ route('professeur.store')}}">
            
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4 class="mb-0"></h4>
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
                    <input
                        type="text" class="form-control" placeholder="Saisir le(s) prénom(s)"
                        value="{{ old('prenom') ?? ''}}" name="prenom">
                </div>
                {!! $errors->first('prenom', '<div class="text-danger">:message</div>')!!}
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
                    <input type="text" class="form-control" placeholder="Saisir le nom" value="{{ old('nom') ?? ''}}" name="nom">
                </div>
                {!! $errors->first('nom', '<div class="text-danger">:message</div>')!!}

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
                    <input class="form-control" placeholder="Numéro de téléphone" type="text" value="{{ old('telephone') ?? ''}}" name="telephone">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                </div>
                {!! $errors->first('telephone', '<div class="text-danger">:message</div>')!!}
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
                    <input class="form-control" placeholder="Email address" type="email" value="{{ old('email') ?? ''}}" name="email">
                </div>
                {!! $errors->first('email', '<div class="text-danger">:message</div>')!!}
            </div>
        </div>

        {{-- Adresse --}}
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label" for="InputAdresse">Adresse</label>
                <div class="input-group input-group-merge">
                    <input class="form-control" placeholder="Adresse" type="text" value="{{ old('adresse') ?? ''}}" name="adresse">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                    </div>
                </div>
                {!! $errors->first('adresse', '<div class="text-danger">:message</div>')!!}
            </div>
        </div>

        {{-- Langue --}}
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label" for="example2cols2Input">Langue</label>
                <select name="langue" class="form-control" id="example2cols2Select" data-toggle="select">
                    <option value="ENG">Anglais</option>
                    <option value="AR">Arabe</option>
                    <option value="FR">Français</option>
                </select>
            </div>
        </div>

        {{-- classes --}}
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label" for="example2cols2Input">Affecter une ou des classes</label>
                <select name="classes[]" class="form-control" id="example1cols1Select" data-toggle="select" multiple>
                    @foreach($classes as $classe)
                        <option value="{{$classe->classe_id}}">{{$classe->nom}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- matieres --}}
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label" for="example2cols2Input">Affecter une ou des matieres</label>
                <select name="matieres[]" class="form-control" id="example2cols2Select" data-toggle="select" multiple>
                    @foreach($matieres as $matiere)
                        <option value="{{$matiere->matiere_id}}">{{$matiere->nom_matiere}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

<button type="submit" class="btn btn-lg btn-block btn-primary">
    Enregistrer
</button>


        </form>
    </div>
</div>
@endsection

@section('extra-js')
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
