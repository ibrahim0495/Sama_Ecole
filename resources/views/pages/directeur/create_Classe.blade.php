@extends('pages.directeur.master_directeur', ['title' => ' |Classe'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Classe</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">">Accueil</a></li>
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
                    <div class="col-md-3"></div>
                    {{-- Nom Classe --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Nom</label>
                            <input type="text" name="nom" class="form-control" id="example2cols2Input" placeholder="Saisir le nom de la classe">
                        </div>

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
