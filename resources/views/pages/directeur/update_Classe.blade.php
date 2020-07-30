@extends('pages.directeur.master_directeur', ['title' => ' |Classe'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('contenu_page')
<div class="card mb-4">
</div>
<div class="card mb-4">
</div>
<div class="card mb-4">
</div>
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Modification d'une classe</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <form action="{{ route('classe.update') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3"></div>
                {{-- Nom Classe --}}
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label class="form-control-label" for="example2cols2Input">Nom</label>
                    <input type="text" name="nom" class="form-control" id="example2cols2Input" value="{{}}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection
