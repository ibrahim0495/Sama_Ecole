@extends('pages.comptable.master_comptable', ['title' => ' | Inscription'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Comptable</h6>
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
        <br>
        @if (session('error_sql'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Erreur!</strong> {{ session('error_sql') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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

                    {{-- Classe (name="classe_id") --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="FormControlSelect2">Classe</label>
                            <select
                                class="form-control @error('classe_id') is-invalid @enderror"
                                name="classe_id" data-toggle="select">
                                @foreach ($liste_classe as $item)
                                    <option value="{{ $item->classe_id }}::{{ $item->montant_inscription }}">{{ $item->nom }}</option>
                                @endforeach
                                @error('classe_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>
                    </div>

                    {{-- Année Scolaire (name="anneeScolaire_id") --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlSelect2">Année-Scolaire</label>
                            <select
                                class="form-control  @error('anneeScolaire_id') is-invalid @enderror"
                                name="anneeScolaire_id" data-toggle="select">
                                @foreach ($liste_annee_sco as $item)
                                    <option value="{{ $item->anneeScolaire_id }}">{{ $item->nom_anneesco }}</option>
                                @endforeach
                                @error('anneeScolaire_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
                    <div class="col-md-8 offset-2">
                        @if (session('error_info_eleve'))
                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>Erreur!</strong> {{ session('error_info_eleve') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    {{-- Prénoms (prenom) --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputPrénom">Prénom</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror"
                                    placeholder="Saisir le(s) prénom(s)" value="{{ old('prenom') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            @error('prenom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Nom --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputNom">Nom</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="text" class="form-control @error('nom') is-invalid @enderror"
                                placeholder="Saisir le nom" name="nom" value="{{ old('nom') }}" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Date de naissance (name="dateNaissance") --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleDatepicker">Date de naissance</label>
                            <input
                                class="form-control datepicker @error('dateNaissance') is-invalid @enderror"
                                name="dateNaissance" placeholder="Saisir la date de naissance" type="text"
                                value="{{ old('dateNaissance') }}">
                                @error('dateNaissance')
                                    <div class="text-danger">{{ $message}}</div>
                                @enderror
                        </div>
                    </div>

                    {{-- Lieu de naissance --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2InputLieuNaiss">Lieu de naissance</label>
                            <div class="input-group input-group-merge">
                                <input
                                    class="form-control @error('lieuNaissance') is-invalid @enderror"
                                    name="lieuNaissance" placeholder="Lieu de naissance"
                                    type="text" value="{{ old('lieuNaissance') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                </div>
                            </div>
                            @error('lieuNaissance')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Adresse --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputAdresse">Adresse</label>
                            <div class="input-group input-group-merge">
                                <input
                                    class="form-control @error('adresse') is-invalid @enderror"
                                    name="adresse" placeholder="Adresse"
                                    type="text" value="{{ old('adresse') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                </div>
                            </div>
                            @error('adresse')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Sexe --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlSelectSexe">Sexe</label>
                            <select
                                class="form-control @error('sexe') is-invalid @enderror" name="sexe"
                                id="exampleFormControlSelectSexe">
                                <option value="">Sélectionnez le sexe de l'élève</option>
                                <option>Garçon</option>
                                <option>Fille</option>
                            </select>
                            @error('sexe')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
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
                                <input
                                    class="form-control @error('telephone') is-invalid @enderror"
                                    name="telephone" placeholder="Numéro de téléphone" type="text"
                                    value="{{ old('telephone') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            @error('telephone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Montant inscription --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="InputSomme">Somme versée</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                                <input
                                    class="form-control @error('montant') is-invalid @enderror"
                                    name="montant" placeholder="Montant versée"
                                    type="text" value="{{ old('montant') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><small class="font-weight-bold">Franc CFA</small></span>
                                </div>
                            </div>
                            @error('montant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h4 class="mb-0">Informations du parent</h4>
                        </div>
                    </div>
                    <div class="col-md-8 offset-2">
                        @if (session('erreur_old_parent'))
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Erreur!</strong> {{ session('erreur_old_parent') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                    </div>

                    {{-- Parent infos --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Type de parent</label>
                            <select
                                class="form-control @error('type_parent') is-invalid @enderror"
                                name="type_parent" id="parent" onchange="getTypeParent()">
                                <option value="">Sélectionnez le type de parent</option>
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
                                <input \n\
                                    type='text' name='prenom_parent' \n\
                                    class='form-control @error('prenom_parent') is-invalid @enderror'\n\
                                    id='examplePrenomParent' placeholder='Saisir le(s) prénom(s)'\n\
                                    value='{{ old('prenom_parent') }}'>\n\
                                <div class='input-group-append'>\n\
                                    <span class='input-group-text'><i class='fas fa-user'></i></span>\n\
                                </div>\n\
                            </div>\n\
                            @error('prenom_parent')\n\
                                <div class='text-danger'>{{ $message }}</div>\n\
                            @enderror\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleNomParent'>Nom</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <input \n\
                                    type='text' name='nom_parent' \n\
                                    class='form-control @error('nom_parent') is-invalid @enderror' \n\
                                    id='exampleNomParent' placeholder='Saisir le nom' value='{{ old('nom_parent') }}'>\n\
                                <div class='input-group-append'>\n\
                                    <span class='input-group-text'><i class='fas fa-user'></i></span>\n\
                                </div>\n\
                            </div>\n\
                            @error('nom_parent') <div class='text-danger'>{{ $message }}</div> @enderror\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='TelephoneParent'>Téléphone</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <div class='input-group-prepend'>\n\
                                    <span class='input-group-text'><i class='fas fa-globe-americas'></i></span>\n\
                                </div>\n\
                                <input \n\
                                    type='text' name='telephone_parent' class='form-control @error('telephone_parent') is-invalid @enderror' \n\
                                    id='TelephoneParent' placeholder='Saisir le numéro de téléphone' value='{{ old('telephone_parent') }}'>\n\
                                <div class='input-group-append'>\n\
                                    <span class='input-group-text'><i class='fas fa-phone'></i></span>\n\
                                </div>\n\
                            </div>\n\
                            @error('telephone_parent') <div class='text-danger'>{{ $message }}</div> @enderror\n\
                        </div>\n\
                    </div>\n\
                    \n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='AdresseParent'>Adresse</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <input \n\
                                    type='text' name='adresse_parent' \n\
                                    class='form-control @error('adresse_parent') is-invalid @enderror' \n\
                                    id='AdresseParent' placeholder='Adresse du parent' \n\
                                    value='{{ old('adresse_parent') }}'>\n\
                                <div class='input-group-append'>\n\
                                    <span class='input-group-text'><i class='fas fa-map-marker'></i></span>\n\
                                </div>\n\
                            </div>\n\
                            @error('adresse_parent') <div class='text-danger'>{{ $message }}</div> @enderror\n\
                        </div>\n\
                    </div>\n";

                    var ancien =
                    "\n\
                    <div class='col-md-6'>\n\
                        <div class='form-group'>\n\
                            <label class='form-control-label' for='exampleTelephoneParent'>Téléphone ou login</label>\n\
                            <div class='input-group input-group-merge'>\n\
                                <div class='input-group-prepend'>\n\
                                    <span class='input-group-text'><i class='fas fa-globe-americas'></i></span>\n\
                                </div>\n\
                                <input \n\
                                    type='text' name='info_ancien_parent' \n\
                                    class='form-control @error('info_ancien_parent') is-invalid @enderror' \n\
                                    placeholder='Saisir le numéro de téléphone ou le nom utilisateur' \n\
                                    id='exampleTelephoneParent' value='{{ old('info_ancien_parent') }} '>\n\
                                <div class='input-group-append'>\n\
                                    <span class='input-group-text'><i class='fas fa-phone'></i></span>\n\
                                </div>\n\
                            </div>\n\
                            @error('info_ancien_parent') <div class='text-danger'>{{ $message }}</div> @enderror\n\
                            @if (session('error_info_anc_par'))\n\
                                <div class='text-danger'>{{ session('error_info_anc_par') }}</div>\n\
                            @endif\n\
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
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
