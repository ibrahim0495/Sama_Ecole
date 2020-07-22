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
</head>

<body>
    <!-- Sidenav -->
    @include('pages.directeur.sideBar')

    <!-- Main content -->
    <div class="main-content" id="panel">
            <!-- Topnav -->
            @include('pages.directeur.navBar')
            <!-- Header -->
            <!-- Header -->
            @include('pages.directeur.header')
        <!-- Page content -->
        <div class="container-fluid mt--6">
            {{--  Contenu de la page ici  --}}
            @yield('contenu_page')

            <!-- Footer -->
            {{--  @include('layouts.footer')  --}}
            {{-- fdlfdfkdlfdfld;bvc;fdmfdnfddd --}}
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ ('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ ('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ ('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ ('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ ('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    {{--  Formulaire  --}}
    <script src="{{ ('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ ('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ ('assets/vendor/moment.min.js') }}"></script>
    <script src="{{ ('assets/vendor/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ ('assets/vendor/nouislider/distribute/nouislider.min.js') }}"></script>
    <script src="{{ ('assets/vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ ('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ ('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker({
                icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar-day",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
                }
            });
        });
    </script>

    {{--    --}}
    <script src="{{ ('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ ('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ ('assets/js/argon.js?v=1.2.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ ('assets/js/demo.min.js') }}"></script>
</body>

</html>
