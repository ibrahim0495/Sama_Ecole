@extends('pages.directeur.master_directeur', ['title' => ' |Surveillant'])

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Comptable</h6>
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
                <form method="POST" action="{{ route('directeur.surveillant.storeClasses')}}">
                    @csrf
                    <input type="text" class="form-control" value="Bucharest, Cluj, Iasi, Timisoara, Piatra Neamt" data-toggle="tags" data-role="tagsinput" name="classes"/>
                    <br>
                    
                    <br>

                    <button type="submit" class="btn btn-outline-success btn-lg btn-block">
                        Valider
                    </button>
                </form>
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
