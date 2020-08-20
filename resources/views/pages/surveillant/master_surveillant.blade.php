<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sama Ecole">
        <meta name="author" content="Sama Ecole">
        <title>{{$title ?? ''}}</title>
        <!-- Favicon -->
        {{--  <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">  --}}
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
        <!-- Page plugins -->
        <!-- Argon CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">

        @yield('extra-css')
    </head>

<body>
    <!-- Sidenav -->
    @include('pages.surveillant.sideBar')

    <!-- Main content -->
    <div class="main-content" id="panel">
            <!-- Topnav -->
            @include('layouts._partials.navBar')

            <!-- Header -->
            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-center py-4">
                            <div class="col-lg-6 col-7">
                                @yield('breadcrumb')
                            </div>

                            <div class="col-lg-6 col-5 text-right">
                                <a href="#" class="btn btn-sm btn-neutral">New</a>
                                <a href="#" class="btn btn-sm btn-neutral">2019-2020</a>
                            </div>

                        </div>
                    <!-- Card stats -->
                        @yield('header')
                    </div>
                </div>
            </div>


        <!-- Page content -->
        <div class="container-fluid mt--6">
            @if (session()->has('notification.message'))
            <div class="alert {{ session()->get('notification.type')}} alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
                <span class="alert-text">{{ session()->get('notification.message')}} </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            {{--  Contenu de la page ici  --}}
            @yield('contenu_page')
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>--
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>

    @yield('extra-js')

</body>

</html>
