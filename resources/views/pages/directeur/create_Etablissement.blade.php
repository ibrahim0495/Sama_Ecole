@extends('pages.directeur.master_dir', ['title' => ' |Etablissement'])

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
        <h3 class="mb-0">Enregistrer un Surveillant</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <form method="POST" action="{{ route('surveillant.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header">
                        <h4 class="mb-0">Informations personnelles du surveillant</h4>
                    </div>
                </div>
                {{-- Prénoms --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputPrénom">Prénom</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Saisir le(s) prénom(s)" name="prenom">
                        </div>
                    </div>
                </div>

                {{-- Nom --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputNom">Nom</label>
                         <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Saisir le nom" name="nom">
                        </div>
                    </div>
                </div>

                {{-- Adresse --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputAdresse">Adresse</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" placeholder="Adresse" type="text" name="adresse">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputEmail">Email</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input class="form-control" placeholder="Email address" type="email" name="email">
                      </div>
                    </div>
                </div>

                {{-- Téléphone --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputTéléphone">Téléphone</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                            </div>
                            <input class="form-control" placeholder="Numéro de téléphone" type="text" name="telephone">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                        </div>
                    </div>
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
