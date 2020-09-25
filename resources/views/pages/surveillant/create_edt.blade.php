@extends('pages.surveillant.master_surveillant', ['title' => 'Créer emploi du temps'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Surveillant</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i> Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Voir classe</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Créer l'emploi du temps</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('surveillant.edt.store-edt')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        {{-- Liste des classes --}}
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label class="form-control-label" for="FormControlSelect2">Classe</label>
                                <select
                                    class="form-control @error('classe_id') is-invalid @enderror"
                                    name="classe_id" data-toggle="select">
                                    @foreach ($liste_classe as $item)
                                        <option value="{{ $item->classe_id }}">{{ $item->nom }}</option>
                                    @endforeach
                                    @error('classe_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
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
