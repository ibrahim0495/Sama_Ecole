@extends('pages.surveillant.master_surveillant', ['title' => 'Enregistrement Professeur'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Accueil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('surveillant.professeur.liste')}}">Professeur</a></li>
            <li class="breadcrumb-item active" aria-current="page">Surveillant/enregistrer professeur</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Attribution des Classes et matieres aux professeurs</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('surveillant.professeur.classeMatiere.update')}}">
                                
                            @csrf
                            @foreach ($classes as $classe)
                                <h3>{{$classe}}</h3>
                                <div class="row">
                                    @foreach ($matieres as $matiere)
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="custom-toggle custom-toggle-success ">
                                                <input type="hidden" name="login" value="{{$login}}">
                                                <input type="checkbox" name="type[]" value="{{$matiere.' '.$classe}}"
                                                        @foreach ($matieres_prof as $matiere_prof)
                                                            @if (($matiere_prof->nom == $classe) && ($matiere_prof->nom_matiere == $matiere))
                                                                checked
                                                            @endif
                                                        @endforeach
                                                
                                                >
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="Non" data-label-on="Oui"></span>
                                            </label>&nbsp;
                                            <label class="form-control-label" for="InputStatus">{{$matiere}}</label>&nbsp;&nbsp;&nbsp;
                                    @endforeach
                                    
                                </div>
                            @endforeach
                            
                        
                            <br>
                            <button type="submit" class="btn btn-lg btn-block btn-primary">
                                Enregistrer
                            </button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection