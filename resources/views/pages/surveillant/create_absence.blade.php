@extends('pages.surveillant.master_surveillant', ['title' => 'Enregistrement Absence'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Accueil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('surveillant.professeur.liste')}}">Absence</a></li>
            <li class="breadcrumb-item active" aria-current="page">Surveillant/enregistrer absence</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Enregistrer une Absence</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
    <form method="POST" action="{{ route('absence.store')}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4 class="mb-0">Informations sur l'absence</h4>
                </div>
            </div>

            {{-- code --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">code eleve</label>
                    <select
                        class="form-control"
                        name="code" data-toggle="select">
                        @foreach ($list_code as $cod)
                            <option value="{{$cod->code}}">{{$cod->code}}</option>
                        @endforeach
                    </select>
                    @error('code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- duree_absence --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label" for="InputAdresse">Duree Absence</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" placeholder="Duree" type="text" name="duree_abs" value="{{ old('duree_abs') }}"
                        onKeypress="  if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                                    if(event.which < 45 || event.which > 57) return false;">
                    </div>
                </div>
                @error('duree_abs')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- motif --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Motif</label>
                <div class="input-group input-group-merge">
                    <input class="form-control" placeholder="Motif" type="text" name="motif" value="{{ old('motif') }}">
                </div>
                </div>
                @error('motif')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Enregistrer
        </button>
        </form>
    </div>
</div>
@endsection

@section('extra-js')
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
