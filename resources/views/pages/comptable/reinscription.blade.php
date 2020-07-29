@extends('pages.comptable.master_comptable', ['title'=>'|Réinscription'])

@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Réinscription</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('comptable.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Réinscription</li>
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
            <form method="POST" action="{{ route('reinscription.store') }}">
                @csrf
                <div class="row">
                    {{--  Matricule  --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputMatricule">Matricule</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Saisir le matricule">
                            </div>
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

                    {{--  Montant réincription  --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputSomme">Somme versée</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                                <input class="form-control" placeholder="Montant versée" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text"><small class="font-weight-bold">Franc CFA</small></span>
                                </div>
                            </div>
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
                        var nouveau =
                    "\n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='examplePrenomParent'>Prénom(s)</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <div class='input-group-prepend'>\n\
                                    <span class='input-group-text'><i class='fas fa-user'></i></span>\n\
                                </div>\n\
                                <input type='text' class='form-control' id='examplePrenomParent' placeholder='Saisir le(s) prénom(s)'>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleNomParent'>Nom</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <div class='input-group-prepend'>\n\
                                    <span class='input-group-text'><i class='fas fa-user'></i></span>\n\
                                </div>\n\
                                <input type='text' class='form-control' id='exampleNomParent' placeholder='Saisir le nom'>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleTelephoneParent'>Téléphone</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <div class='input-group-prepend'>\n\
                                    <span class='input-group-text'><i class='fas fa-globe-americas'></i></span>\n\
                                </div>\n\
                                <input type='text' class='form-control' id='exampleTelephoneParent' placeholder='Saisir le numéro de téléphone'>\n\
                                <div class='input-group-append'>\n\
                                    <span class='input-group-text'><i class='fas fa-phone'></i></span>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleAdresseParent'>Adresse</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <input type='text' class='form-control' id='exampleAdresseParent' placeholder='Adresse'>\n\
                                <div class='input-group-append'>\n\
                                    <span class='input-group-text'><i class='fas fa-map-marker'></i></span>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n";

                    var ancien =
                    "\n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleTelephoneParent'>Téléphone</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <div class='input-group-prepend'>\n\
                                    <span class='input-group-text'><i class='fas fa-globe-americas'></i></span>\n\
                                </div>\n\
                                <input type='text' class='form-control' id='exampleTelephoneParent' placeholder='Saisir le numéro de téléphone ou le nom utilisateur'>\n\
                                <div class='input-group-append'>\n\
                                    <span class='input-group-text'><i class='fas fa-phone'></i></span>\n\
                                </div>\n\
                            </div>\n\
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

                <button type="submit" class="btn btn-primary btn-lg btn-block">Réinscrire</button>
            </form>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection
