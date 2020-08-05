@extends('pages.professeur.master_prof')

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
                    <a class="btn btn-primary" href="{{ route('notes.create')}}">toutes les notes</a><br>
                        <div class="dropdown-divider"></div>
                        <h3 class="mb-0">Nos élèves</h3>
                        <p class="text-sm mb-0">
                            Liste des élèves de la classe (nom classe) du semestre (00) de l'année-scolaire (0000-0000)
                        </p>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Devoir</th>
                                    <th>Composition</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Devoir</th>
                                    <th>Composition</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>001221810</td>
                                    <td>Hamidou</td>
                                    <td>NDIAYE</td>
                                    <td>10</td>
                                    <td>10</td>
                                    <td class="clearfix">
                                        <a
                                            class="btn btn-sm btn-primary"
                                            href="#" data-toggle="modal" data-target="#CreateOrUpdateNote1"                                            data-original-title="Creer ou modifier note">
                                            <i class="fa fa-edit fa-lg fa-fw"></i>
                                        </a>
                                        <div class="modal fade" id="CreateOrUpdateNote1" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="CreateOrUpdateNote1">Classes</h5><br>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <form action="{{ route('notes.store')}}" method="POST" class="inline-block" onsubmit="return confirm('Voulez vous modifier ce modèle?')">
                                                        <div class="modal-body">
                                                            {{  csrf_field() }}
                                                            <div class="form-group">
                                                                <label>Matricule</label>
                                                                <input type="text" class="form-control" name="matricule" value="001221810" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Prenom & nom</label>
                                                                <input type="text" class="form-control" name="" value="Hamidou Ndiaye" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>devoir</label>
                                                                <input type="text" class="form-control" name="devoir" value="10">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Composition</label>
                                                                <input type="text" class="form-control" name="compo" value="10">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" name="" value="OK">
                                                        </div>
                                                    </form>
                
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>001201910</td>
                                    <td>Ousmane</td>
                                    <td>NDIAYE</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td class="clearfix">
                                        <a
                                            class="btn btn-sm btn-primary"
                                            href="#" data-toggle="modal" data-target="#CreateOrUpdateNote"
                                            data-original-title="Creer ou modifier note">
                                            <i class="fa fa-edit fa-lg fa-fw"></i>
                                        </a>
                                        
                                        <div class="modal fade" id="CreateOrUpdateNote" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="CreateOrUpdateNote">Classes</h5><br>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('notes.store')}}" method="POST" class="inline-block" onsubmit="return confirm('Voulez vous modifier ce modèle?')">
                                                        <div class="modal-body">
                                                            {{  csrf_field() }}
                                                            <div class="form-group">
                                                                <label>Matricule</label>
                                                                <input type="text" class="form-control" name="matricule" value="001201910" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Prenom & nom</label>
                                                                <input type="text" class="form-control" name="" value="Ousmane Ndiaye" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>devoir</label>
                                                                <input type="text" class="form-control" name="devoir" value="20">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Composition</label>
                                                                <input type="text" class="form-control" name="compo" value="20">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" name="" value="OK">
                                                        </div>
                                                    </form>
                
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