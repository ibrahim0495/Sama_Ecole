@extends('pages.directeur.master_directeur', ['title' => ' |AnneeScolaire'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Année Scolaire</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Directeur/Modifier une année scolaire</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')

    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Modifier année</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            @foreach ($anneeScolaire as $annee)
            <form action="{{ route('annee-scolaire.update', $annee->anneeScolaire_id)}}" method="post" onsubmit="return confirm('Voulez vous modifier ce modèle?')">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="row">
                    <div class="col-md-3"></div>
                    {{-- Nom Annee --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Nom</label>
                            <input type="text" name="nom" class="form-control" id="example2cols2Input" placeholder="Saisir l'année accadémique (exemple: 2019-2020)" value="{{$annee->nom_anneesco}}">
                        </div>
                        @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="col-md-6">
                            <a class="btn btn-outline-danger btn-lg btn-block" href="{{route('annee-scolaire.index')}}">
                                Annuler
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline-success btn-lg btn-block">
                                Enregistrer
                            </button>
                        </div>
                </div>
            </form>
            @endforeach
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
