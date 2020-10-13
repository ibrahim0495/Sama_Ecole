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
            <form method="POST" action="{{ route('surveillant.professeur.classeMatiere.step1')}}">
            <input type="hidden" name="login" value="{{$login}}">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label" for="InputEmail">Classes</label>
                        <div class="input-group input-group-merge">
                            <select class="form-control" placeholder="selectionner une ou plusieurs" value="{{ old('classe') ?? ''}}" name="classes[]" multiple id="example2cols2Select" data-toggle="select">
                                @foreach ($classes as $classe)
                                    <option value="{{$classe->nom}}">{{$classe->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label" for="InputAdresse">Matieres</label>
                        <div class="input-group input-group-merge">
                            <select class="form-control" placeholder="selectionner une ou plusieurs" value="{{ old('matieres') ?? ''}}" name="matieres[]" multiple id="example1cols1Select" data-toggle="select">
                                @foreach ($matieres as $matiere)
                                    <option value="{{$matiere->nom_matiere}}">{{$matiere->nom_matiere}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        {!! $errors->first('adresse', '<div class="text-danger">:message</div>')!!}
                    </div>
                </div>
                

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