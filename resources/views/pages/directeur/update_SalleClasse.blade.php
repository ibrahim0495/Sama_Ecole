@extends('pages.directeur.master_dir', ['title' => ' |Salle de classe'])

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
        <h3 class="mb-0">Mise à jour Salle de classe</h3>
    </div>
        <!-- Card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        {{-- Nom --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Nom</label>
                        <input type="text" class="form-control" name="nom" value="{{}}">
                        </div>
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Valider
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection
