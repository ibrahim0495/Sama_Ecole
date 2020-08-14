@extends('pages.parent.master_par', ['title' => ' |Enfant'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection
@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Mes enfants/voir notes</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('parent.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mes enfants/voir notes</li>
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
                    <h3 class="mb-0">Notes</h3>
                    <br>
                <a class="btn btn-primary" href=javascript:history.go(-1)>Retour</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Matiere</th>
                                <th>Moyenne devoir</th>
                                <th>Composition</th>
                                <th>Semestre</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Matiere</th>
                                <th>Moyenne devoir</th>
                                <th>Composition</th>
                                <th>Semestre</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($noteDevoir as $noteD)
                                <tr>
                                    <td>{{$noteD->nom_matiere}}</td>
                                    <td>{{$noteD->note}}</td>
                                    <td></td>
                                    <td>{{$noteD->semestre}}</td>
                                </tr>
                            @endforeach
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
