@extends('pages.directeur.master_directeur', ['title' => ' |Liste_classe'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Classe</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Directeur/Lister classe</li>
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
                <h3 class="mb-0">Classes</h3>
                <br>
            <a class="btn btn-primary" href="{{ route('classe.create') }}">Ajouter nouvelle classe</a>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom</th>
                            <th>Montant inscription</th>
                            <th>Montant mensuel</th>
                            <th>Surveillant associé</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Montant inscription</th>
                            <th>Montant mensuel</th>
                            <th>Surveillant associé</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($classe as $cl)
                        <tr>
                            <td>{{$cl->nom}}</td>
                            <td>{{$cl->montant_inscription}}</td>
                            <td>{{$cl->montant_mensuel}}</td>
                            <td>{{$cl->prenom}} {{$cl->nom_per}}</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="{{ route('classe.show', $cl->classe_id) }}">
                                    <i class="fa fa-edit fa-lg fa-fw"></i>
                                </a>

                                    <form action="{{ route('classe.destroy', $cl->classe_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez vous supprimer cette classe')">
                                        {{csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-danger float-left"><i class="fa fa-trash fa-lg fa-fw"></i></button>
                                    </form>
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
