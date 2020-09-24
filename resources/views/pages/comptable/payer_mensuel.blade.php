@extends('pages.comptable.master_comptable', ['title' => ' | Inscription'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Mensualité</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('comptable.index') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('payement.create') }}">Payement</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mensualité</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
  <div class="row">
    <div class="col">

      <p id="demo"></p>
      <script>
        var message = 
        "\n\
        <div class='card mb-4'>\n\
        <div class='card-header'>\n\
          <h3 class='mb-0 text-center'>\n\
            <a href='{{ route('payement.show', $code) }}' type='button' class='btn btn-link text-black'>Cliquez ici pour réactualiser la page</a>\n\
          </h3>\n\
        </div>\n\
      </div>";
        function myFunction() {
          document.getElementById("demo").innerHTML = message;
        }
      </script>

      <div class="modal fade" data-backdrop="static" id="payement" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Payement mensualité</h5>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              {{-- Validation des erreurs --}}
              @if (session('error_min_montant'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Erreur!</strong> {{ session('error_min_montant') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              @endif
              @if (session('error_montant'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Erreur!</strong> {{ session('error_montant') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              @endif
              <form class="new-event--form" method="POST" action="{{ route('payement-mensuel') }}">
                  @csrf
                  <input type="hidden" name="login" value="{{ $login }}">
                  <input type="hidden" name="code" value="{{ $code }}">
                  <input type="hidden" name="anneesco" value="{{ $anneesco }}">
                  <input type="hidden" name="mensualite_id" value="{{ $mensualite_id }}">
                  <input type="hidden" name="mois_id" value="{{ $mois_id }}">
                  <input type="hidden" name="mensualite" value="{{ $montant }}">
                    <label class="form-control-label">Montant</label>
                    <input 
                      type="text" name="montant" placeholder="Saisir le montant versé ici" 
                      class="form-control @error('montant') is-invalid @enderror" 
                      onKeypress="  if(event.keyCode <= 47 || event.keyCode > 57) event.returnValue = false;
                      if(event.which <= 47 || event.which > 57) return false;" maxlength="9">
                      @error('montant')
                        <div class="text-danger"> {{ $message }}</div>
                      @enderror
                  </div>
                    
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success new-event--add">Payer</button>
                    <button type="button" onclick="myFunction()" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('extra-js')
  <script type="text/javascript">
    $(window).on('load', function () {
      $('#payement').modal('show');
    });

  </script>

  <script src="{{ asset('assets/vendor/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
