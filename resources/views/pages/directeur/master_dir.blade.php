<!--
=========================================================
* Argon Dashboard PRO - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sama Ecole">
  <meta name="author" content="Sama Ecole">
  <title>Sama Ecole</title>
  <!-- Favicon -->
  {{--  <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">  --}}
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ ('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ ('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ ('assets/css/argon.css?v=1.2.0') }}" type="text/css">

  @yield('extra-css')
</head>

<body>
    <!-- Sidenav -->
    @include('pages.directeur.sideBar')

    <!-- Main content -->
    <div class="main-content" id="panel">
            <!-- Topnav -->
            @include('layouts._partials.navBar')

            <!-- Header -->
            @yield('header')
        <!-- Page content -->
        <div class="container-fluid mt--6">
            {{--  Contenu de la page ici  --}}
            @yield('contenu_page')
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ ('assets/vendor/jquery/dist/jquery.min.js') }}"></script>--
    <script src="{{ ('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>--
    <script src="{{ ('assets/vendor/js-cookie/js.cookie.js') }}"></script>--
    <script src="{{ ('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ ('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ ('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ ('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ ('assets/js/argon.js?v=1.2.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ ('assets/js/demo.min.js') }}"></script>
    <script src="./assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>

    @yield('extra-js')
</body>

</html>
