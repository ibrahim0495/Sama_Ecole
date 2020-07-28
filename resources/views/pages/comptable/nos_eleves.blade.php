@extends('pages.comptable.master_comptable', ['title' => "|Nos élèves"])

@section('extra-css')
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Nos élèves</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('comptable.index') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('eleve.create') }}">voir classe</a></li>
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
                            Liste des élèves de la classe (nom classe) de l'année-scolaire (0000-0000)
                        </p>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Date et lieu de naiss.</th>
                                    <th>Classe</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Date et lieu de naiss.</th>
                                    <th>Classe</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>001201910</td>
                                    <td>Ousmane</td>
                                    <td>NDIAYE</td>
                                    <td>00/00/0000</td>
                                    <td>6ème</td>
                                    <td class="clearfix">
                                        <a
                                            class="btn btn-sm btn-success float-left"
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
                                    </td>
                                </tr>
                                <tr>
                                    <td>001201910</td>
                                    <td>Ousmane</td>
                                    <td>NDIAYE</td>
                                    <td>00/00/0000</td>
                                    <td>6ème</td>
                                    <td class="clearfix">
                                        <a
                                            class="btn btn-sm btn-success float-left"
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
                                    </td>
                                </tr>
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
