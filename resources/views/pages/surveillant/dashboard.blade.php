@extends('pages.surveillant.master_surveillant', ['title' => ' | Accueil'])


@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Accueil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Surveillant</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accueil</li>
        </ol>
    </nav>
@endsection
@section('header')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                    <span class="h2 font-weight-bold mb-0">350,897</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
                </p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                    <span class="h2 font-weight-bold mb-0">2,356</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
                </p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                    <span class="h2 font-weight-bold mb-0">924</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
                </p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                    <span class="h2 font-weight-bold mb-0">49,65%</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-chart-bar-32"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
                </p>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('contenu_page')
    <div class="row">
            <div class="col-xl-6">
              <!--* Card header *-->
              <!--* Card body *-->
              <!--* Card init *-->
              <div class="card">
                <!-- Card header -->
                <div class="card-header">
                  <!-- Surtitle -->
                  <h6 class="surtitle">Growth</h6>
                  <!-- Title -->
                  <h5 class="h3 mb-0">Sales value</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="chart">
                    <!-- Chart wrapper -->
                    <canvas id="chart-points" class="chart-canvas"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <!--* Card header *-->
              <!--* Card body *-->
              <!--* Card init *-->
              <div class="card">
                <!-- Card header -->
                <div class="card-header">
                  <!-- Surtitle -->
                  <h6 class="surtitle">Users</h6>
                  <!-- Title -->
                  <h5 class="h3 mb-0">Audience overview</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="chart">
                    <!-- Chart wrapper -->
                    <canvas id="chart-doughnut" class="chart-canvas"></canvas>
                  </div>
                </div>
              </div>
            </div>
        
    </div>
@endsection
