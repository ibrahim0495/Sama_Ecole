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
                            <th>Désactiver</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Actions</th>
                            <th>Désactiver</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($surveillant as $surv)
                        <tr>
                            <td>{{$surv->prenom}}</td>
                            <td>{{$surv->nom}}</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="#" data-toggle="modal" data-target="#surveillant{{$surv->login}}"
                                    data-original-title="Voir le surveillant">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>

                                <a
                                    class="btn btn-sm btn-primary"
                                    href="#" data-toggle="modal" data-target="#UpdateSurv{{$surv->login}}"
                                    data-original-title="Modifier surveillant">
                                    <i class="fa fa-edit fa-lg fa-fw"></i>
                                </a>

                                <div class="modal fade" id="surveillant{{$surv->login}}" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-gradient-blue ql-color-white">
                                                <h5 class="modal-title" id="surveillant">{{$surv->prenom}} {{$surv->nom}}</h5><br>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div class="modal-body">
                                                Adresse : <strong>{{$surv->adresse}}</strong><br>
                                                <div class="dropdown-divider"></div>
                                                <div class="dropdown-divider"></div>
                                                Téléphone :  <strong>{{$surv->telephone}}</strong><br>
                                                <div class="dropdown-divider"></div>
                                                email :  <strong>{{$surv->email}}</strong><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="UpdateSurv{{$surv->login}}" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="UpdateSurv">Modifier Surveillant ( {{$surv->nom}} )</h5><br>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <form
                                            action="{{ route('surveillant.update', $surv->login ) }}" method="POST"
                                            class="inline-block" onsubmit="return confirm('Voulez vous modifier cet établissement?')">
                                                {{ csrf_field() }}
                                                {{method_field('PUT')}}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Prenom</label>
                                                    <input type="text" class="form-control" name="prenom" value="{{$surv->prenom}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                    <input type="text" class="form-control" name="nom" value="{{$surv->nom}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" class="form-control" name="adresse" value="{{$surv->adresse}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{$surv->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telephone</label>
                                                        <input type="text" class="form-control" name="telephone" value="{{$surv->telephone}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="#" data-original-title="Supprimer" data-target="#Supprimer{{$surv->login}}">
                                    <div id="Supprimer{{$surv->login}}">
                                        <form action="{{ route('surveillant.update', $surv->login ) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez vous désactiver ce surveillant')">
                                            {{csrf_field() }}
                                            {{ method_field('DELETE')}}
                                            <input type="hidden" name="action" value="desactiver"/>
                                            <button type="submit" class="btn btn-primary">Desactiver</button>
                                        </form>
                                    </div>
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
