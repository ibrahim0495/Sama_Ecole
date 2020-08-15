@extends('pages.directeur.master_directeur', ['title' => ' |Matiere'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Matière</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Directeur/Enregistrer Matière</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')

    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Enregistrer une matière</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            @foreach ($matiere as $mat)
            <form action="{{ route('matiere.update', $mat->matiere_id)}}" method="post">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="row">
                    <div class="col-md-12"></div>
                    {{-- Nom Classe --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Nom</label>
                            <input type="text" name="nom" class="form-control"  placeholder="Saisir le nom de la matière" value="{{$mat->nom_matiere}}">
                        </div>
                        @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        {{-- Langue --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Langue</label>
                            <input name="langue" class="form-control" value="{{$mat->langue}}">
                        </div>
                        @error('langue')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-outline-danger btn-lg btn-block" href="{{route('matiere.index')}}">
                            Annuler
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-success btn-lg btn-block">
                            Enregistrer
                        </button>
                    </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>

@endsection


{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection
