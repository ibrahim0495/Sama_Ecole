@extends('pages.directeur.master_directeur', ['title' => ' |Classe'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Classe</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Directeur/Modifier classe</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Modification d'une classe</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        @foreach ($classe as $cl)
        <form action="{{ route('classe.update', $cl->classe_id)}}" method="POST" class="inline-block" onsubmit="return confirm('Voulez vous modifier cette classse?')">
            <div class="modal-body">

                {{ csrf_field() }}
                {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="nom" value="{{$cl->nom}}">
                    @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label>Montant inscription</label>
                    <input type="number" class="form-control" name="montant_inscription" value="{{$cl->montant_inscription}}"
                        onKeypress="  if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                        if(event.which < 45 || event.which > 57) return false;">
                    @error('montant_inscription')
                                <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label>Montant mensuel</label>
                    <input type="text" class="form-control" name="montant_mensuel" value="{{$cl->montant_mensuel}}"
                        onKeypress="  if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                        if(event.which < 45 || event.which > 57) return false;">
                    @error('montant_mensuel')
                                <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label>Surveillant</label>
                    <input type="text" class="form-control" name="surveillant" value="{{$cl->prenom}} {{$cl->nom_per}}" disabled>
                    @error('surveillant')
                                <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>
            <div class="col-md-6">
                <a class="btn btn-outline-danger btn-lg btn-block" href="{{route('classe.index')}}">
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
