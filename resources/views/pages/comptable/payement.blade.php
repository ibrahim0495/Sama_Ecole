@extends('pages.comptable.master_comptable', ['title' => ' | Inscription'])

@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Payement</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payement</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Payement</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('payement.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3"></div>
                    {{-- Matricule elève --}}
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">Matricule</label>
                            <input type="text" name="matricule" class="form-control" id="example2cols2Input" placeholder="Saisir le matricule de l'élève">
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Voir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('extra-js')

@endsection
