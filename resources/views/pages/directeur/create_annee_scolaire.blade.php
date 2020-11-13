@extends('pages.directeur.master_directeur', ['title' => ' |AnneeScolaire'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Directeur</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Année scolaire</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')

    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Enregistrer une année-scolaire</h3>
            <div class="text-md-left text-warning mb-4">
                <small>Les champs (<strong>*</strong>) sont obligatoires</small>
            </div>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('annee-scolaire.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3"></div>

                    {{-- Nom Annee --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">
                                Nom <strong class="text-warning">*</strong>
                            </label>
                            
                            <div class="input-group">
                                <input 
                                    type="text" name="nom" value="{{ old('nom') }}" id="example2cols2Input"
                                    class="form-control @error('nom') is-invalid @enderror"  
                                    placeholder="Année accadémique (exemple: 2019-2020)">

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="ni ni-calendar-grid-58 text-primary"></i>
                                    </span>
                                </div>
                            </div>

                            @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Button submit --}}
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Enregistrer</button>
                    </div>

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
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
