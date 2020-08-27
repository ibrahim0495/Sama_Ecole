@extends('pages.surveillant.master_surveillant', ['title' => '| Nos classes'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style_carte_id_sco.css') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Surveillant</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('surveillant.index') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('eleve.create') }}">Voir classe</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nos élèves</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Nos élèves</h3>
                    <p class="text-sm mb-0">
                        Liste des élèves de la classe {{ $nom_classe }} de l'année-scolaire {{ $nom_annee_sco }}
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Matricule</th>
                                <th>Login</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Date de naiss.</th>
                                <th>Sexe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Matricule</th>
                                <th>Login</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Date et lieu de naiss.</th>
                                <th>Sexe</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($liste_eleve as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->loginEleve }}</td>
                                    <td>{{ $item->prenom }}</td>
                                    <td>{{ $item->nom }}</td>
                                    <td>{{ $item->dateNaissance }} {{ $item->lieuNaissance }}</td>
                                    <td>{{ $item->sexe }}</td>
                                    @if ($profils === 'Surveillant')
                                        <td class="clearfix">
                                            <a
                                                class="btn btn-sm btn-success float-left"
                                                data-toggle="modal"
                                                data-target="#generateCardId{{ $item->loginEleve }}"
                                                data-original-title="Générer carte d'identité-scolaire">
                                                <i class="fa fa-eye fa-lg fa-fw"></i>
                                            </a>
                                            <a
                                                class="btn btn-sm btn-success"
                                                href="#" data-toggle="tooltip"
                                                data-original-title="Voir l'élève">
                                                <i class="fa fa-eye fa-lg fa-fw"></i>
                                            </a>
                                            <a
                                                class="btn btn-sm btn-primary float-right"
                                                href="#" data-toggle="tooltip"
                                                data-original-title="Modifier l'élève">
                                                <i class="fa fa-edit fa-lg fa-fw"></i>
                                            </a>
                                            {{-- Modal ici --}}
                                            <div class="modal fade" id="generateCardId{{ $item->loginEleve }}" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="generateCardId{{ $item->loginEleve }}">Modifier Classes</h5><br>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div id="gradient"></div>
                                                            <div id="card_id">
                                                                <img src="photos_profils/avatar_male.png"/>
                                                                <h2>Prénoms : {{$item->prenom }}</h2>
                                                                <h2>Nom : {{$item->nom }}</h2>
                                                                <h2>Date de naissance : {{$item->dateNaissance }}</h2>
                                                                <h2>Lieu de naissance : {{$item->lieuNaissance }}</h2>
                                                                <h2>Adresse : {{$item->adresse }}</h2>
                                                                <h2>Sexe : {{$item->sexe }}</h2>
                                                                <h2>Login : {{ $item->loginEleve }}

                                                                {{-- <span class="left bottom">tel: 731 366 ***</span> --}}
                                                                <h2 class="right bottom">Matricule: {{ $item->code }}</h2>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @elseif ($profils === 'Comptable')

                                    @else()

                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
