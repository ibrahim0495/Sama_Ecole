@extends('pages.directeur.master_directeur', ['title' => ' |Surveillant'])

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Directeur</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('directeur.index') }}">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Directeur/Surveillant {{$surveillantActif->login}}</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="row">

    <div class="col-xl-8">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Modification du Surveillant : {{$surveillantActif->login}}</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form method="POST" action="{{ route('directeur.surveillant.update', $surveillantActif->login) }}">
                    @include('layouts.show_personnel', ['personne' => $surveillantActif])
                        <div class="col-md-4">
                            <a class="btn btn-outline-danger btn-lg btn-block" href="{{route('directeur.surveillant.liste')}}">
                                Annuler
                            </a>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-outline-success btn-lg btn-block">
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0"> Ses Classes</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                @if ($classes_surveillant->isEmpty())
                    <h3 class="mb-0">Aucune classe ne vous ai encore attribuée</h3>
                @else
                    <form method="POST" action="{{ route('directeur.surveillant.storeClasses')}}">
                        @csrf
                        <input type="text" class="form-control" value="
                            @foreach ($classes_surveillant as $classe_surveillant)
                                {{$classe_surveillant->nom }},
                            @endforeach"
                            data-toggle="tags" data-role="tagsinput" disabled name="classes"/>
                        <br>

                        <br>

                        <a href class="btn btn-outline-success btn-lg btn-block" data-target="#classe" data-toggle="modal">
                            Modifier
                        </a>

                        <div class="modal fade" id="classe" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-gradient-blue ql-color-white">
                                        <h5 class="modal-title" id="eleve1">Classes</h5><br>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <div class="modal-body">
                                    <form action="{{route('directeur.surveillant.storeClasses')}}" method="POST">
                                        <div class="form-group">
                                            <label for="">Choisir ses classes</label>
                                        <select name="classes" class="form-control" multiple>
                                            @foreach ($classes as $classe)
                                                @foreach($classes_surveillant as $classe_surveillant)
                                                    @if ($classe->nom == $classe_surveillant->nom)
                                                        <option value="{{$classe->nom}}" selected="selected"> {{$classe->nom}} </option>
                                                    @else
                                                        <option value="{{$classe->nom}}"> {{$classe->nom}} </option>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                        </select>
                                        </div>

                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-outline-primary" value="Valider">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
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
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
