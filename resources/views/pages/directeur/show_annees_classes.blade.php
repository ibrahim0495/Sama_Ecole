@extends('pages.directeur.master_directeur', ['title' => ' |Liste Annee et classe'])

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
            <li class="breadcrumb-item active" aria-current="page">Liste des années et des classes</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')

    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Choisir une année et une classe</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('directeur.liste_eleve')}}" method="POST" class="inline-block">
                <input type="hidden" name="profils" value="directeur">
                    <div class="modal-body">
                        {{  csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label class="form-control-label">Classe</label>
                                    <select
                                        class="form-control"
                                        name="classe" data-toggle="select">
                                        @foreach ($nomClasse as $cl)
                                            <option>{{ $cl->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('classe')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label class="form-control-label">Année Scolaire</label>
                                    <select
                                        class="form-control"
                                        name="annee" data-toggle="select">
                                        @foreach ($anneeScolaire as $annee)
                                            <option>{{ $annee->nom_anneesco }}</option>
                                        @endforeach
                                    </select>
                                    @error('annee')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">valider</button>
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
     <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
     <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
