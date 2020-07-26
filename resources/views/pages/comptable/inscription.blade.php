@extends('pages.comptable.master_comptable', ['title' => ' | Inscription'])

@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Inscription</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Inscription</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
        <h3 class="mb-0">Inscription</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('inscription.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h4 class="mb-0">Scolairité</h4>
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

                    {{-- Année Scolaire --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlSelect2">Année-Scolaire</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                                <option>2019-2020</option>
                                <option>2020-2021</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h4 class="mb-0">Informations personnelles de l'élève</h4>
                        </div>
                    </div>
                    {{-- Prénoms --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Prénom(s)</label>
                            <input type="text" class="form-control" id="example2cols2Input" placeholder="Saisir le(s) prénom(s)">
                        </div>
                    </div>

                    {{-- Nom --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Nom</label>
                            <input type="text" class="form-control" id="example2cols2Input" placeholder="Saisir le nom">
                        </div>
                    </div>

                    {{-- Date de naissance --}}
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="example-date-input" class="form-control-label">Date de naissance</label>
                            <input class="form-control" type="date" id="example-date-input" placeholder="Saisir le date de naissance">
                        </div>
                    </div>

                    {{-- Lieu de naissance --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2InputLieuNaiss">Lieu de naissance</label>
                            <input type="text" class="form-control" id="example2cols2InputLieuNaiss" placeholder="Saisir le lieu de naissance">
                        </div>
                    </div>

                    {{-- Adresse --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2InputAdresse">Adresse</label>
                            <input type="text" class="form-control" id="example2cols2InputAdresse" placeholder="Saisir l'adresse">
                        </div>
                    </div>

                    {{-- Sexe --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlSelectSexe">Sexe</label>
                            <select class="form-control" id="exampleFormControlSelectSexe">
                                <option>Garçon</option>
                                <option>Fille</option>
                            </select>
                        </div>
                    </div>

                    {{-- Téléphone --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2InputTel">Numéro de téléphone</label>
                            <input type="text" class="form-control" id="example2cols2InputTel" placeholder="Saisir le numéro de téléphone">
                        </div>
                    </div>

                    {{-- Montant inscription --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2InputMontant">Somme versée</label>
                            <input type="text" class="form-control" id="example2cols2InputMontant" placeholder="Saisir la somme versée">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h4 class="mb-0">Informations du parent</h4>
                        </div>
                    </div>


                    {{-- Parent infos --}}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Type de parent</label>
                            <select class="form-control" id="parent" onchange="getTypeParent()">
                                <option selected>Sélectionnez le type de parent</option>
                                <option value="new">Nouveau</option>
                                <option value="old">Ancien</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" id="demo" ></div>
                <script>
                    function getTypeParent() {
                        var nouveau ="<div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='examplePrenomParent'>Prénom(s)</label>\n\
                            <input type='text' class='form-control' id='examplePrenomParent' placeholder='Saisir le(s) prénom(s)'>\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleNomParent'>Nom</label>\n\
                            <input type='text' class='form-control' id='exampleNomParent' placeholder='Saisir le nom'>\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleTelephoneParent'>Téléphone</label>\n\
                            <input type='text' class='form-control' id='exampleTelephoneParent' placeholder='Saisir le numéro de téléphone'>\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleAdresseParent'>Adresse</label>\n\
                            <input type='text' class='form-control' id='exampleAdresseParent' placeholder='Adresse'>\n\
                        </div>\n\
                    </div>\n";

                    var ancien = "<div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleTelephoneParent'>Téléphone ou Nom d'utilisateur</label>\n\
                            <input type='text' class='form-control' id='exampleTelephoneParent' placeholder='Saisir le numéro de téléphone ou le nom utilisateur'>\n\
                        </div>\n\
                    </div>\n";
                        var choix= document.getElementById("parent").value;
                        if(choix == "new"){
                            document.getElementById("demo").innerHTML = nouveau;
                        } else if(choix == "old"){
                            document.getElementById("demo").innerHTML = ancien;
                        }
                    }
                </script>

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Inscrire
                </button>
            </form>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection
