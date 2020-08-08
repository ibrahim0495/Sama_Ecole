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
                            @foreach ($eleve as $el)
                                <tr>
                                    <td>{{$el->prenom}}</td>
                                    <td>{{$el->nom}}</td>
                                    <td>{{$el->adresse}}</td>
                                    <td>{{$el->telephone}}</td>
                                    <td class="clearfix">
                                        <a
                                            class="btn btn-sm btn-primary"
                                            href="#" data-toggle="modal" data-target="#VoirNotes"
                                            data-original-title="Creer ou modifier note">
                                            <i class="fa fa-eye fa-lg fa-fw"></i>
                                        </a>

                                        <div class="modal fade" id="VoirNotes" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="VoirNotes">Notes devoirs</h5><br>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="table-responsive py-4">
                                                        <table class="table table-flush" id="datatable-basic">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Matiere</th>
                                                                    <th>Moyenne devoir</th>
                                                                    <th>Semestre</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Matiere</th>
                                                                    <th>Moyenne devoir</th>
                                                                    <th>Semestre</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach ($noteDevoir as $noteD)
                                                                @if ($el->login==$noteD->loginEleve)
                                                                <tr>
                                                                    <td>{{$noteD->nom_matiere}}</td>
                                                                    <td>{{$noteD->note}}</td>
                                                                    <td>{{$noteD->semestre}}</td>
                                                                </tr>
                                                                @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="table-responsive py-4">
                                                        <table class="table table-flush" id="datatable-basic">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Matiere</th>
                                                                    <th>Composition</th>
                                                                    <th>Semestre</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Matiere</th>
                                                                    <th>Composition</th>
                                                                    <th>Semestre</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach ($noteCompo as $noteC)
                                                                @if ($el->login==$noteC->loginEleve)
                                                                <tr>
                                                                    <td>{{$noteC->nom_matiere}}</td>
                                                                    <td>{{$noteC->note}}</td>
                                                                    <td>{{$noteC->semestre}}</td>
                                                                </tr>
                                                                @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
