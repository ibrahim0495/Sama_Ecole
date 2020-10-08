@extends('pages.comptable.master_comptable', ['title' => ' |Eleve'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Comptable</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('comptable.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des élèves</li>
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
                <h3 class="mb-0">Liste des élèves de la classe {{ $nom_classe }} ({{ $nom_annee_sco }})</h3>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Matricule</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Date de Naiss</th>
                            <th>Lieu de Naiss</th>
                            <th>Sexe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Matricule</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Date de Naiss</th>
                            <th>Lieu de Naiss</th>
                            <th>Sexe</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($liste_classe as $list)
                        <tr>
                            <td>{{ $list->code }}</td>
                            <td>{{$list->prenom}}</td>
                            <td>{{$list->nom}}</td>
                            <td>{{ $list->dateNaissance }}</td>
                            <td>{{ $list->lieuNaissance }}</td>
                            <td>{{ $list->sexe }}</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="{{ route('eleve.show', $list->login) }}"
                                    data-original-title="Voir l'élève">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>
                                <a
                                    class="btn btn-sm btn-primary float-right"
                                    href="{{ route('payement.show', $list->code) }}"
                                    data-original-title="Mensualité l'élève">
                                    <i class="ni ni-money-coins ni-lg"></i>
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
