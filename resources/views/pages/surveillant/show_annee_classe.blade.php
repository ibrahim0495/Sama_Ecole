@extends('pages.surveillant.master_surveillant', ['title' => 'Liste classe et annee'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Surveillant</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i>Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Voir une classe</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Choix classe et année académique</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">

        <form action="{{ route('surveillant.liste_eleve')}}" method="POST" class="inline-block">
            <input type="hidden" name="profils" value="surveillant">
                <div class="modal-body">
                    {{  csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label class="form-control-label">Année Scolaire</label>
                                <select
                                    class="form-control"
                                    name="annee" data-toggle="select">
                                    @foreach ($anneeScolaire as $annee)
                                        <option value="{{ $annee->anneeScolaire_id }}::{{ $annee->nom_anneesco }}">
                                            {{ $annee->nom_anneesco }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('annee')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label class="form-control-label">Classe</label>
                                <select
                                    class="form-control"
                                    name="classe" data-toggle="select">
                                    @foreach ($nomClasse as $cl)
                                        <option value="{{ $cl->classe_id }}::{{ $cl->nom }}">{{ $cl->nom }}</option>
                                    @endforeach
                                </select>
                                @error('classe')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Voir</button>
                    </div>
                </div>

            </form>

    </div>
</div>
@endsection

@section('extra-js')
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
