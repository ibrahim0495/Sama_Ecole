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
                <br>
<<<<<<< HEAD
                <div class="row">
                    <div class="col-md-10">
                    <a class="btn btn-primary" href="{{ route('directeur.surveillant.create') }}">Ajouter nouveau Surveillant</a>
                    </div>
                    <div class="col-auto btn-group">
                        <button type="button" class="btn btn-sm btn-vimeo h-75" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$status}}
                        </button>
                        <button type="button" class="btn btn-lg btn-vimeo btn-sm dropdown-toggle h-75" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('directeur.surveillant.liste') }}">Tout</a>
                            <a class="dropdown-item" href="{{route('directeur.surveillant.listeActif') }}">Actif(s)</a>
                            <a class="dropdown-item" href="{{ route('directeur.surveillant.listeInactif') }}">Inactif(s)</a>
                        </div>
    
                        
                    </div>
                    <div class="table-responsive py-4"> 
                        @include('layouts.table_users', ['personnes' => $surveillants, 'user' => 'surveillant', 'admin' => 'directeur'])
                    </div>
                </div>
            
=======
            <a class="btn btn-primary" href="{{ route('surveillant.create') }}">Ajouter nouveau Surveillant</a>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Telephone</th>
                            <th>Adresse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Telephone</th>
                            <th>Adresse</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($surveillantsActifs as $surveillantActif)
                        <tr>
                            <td>{{$surveillantActif->prenom}}</td>
                            <td>{{$surveillantActif->nom}}</td>
                            <td>{{$surveillantActif->telephone}}</td>
                            <td>{{$surveillantActif->adresse}}</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="{{route('directeur.surveillant.show', $surveillantActif->login)}}"
                                    data-original-title="Voir le surveillant">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>

                                <form action="{{ route('directeur.surveillant.destroy', $surveillantActif->login) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous supprimer le surveillant {{$surveillantActif->prenom}} {{$surveillantActif->nom}} ?'">
                                    {{csrf_field() }}
                                    <button type="submit" class ="btn btn-sm btn-danger float-left"><i class="fa fa-trash fa-lg fa-fw"></i></button>
                                </form>



                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
>>>>>>> b16efcb1ca8143162e3e00de1e41780bd21d35c3
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
