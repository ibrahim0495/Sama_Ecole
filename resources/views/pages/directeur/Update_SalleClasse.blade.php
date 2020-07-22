@extends('pages.directeur.master_dir', ['title' => ' |Salle de Classe'])

@section('contenu_page')

<div class="container">
    <div class="card-body">
        <form method="POST" action="">
            @csrf
          <!-- Input groups with icon -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input class="form-control" value="" type="text">
                </div>
              </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-success">Valider</button>
            </div>
          </div>

          <!-- Input groups with icon -->
        </form>
      </div>
    </div>
 </div>

@endsection
