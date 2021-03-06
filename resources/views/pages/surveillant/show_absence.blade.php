@extends('pages.surveillant.master_surveillant', ['title' => '| Absence'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style_carte_id_sco.css') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Surveillant</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('surveillant.index') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('eleve.create') }}">Voir Absence</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
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
                    <h3 class="mb-0">Liste des absences</h3>
                    <br>
            <a class="btn btn-primary" href="{{ route('absence.create') }}">Ajouter nouvelle absence</a>
            </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Code</th>
                                <th>Durée absence (par heure)</th>
                                <th>Motif</th>
                                <th>Action (justifier)</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Code</th>
                                <th>Durée absence (par heure)</th>
                                <th>Motif</th>
                                <th>Action (justifier)</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($absence as $abs)
                                <tr>
                                    <td>{{ $abs->code }}</td>
                                    <td>{{ $abs->duree_abs }}</td>
                                    <td>{{ $abs->motif }}</td>
                                    <td>

                                        <a
                                            class="btn btn-sm btn-primary"
                                            href="{{ route('absence.show', $abs->code) }}">
                                            <i class="fa fa-edit fa-lg fa-fw"></i>
                                        </a>

                                    </td>
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
