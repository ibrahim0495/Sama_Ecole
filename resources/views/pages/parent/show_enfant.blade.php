@extends('pages.parent.master_par', ['title' => ' |Enfant'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Mes enfants</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('parent.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mes enfants</li>
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
                    <h3 class="mb-0">Mes enfants</h3>
                    <p class="text-sm mb-0">
                        Liste des mes enfants dans l'établissement (nom_etablissement)
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Ousmane</td>
                                <td>NDIAYE</td>
                                <td>Dakar</td>
                                <td>77 000 00 00</td>
                                <td>
                                    <a
                                        class="btn btn-sm btn-success"
                                        href="#" data-toggle="tooltip"
                                        data-original-title="Voir ses notes">
                                        <i class="fa fa-eye fa-lg fa-fw"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>Ousmane</td>
                                <td>NDIAYE</td>
                                <td>00/00/0000</td>
                                <td>6ème</td>
                                <td>
                                    <a
                                        class="btn btn-sm btn-success"
                                        href="#" data-toggle="tooltip"
                                        data-original-title="Voir ses notes">
                                        <i class="fa fa-eye fa-lg fa-fw"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>Ousmane</td>
                                <td>NDIAYE</td>
                                <td>00/00/0000</td>
                                <td>6ème</td>
                                <td>
                                    <a
                                        class="btn btn-sm btn-success"
                                        href="#" data-toggle="tooltip"
                                        data-original-title="Voir ses notes">
                                        <i class="fa fa-eye fa-lg fa-fw"></i>
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

{{--  Pour les fichier js dont ce page a besoin ici  --}}
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
