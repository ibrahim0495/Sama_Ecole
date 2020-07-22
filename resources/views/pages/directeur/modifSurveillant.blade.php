@extends('pages.directeur.master_dir', ['title' => ' |Surveillant'])

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
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input class="form-control" value="" type="email">
                  </div>
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group input-group-merge">
                  <input class="form-control" value="" type="text">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                    </div>
                    <input class="form-control" value="" type="text">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                  </div>
                </div>
              </div>
        </div>

          <!-- Input groups with icon -->
          <div class="row">

            <div class="col-md-3">
                <button class="btn btn-success">Valider</button>
            </div>
          </div>
        </form>
      </div>
    </div>
 </div>

@endsection
