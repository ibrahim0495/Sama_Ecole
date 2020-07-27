@if ($profils == "comptable")
    @extends('pages.comptable.master_comptable', ['title'=>'|Réinscription'])
@else

@endif


@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Voir classe</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            @if ($profils == "comptable")
                <li class="breadcrumb-item"><a href="{{ route('comptable.index') }}">Accueil</a></li>
            @else

            @endif
            <li class="breadcrumb-item active" aria-current="page">classe</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Réinscription</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('eleve.store') }}">
                @csrf
                <div class="row">
                    {{--  Année Scolaire  --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="FormControlSelectAnneSco">Année-Scolaire</label>
                            <select class="form-control" id="FormControlSelectAnneSco">
                                <option>2018-2019</option>
                                <option>2019-2020</option>
                                <option>2020-2021</option>
                            </select>
                        </div>
                    </div>

                    {{-- Classe --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlSelect1">Classe</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>6ème</option>
                                <option>5ème</option>
                                <option>4ème</option>
                            </select>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Voir la classe</button>
            </form>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection
