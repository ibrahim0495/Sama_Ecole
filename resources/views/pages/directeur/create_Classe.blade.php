@extends('pages.directeur.master_directeur', ['title' => ' |Classe'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Directeur</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Enregistrer classe</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')

    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Enregistrer classe</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('classe.store') }}" method="post">
                @csrf
                <div class="row">
                    {{-- Nom Classe --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Nom</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="text" name="nom" class="form-control" id="example2cols2Input"
                                    placeholder="Saisir le nom de la classe" value="{{ old('nom') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label">Surveillant associé</label>
                            <select
                                class="form-control"
                                name="loginSurveillant" data-toggle="select">
                                @foreach ($surveillant as $surv)
                                    <option value="{{$surv->login}}">{{$surv->prenom}} {{$surv->nom}}</option>
                                @endforeach
                            </select>
                            @error('surveillant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Montant inscription</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                                <input
                                    type="text" class="form-control" name="montant_inscription"
                                    placeholder="Saisir montant de l'inscription"
                                    value="{{ old('montant_inscription') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><small class="font-weight-bold">Franc CFA</small></span>
                                </div>
                            </div>
                            @error('montant_inscription')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Montant mensuel</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                                <input
                                    type="text" class="form-control" name="montant_mensuel"
                                    placeholder="Saisir le montant de la mensualité"
                                    value="{{ old('montant_mensuel') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><small class="font-weight-bold">Franc CFA</small></span>
                                </div>
                            </div>
                            @error('montant_mensuel')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Enregistrer</button>
                </div>
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
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
