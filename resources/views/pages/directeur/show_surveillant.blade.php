@extends('pages.directeur.master_directeur', ['title' => ' |Surveillant'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('contenu_page')

<div class="card mb-12">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Modification du Surveillant : {{$surveillantActif->login}}</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <form method="POST" action="{{ route('directeur.surveillant.update', $surveillantActif->login) }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header">
                        <div class="row">
                        <h4 class="mb-0">Informations personnelles</h4>
                       
                        </div>
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
                        <input type="text" value="{{$surveillantActif->prenom}}" name="prenom" class="form-control" placeholder="Saisir le(s) prénom(s)">
                        </div>
                        {!! $errors->first('prenom', '<p class="errors">:message</p>')!!}
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
                            <input type="text" name="nom" value="{{$surveillantActif->nom}}" class="form-control" placeholder="Saisir le nom">
                        </div>
                        {!! $errors->first('nom', '<p class="errors">:message</p>')!!}
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
                            <input class="form-control" name="telephone" value="{{$surveillantActif->telephone}}" placeholder="Numéro de téléphone" type="text">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                        </div>
                        {!! $errors->first('telephone', '<p class="errors">:message</p>')!!}
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
                            <input class="form-control" value="{{$surveillantActif->email}}" placeholder="Email address" type="email" name="email">
                        </div>
                        {!! $errors->first('email', '<p class="errors">:message</p>')!!}
                    </div>
                </div>

                {{-- Adresse --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="InputAdresse">Adresse</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" placeholder="Adresse" name="adresse" type="text" value="{{$surveillantActif->adresse}}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                        </div>
                        {!! $errors->first('adresse', '<p class="errors">:message</p>')!!}
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form group">
                        <label class="form-control-label" for="InputStatus">Activer/Désactiver</label><br>
                        <label class="custom-toggle custom-toggle-success ">
                            <input type="checkbox" {{$surveillantActif->etatPers ? 'checked' : '' }} name="status">
                            <span class="custom-toggle-slider rounded-circle" data-label-off="Non" data-label-on="Oui"></span>
                        </label>
                    </div>
                </div>

                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <a class="btn btn-outline-danger btn-lg btn-block" href="{{route('directeur.surveillant.liste')}}">
                        Annuler
                    </a>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-success btn-lg btn-block">
                        Enregistrer
                    </button>
                </div>
            </div>

           
        </form>
    </div>
</div>
@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection
