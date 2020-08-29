@extends('pages.directeur.master_directeur', ['title' => ' | Salle de classe'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Directeur</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Salle de classe</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')

    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Enregistrer une salle de classe</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('salle_classe.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    {{-- Nom SalleClasse --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Nom</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="text" name="nom" class="form-control" id="example2cols2Input"
                                    placeholder="Saisir le nom de la salle" value="{{ old('nom') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Capacité</label>
                            <div class="input-group input-group-merge">
                                <input type="text" name="capacite" value="{{ old('capacite') }}" class="form-control" id="example2cols2Input" placeholder="Saisir la capacité de la salle"
                                    onKeypress="  if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                                                if(event.which < 45 || event.which > 57) return false;">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            @error('capacite')
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

@endsection
