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
            <h3 class="mb-0">Enregistrer une classe</h3>
            <div class="text-md-left text-warning mb-4">
                <small>Les champs (<strong>*</strong>) sont obligatoires</small>
            </div>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('classe.store') }}" method="post">
                @csrf
                <div class="row">

                    {{-- Nom Classe --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">
                                Nom <strong class="text-warning">*</strong>
                            </label>
                            <div class="input-group">
                                <input
                                    type="text" name="nom" value="{{ old('nom') }}" 
                                    class="form-control @error('nom') is-invalid @enderror" 
                                    placeholder="Nom de la classe" id="example2cols2Input"/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="ni ni-hat-3 text-primary"></i>
                                    </span>
                                </div>
                            </div>
                            @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Surveillant associe --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label">
                                Surveillant associé <strong class="text-warning">*</strong>
                            </label>
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

                    {{-- Montant inscription --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label">
                                Montant inscription  <strong class="text-warning">*</strong>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-credit-card text-primary"></i>
                                    </span>
                                </div>
                                <input
                                    class="form-control @error('montant_inscription') is-invalid @enderror"
                                    name="montant_inscription" placeholder="Montant inscription"
                                    value="{{ old('montant_inscription') }}" type="text"
                                    onKeypress="  if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                                            if(event.which < 45 || event.which > 57) return false;">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <small class="font-weight-bold text-primary">Franc CFA</small>
                                    </span>
                                </div>
                            </div>
                            @error('montant_inscription')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Montant Mensuel --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label">
                                Montant mensuel  <strong class="text-warning">*</strong>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-credit-card text-primary"></i>
                                    </span>
                                </div>
                                <input
                                    class="form-control @error('montant_mensuel') is-invalid @enderror" 
                                    name="montant_mensuel" placeholder="Montant mensualité"
                                    value="{{ old('montant_mensuel') }}" type="text" 
                                    onKeypress="  if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                                            if(event.which < 45 || event.which > 57) return false;">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <small class="font-weight-bold text-primary">Franc CFA</small>
                                    </span>
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
