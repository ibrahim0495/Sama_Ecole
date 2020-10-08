@extends('pages.surveillant.master_surveillant', ['title' => 'Mise a jour  Retard'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Accueil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('surveillant.professeur.liste')}}">Retard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Surveillant/modifier absence</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Modifier une Absence</h3>
    </div>
    <!-- Card body -->
    @foreach ($retard as $ret)
    <div class="card-body">
    <form method="POST" action="{{ route('retard.update', $ret->code )}}"
        method="POST"
        class="inline-block" onsubmit="return confirm('Voulez vous modifier ce retard')">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="row">

            {{-- code --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Code</label>
                <div class="input-group input-group-merge">
                    <input class="form-control" placeholder="Code" type="text" name="code" value="{{ $ret->code }}" disabled>
                </div>
                </div>
                @error('Code')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- duree_retard --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label" for="InputAdresse">Duree Retard</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" placeholder="Duree" type="text" name="duree_retard" value="{{ $ret->duree_retard }}"
                        onKeypress="  if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                                    if(event.which < 45 || event.which > 57) return false;">
                    </div>
                </div>
                @error('duree_retard')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Enregistrer les modifications
        </button>
        </form>
    </div>
    @endforeach
</div>
@endsection

@section('extra-js')
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
