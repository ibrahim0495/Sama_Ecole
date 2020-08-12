@extends('pages.directeur.master_directeur', ['title' => ' |Liste_etablissement'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Directeur</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lister Etablissement</li>
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
                <h3 class="mb-0">Etablissement</h3>
                <p class="text-sm mb-0">
                    Liste des établissements
                </p>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($etablissement as $eta)
                        <tr>
                            <td>{{$eta->nom}}</td>
                            <td>{{$eta->adresse}}</td>
                            <td>{{$eta->email}}</td>
                            <td>{{$eta->telephone}}</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="#" data-toggle="modal" data-target="#CreateOrUpdateNote1{{$eta->etablissement_id}}" data-original-title="Creer ou modifier note">
                                    <i class="fa fa-edit fa-lg fa-fw"></i>
                                </a>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="#" data-original-title="Supprimer">
                                    <form action="{{ route('etablissement.destroy', $eta->etablissement_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez vous supprimer cet etablissement')">
                                        {{csrf_field() }}
                                        {{ method_field('DELETE')}}
                                       <i class="fa fa-trash fa-lg fa-fw"> <input type="submit" value=""></i>
                                      </form>
                                </a>
                                <div class="modal fade" id="CreateOrUpdateNote1{{$eta->etablissement_id}}" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="CreateOrUpdateNote1{{$eta->etablissement_id}}">Modifier établissement ( {{$eta->nom}} )</h5><br>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <form
                                            action="{{ route('etablissement.update', $eta->etablissement_id ) }}" method="POST"
                                            class="inline-block" onsubmit="return confirm('Voulez vous modifier cet établissement?')">
                                                {{ csrf_field() }}
                                                {{method_field('PUT')}}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                    <input type="text" class="form-control" name="nom" value="{{$eta->nom}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" class="form-control" name="adresse" value="{{$eta->adresse}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{$eta->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telephone</label>
                                                        <input type="text" class="form-control" name="telephone" value="{{$eta->telephone}}">
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
