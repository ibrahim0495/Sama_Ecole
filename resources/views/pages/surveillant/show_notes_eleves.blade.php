@extends('pages.surveillant.master_surveillant', ['title' => '|Liste Notes'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Accueil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Notes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Surveillant/liste des notes</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="row">

    <div class="col-xl-8">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Notes devoir</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Matière</th>
                                <th>Semestre</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Matière</th>
                                <th>Semestre</th>
                                <th>Note</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($noteDevoir as $devoir)
                                <tr>
                                    <td>{{ $devoir->prenom }}</td>
                                    <td>{{ $devoir->nom }}</td>
                                    <td>{{ $devoir->nom_matiere }}</td>
                                    <td>{{ $devoir->semestre }}</td>
                                    <td>{{ $devoir->note }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0"> Notes Composition</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Matière</th>
                                <th>Semestre</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Matière</th>
                                <th>Semestre</th>
                                <th>Note</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($noteCompo as $compo)
                                <tr>
                                    <td>{{ $compo->nom_matiere }}</td>
                                    <td>{{ $compo->semestre }}</td>
                                    <td>{{ $compo->note }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

</div>
</div>

@endsection

@section('extra-js')
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
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
