@extends('pages.directeur.master_directeur', ['title' => ' |Surveillant'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Surveillant</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Directeur/Lister Surveillants</li>
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
                <h3 class="mb-0">Surveillant</h3>
                <p class="text-sm mb-0">
                    Liste des Surveillants
                </p>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Pape</td>
                            <td>NDIAYE</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="#" data-toggle="modal" data-target="#surveillant"
                                    data-original-title="Voir le surveillant">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>

                                <div class="modal fade" id="eleve" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-gradient-blue ql-color-white">
                                                <h5 class="modal-title" id="eleve">Pape NDIAYE</h5><br>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div class="modal-body">
                                                Adresse : <strong>Thiaroye</strong><br>
                                                <div class="dropdown-divider"></div>
                                                Année et lieu de naissance : <strong>12/10/2015 à Dakar</strong><br>
                                                <div class="dropdown-divider"></div>
                                                sexe :  <strong>M</strong><br>
                                                <div class="dropdown-divider"></div>
                                                Téléphone :  <strong>77 012 25 45</strong><br>
                                                <div class="dropdown-divider"></div>
                                                email :  <strong>hamidou@gmail.com</strong><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Malick</td>
                            <td>Diop</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="#" data-toggle="modal" data-target="#eleve"
                                    data-original-title="Voir l'élève">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>

                                <div class="modal fade" id="eleve" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-gradient-blue ql-color-white">
                                                <h5 class="modal-title" id="eleve">Malick Diop</h5><br>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div class="modal-body">
                                                Adresse : <strong>Thiaroye</strong><br>
                                                <div class="dropdown-divider"></div>
                                                Année et lieu de naissance : <strong>12/10/2015 à Dakar</strong><br>
                                                <div class="dropdown-divider"></div>
                                                sexe :  <strong>M</strong><br>
                                                <div class="dropdown-divider"></div>
                                                Téléphone :  <strong>77 012 25 45</strong><br>
                                                <div class="dropdown-divider"></div>
                                                email :  <strong>hamidou@gmail.com</strong><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Ousmane</td>
                            <td>Diouf</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="#" data-toggle="modal" data-target="#eleve"
                                    data-original-title="Voir l'élève">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>

                                <div class="modal fade" id="eleve" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-gradient-blue ql-color-white">
                                                <h5 class="modal-title" id="eleve">Ousmane Diouf</h5><br>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div class="modal-body">
                                                Adresse : <strong>Thiaroye</strong><br>
                                                <div class="dropdown-divider"></div>
                                                Année et lieu de naissance : <strong>12/10/2015 à Dakar</strong><br>
                                                <div class="dropdown-divider"></div>
                                                sexe :  <strong>M</strong><br>
                                                <div class="dropdown-divider"></div>
                                                Téléphone :  <strong>77 012 25 45</strong><br>
                                                <div class="dropdown-divider"></div>
                                                email :  <strong>hamidou@gmail.com</strong><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
