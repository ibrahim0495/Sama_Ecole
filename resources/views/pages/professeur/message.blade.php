@extends('pages.professeur.master_prof',['title' => ' | Messsages'])

@section('page-namer')
<h6 class="h2 text-white d-inline-block mb-0">Messages</h6>
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="#"><i class="fas fa-telegram"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Professeur</a></li>
    </ol>
</nav>
@endsection

@section('contenu_page')
<div class="row">
    <div class="card center">
        <!-- Card header -->
        <div class="card-header">
          <!-- Title -->
          <h5 class="h3 mb-0">Latest messages</h5>
        </div>
        <!-- Card body -->
        <div class="card-body p-0">
          <!-- List group -->
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
              <div class="d-flex w-100 justify-content-between">
                <div>
                  <div class="d-flex w-100 align-items-center">
                    <img src="../assets/img/theme/team-1.jpg" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                    <h5 class="mb-1">Tim</h5>
                  </div>
                </div>
                <small>2 hrs ago</small>
              </div>
              <h4 class="mt-3 mb-1"> New order for Argon Dashboard</h4>
              <p class="text-sm mb-0">Doasdnec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
              <div class="d-flex w-100 justify-content-between">
                <div>
                  <div class="d-flex w-100 align-items-center">
                    <img src="../assets/img/theme/team-2.jpg" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                    <h5 class="mb-1">Mike</h5>
                  </div>
                </div>
                <small>1 day ago</small>
              </div>
              <h4 class="mt-3 mb-1"><span class="text-info">●</span> Your theme has been updated</h4>
              <p class="text-sm mb-0">Doasdnec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                <div class="d-flex w-100 justify-content-between">
                  <div>
                    <div class="d-flex w-100 align-items-center">
                      <img src="../assets/img/theme/team-2.jpg" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                      <h5 class="mb-1">Mike</h5>
                    </div>
                  </div>
                  <small>1 day ago</small>
                </div>
                <h4 class="mt-3 mb-1"><span class="text-info">●</span> Your theme has been updated</h4>
                <p class="text-sm mb-0">Doasdnec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
              <a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                <div class="d-flex w-100 justify-content-between">
                  <div>
                    <div class="d-flex w-100 align-items-center">
                      <img src="../assets/img/theme/team-2.jpg" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                      <h5 class="mb-1">Mike</h5>
                    </div>
                  </div>
                  <small>1 day ago</small>
                </div>
                <h4 class="mt-3 mb-1"><span class="text-info">●</span> Your theme has been updated</h4>
                <p class="text-sm mb-0">Doasdnec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
              <a href="#" class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                <div class="d-flex w-100 justify-content-between">
                  <div>
                    <div class="d-flex w-100 align-items-center">
                      <img src="../assets/img/theme/team-2.jpg" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                      <h5 class="mb-1">Mike</h5>
                    </div>
                  </div>
                  <small>1 day ago</small>
                </div>
                <h4 class="mt-3 mb-1"><span class="text-info">●</span> Your theme has been updated</h4>
                <p class="text-sm mb-0">Doasdnec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </a>
          </div>
        </div>
      </div>
      
      {{-- ce que je veux ici c.est en cliquant sur un bouton il nous ramene un card avec l'ensemble des discussions avec cette personne--}}
  </div>
@endsection

@section('extra-js')
      <!-- Optional JS -->
      <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
      <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
    <script src="{{ asset('assets/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
@endsection