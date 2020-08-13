@extends('pages.directeur.master_directeur', ['title' => ' |Liste_matiere'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Matière</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Directeur/Lister Matière</li>
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
                <h3 class="mb-0">Matière</h3>
                <p class="text-sm mb-0">
                    Liste des Matières
                </p>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom</th>
                            <th>Langue</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Langue</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($matiere as $mat)
                        <tr>
                            <td>{{$mat->nom_matiere}}</td>
                            <td>{{$mat->langue}}</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="#" data-toggle="modal" data-target="#UpdateMatiere{{$mat->matiere_id}}" data-original-title="Modifier matiere">
                                    <i class="fa fa-edit fa-lg fa-fw"></i>
                                </a>

                                <form action="{{ route('matiere.destroy', $mat->matiere_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez vous supprimer cette matiere')">
                                        {{csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-danger float-left"><i class="fa fa-trash fa-lg fa-fw"></i></button>
                                </form>

                                <div class="modal fade" id="UpdateMatiere{{$mat->matiere_id}}" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="UpdateMatiere{{$mat->matiere_id}}">Modifier Matière</h5><br>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('matiere.update', $mat->matiere_id)}}" method="POST" class="inline-block" onsubmit="return confirm('Voulez vous modifier ce modèle?')">
                                                <div class="modal-body">
                                                    {{ csrf_field() }}
                                                    {{method_field('PUT')}}
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" class="form-control" name="nom" value="{{$mat->nom_matiere}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Langue</label>
                                                        <input type="text" class="form-control" name="langue" value="{{$mat->langue}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" name="" value="Modifier">
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
