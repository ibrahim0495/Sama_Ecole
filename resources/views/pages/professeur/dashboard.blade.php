@extends('pages.professeur.master_prof', ['title' => ' | Accueil'])


@section('page-namer')
    <h6 class="h2 text-white d-inline-block mb-0">Accueil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Professeur</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accueil</li>
        </ol>
    </nav>
@endsection
@section('header')
<div class="row">
    <div class="col-xl-3 col-md-6">
      <div class="card bg-gradient-primary border-0">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0 text-white">Tasks completed</h5>
              <span class="h2 font-weight-bold mb-0 text-white">8/24</span>
              <div class="progress progress-xs mt-3 mb-0">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
              </div>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-gradient-info border-0">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0 text-white">Contacts</h5>
              <span class="h2 font-weight-bold mb-0 text-white">123/267</span>
              <div class="progress progress-xs mt-3 mb-0">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
              </div>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-gradient-danger border-0">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Items sold</h5>
                <span class="h2 font-weight-bold mb-0 text-white">200/300</span>
                <div class="progress progress-xs mt-3 mb-0">
                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                </div>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-gradient-default border-0">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Notifications</h5>
                <span class="h2 font-weight-bold mb-0 text-white">50/62</span>
                <div class="progress progress-xs mt-3 mb-0">
                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                </div>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
            </p>
          </div>
        </div>
      </div>
</div>
@endsection

@section('contenu_page')
<div class="row">
    <div class="col-xl-8">
      <div class="card bg-default">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
              <h5 class="h3 text-white mb-0">Sales value</h5>
            </div>
            <div class="col">
              <ul class="nav nav-pills justify-content-end">
                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                    <span class="d-none d-md-block">Month</span>
                    <span class="d-md-none">M</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                    <span class="d-none d-md-block">Week</span>
                    <span class="d-md-none">W</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
              <h5 class="h3 mb-0">Total orders</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <canvas id="chart-bars" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
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