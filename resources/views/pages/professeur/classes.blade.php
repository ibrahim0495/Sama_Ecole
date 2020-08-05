@extends('pages.professeur.master_prof',['title' => ' | Classes'])

@section('page-namer')

    <h6 class="h2 text-white d-inline-block mb-0">Classes-notes</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-pencil-ruler"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Professeur</a></li>
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
                    <div class="card-body p-0">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Date de Naissance</th>
                                    <th>Lieu de Naissance</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Date de Naissance</th>
                                    <th>Lieu de Naissance</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>001221810</td>
                                    <td>Hamidou</td>
                                    <td>NDIAYE</td>
                                    <td>Thiaroye</td>
                                    <td>12/10/2015</td>
                                    <td>Dakar</td>
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
                                                        <h5 class="modal-title" id="eleve">Hamidou NDIAYE</h5><br>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        matricule : <strong>001221810</strong><br>
                                                        <div class="dropdown-divider"></div>
                                                        classe : <strong>6emeA</strong><br>
                                                        <div class="dropdown-divider"></div>
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
                                    <td>001201910</td>
                                    <td>Ousmane</td>
                                    <td>NDIAYE</td>
                                    <td>Medina</td>
                                    <td>18/01/2014</td>
                                    <td>Dakar</td>
                                    <td class="clearfix">
                                        <a
                                            class="btn btn-sm btn-success float-left"
                                            href="#" data-toggle="modal" data-target="#eleve1"   
                                            data-original-title="Voir l'élève">
                                            <i class="fa fa-eye fa-lg fa-fw"></i>
                                        </a>
                                        <div class="modal fade" id="eleve1" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-gradient-blue ql-color-white">
                                                        <h5 class="modal-title" id="eleve1">Ousmane NDIAYE</h5><br>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        matricule : <strong>001201910</strong><br>
                                                        <div class="dropdown-divider"></div>
                                                        classe : <strong>6emeA</strong><br>
                                                        <div class="dropdown-divider"></div>
                                                        Adresse : <strong>Médina</strong><br>
                                                        <div class="dropdown-divider"></div>
                                                        Année et lieu de naissance : <strong>18/01/2014 à Dakar</strong><br>
                                                        <div class="dropdown-divider"></div>
                                                        sexe :  <strong>M</strong><br>
                                                        <div class="dropdown-divider"></div>
                                                        Téléphone :  <strong>77 204 54 63</strong><br>
                                                        <div class="dropdown-divider"></div>
                                                        email :  <strong>ouzy@gmail.com</strong><br>
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