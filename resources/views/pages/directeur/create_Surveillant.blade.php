@extends('pages.directeur.master_dir', ['title' => ' |Surveillant'])

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
        <h3 class="mb-0">Enregistrer surveillant</h3>
    </div>
        <!-- Card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('surveillant.create') }}">
                @csrf
                {{-- Prénoms --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="example2cols2Input">Prénom(s)</label>
                        <input type="text" class="form-control" id="example2cols2Input" placeholder="Saisir le(s) prénom(s)" name="prenom">
                    </div>
                </div>

                {{-- Nom --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="example2cols2Input">Nom</label>
                        <input type="text" class="form-control" id="example2cols2Input" placeholder="Saisir le nom" name="nom">
                    </div>
                </div>

                {{-- Date de naissance --}}
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="example-date-input" class="form-control-label">Date de naissance</label>
                        <input class="form-control" type="date" id="example-date-input" placeholder="Saisir le date de naissance" name="date_naissance">
                    </div>
                </div>

                {{-- Lieu de naissance --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="example2cols2InputLieuNaiss">Lieu de naissance</label>
                        <input type="text" class="form-control" id="example2cols2InputLieuNaiss" placeholder="Saisir le lieu de naissance" name="lieu_naissance">
                    </div>
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="example2cols2Input">Adresse email</label>
                        <input class="form-control" placeholder="Saisir l'addresse email" type="email" name="email">
                    </div>
                </div>

                {{-- Adresse --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="example2cols2InputAdresse">Adresse</label>
                        <input type="text" class="form-control" id="example2cols2InputAdresse" placeholder="Saisir l'adresse" name="adresse">
                    </div>
                </div>

                {{-- Téléphone --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="example2cols2InputTel">Numéro de téléphone</label>
                        <input type="text" class="form-control" id="example2cols2InputTel" placeholder="Saisir le numéro de téléphone" name="telephone">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Enregistrer
                </button>
            </form>
        </div>
</div>


@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection
